<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $data;
    public function __construct()
    {
        $this->data = [];
    }
    public function bookYourSolarNow()
    {
        $this->data['resultActivesCities'] = City::where('status', 1)->get();
        return view('frontend.pages.book.booknow', $this->data);
    }
}
