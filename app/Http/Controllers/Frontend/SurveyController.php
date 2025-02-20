<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Repositories\Repositories\SurveyRepository;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    private $surveyRepository;
    private $data;
    public function __construct(SurveyRepository $surveyRepository)
    {
        $this->surveyRepository = $surveyRepository;
    }

    public function surveyRequest()
    {
        $this->data['resultActivesCities'] = City::where('status', 1)->get();
        return view('frontend.pages.survey.request', $this->data);
    }

    public function surveyRequestSave(Request $request)
    {
        $data = $request->only(['full_name', 'email', 'mobile', 'pincode', 'city']);
        $response = $this->surveyRepository->createSurvey($request);
        if($response){
            return redirect()->back()->with('success', 'Thank you for your interest. We will contact you soon.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
