<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function __construct()
    {

    }

    public function getDetailsByPincode(Request $request, $pincode)
    {
        // Make API request
        $response = Http::get("https://api.postalpincode.in/pincode/{$pincode}");
        $data = $response->json();
        // Check if response is successful
        if (!empty($data) && $data[0]['Status'] == "Success") {
            return [
                'city' => $data[0]['PostOffice'][0]['Block'],
                'district' => $data[0]['PostOffice'][0]['District'],
                'state' => $data[0]['PostOffice'][0]['State'],
                'country' => $data[0]['PostOffice'][0]['Country']
            ];
        }
        return [];
    }
}
