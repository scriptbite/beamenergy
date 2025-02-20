<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookControlleradsf extends Controller
{
    public function bookYourSolarNow()
    {
        return view('frontend.pages.book.booknow');
    }

    public function bookYourSolarNowSubmit(Request $request)
    {

    }
}
