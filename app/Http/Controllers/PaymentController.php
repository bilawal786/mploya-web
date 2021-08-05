<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PaymentController extends Controller
{
    public function Payment()
    {
        return view('payment.payment');
    }

    public function StripePayment(Request $request)
    {
        dd($request);
    }
}
