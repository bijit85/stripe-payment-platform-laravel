<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use Symfony\Component\Console\Output\ConsoleOutput;

class StripeController extends Controller
{
    /**
     * Handle Stripe get request
     */
    public function getStripe() {
        return view('stripe.stripe');
    }

    /**
     * Handle Stripe post request
     */
    public function postStripe(Request $request)
    {
//        $output = new ConsoleOutput();
//        $output->writeln($request);
//        dd($request);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        Stripe\Charge::create([
            "amount" => $request->paymentamount * 100,
            "currency" => "aud",
            "source" => "tok_mastercard",
            "description" => "Test payment from sample application"
        ]);

        Session::flash('success', 'Payment successful');

        return back();
    }
}

