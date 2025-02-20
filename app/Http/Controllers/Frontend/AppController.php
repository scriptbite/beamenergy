<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PDFController;
use App\Models\Capacity;
use App\Models\Inverter;
use App\Models\Panel;
use App\Models\Quote;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppController extends MainController
{
    private $data;
    public function __construct()
    {
        $this->data = [];
    }

    public function calculator()
    {
        $this->data['resultActiveCapacities'] = Capacity::where('status', 1)->orderBy('power')->get();
        $this->data['resultActivePanels'] = Panel::where('status', 1)->orderBy('power')->get();
        $this->data['resultActiveInverters'] = Inverter::where('status', 1)->orderBy('power')->get();
        return view('frontend.apps.calculator', $this->data);
    }

    public function getQuote()
    {
        $this->data['resultActiveCapacities'] = Capacity::where('status', 1)->orderBy('power')->get();
        $this->data['resultActivePanels'] = Panel::where('status', 1)->orderBy('power')->get();
        $this->data['resultActiveInverters'] = Inverter::where('status', 1)->orderBy('power')->get();
        return view('frontend.apps.get_quote', $this->data);
    }

    public function getQuoteSubmit(Request $request)
    {
        $categories = [
            1 => 'Residential',
            2 => 'Housing Society',
            3 => 'Commercial',
        ];

        try {
            $data = $request->all();
            //dd($data);
            $quote = new Quote();
            $quote->full_name = $data['full_name'];
            $quote->mobile = $data['mobile'];
            $quote->pincode = $data['pincode'];
            $quote->technology = $data['technology'];
            if(isset($data['subsidy_option']) && !empty($data['subsidy_option'])) {
                $quote->subsidy_option = 1;
            } else {
                $quote->subsidy_option = 0;
            }

            $quote->category_id = $data['category_id'];
            $quote->capacity_id = $data['capacity_id'];
            $quote->panel_id = $data['panel_id'];
            $quote->inverter_id = $data['inverter_id'];
            if($quote->save()) {
                // Get the current year and month
                $year = Carbon::now()->format('Y');
                $month = Carbon::now()->format('m');

                // Get the last inserted quotation ID
                $count = Quote::whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
                // Increment the count to get the new number
                $newNumber = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
                // Generate the new quotation ID
                $quotationId = "BEQ-{$year}-{$month}-{$newNumber}";
                $filename = "BEQ_{$year}_{$month}_{$newNumber}";


                $resultCapacity = Capacity::find($data['capacity_id']);
                $resultPanel = Panel::find($data['panel_id']);
                $resultInverter = Inverter::find($data['inverter_id']);

                //Calculation Start
                $panel_quantity = round($resultCapacity->power / $resultPanel->power) ?: 0;

                // Calculate panel total price
                $panel_total_price = ($panel_quantity * $resultPanel->power) * $resultPanel->price;

                // Calculate total price
                $total_price = $panel_total_price + $resultInverter->price + $resultCapacity->base_price;

                // Calculate total profit (20%)
                $total_profit = $total_price * 0.2;

                // Final total project price
                $total_project_price = $total_price + $total_profit;

                // Calculate GST (12.126%)
                $gst_amount = $total_project_price * 0.12126;

                // Total project price without GST
                $total_project_price_without_gst = $total_project_price - $gst_amount;

                //Calculation End
                $pincodeDetails = $this->getDetailsByPincode($data['pincode']);
                $city_name = (!empty($pincodeDetails['city'])) ? $pincodeDetails['city'] : $data['pincode'];
                $details = [
                    'quotation_id' => $quotationId,
                    'full_name' => $data['full_name'],
                    'pincode' => $data['pincode'],
                    'city_name' => $city_name,
                    'project_type' => $categories[$data['category_id']],
                    'project_capacity' => $resultCapacity->name,
                    'panel_name' => $resultPanel->name,
                    'panel_quantity' => $panel_quantity,
                    'inverter_name' => $resultInverter->name,

                    'project_cost' => $total_project_price_without_gst,
                    'gst' => $gst_amount,
                    'project_total_cost' => $total_project_price,
                    'government_subsidy' => $resultCapacity->subsidy,
                ];

                $pdf = Pdf::loadView('pdf.quotation', compact('details'))
                    ->setPaper('a4', 'portrait')
                    ->setOptions([
                        'isHtml5ParserEnabled' => true,
                        'isPhpEnabled' => true,
                        'isRemoteEnabled' => true, // Ensures public_path() images work
                        'defaultPaperSize' => 'a4'
                    ]);
                return $pdf->download($filename.'.pdf'); // Download PDF

                //$filename = PDFController::generateAndSaveQuotationPDF($details);
                //return redirect()->back()->with('success', 'Your request has been submitted successfully. You will receive a Quotation soon.');
            } else {
                throw new \Exception('Something went wrong. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }

        //return redirect()->back()->with('success', 'Your request has been submitted successfully.');
    }
}
