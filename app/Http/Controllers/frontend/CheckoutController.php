<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function getCheckout() {
        return view('frontend.checkout.checkout');
    }
    function getComplete() {
        return view('frontend.checkout.complete');
    }

    function postCheckout(CheckoutRequest $r){

    }
}
