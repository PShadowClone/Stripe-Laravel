<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    /**
     *
     * show Card's form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('payment');
    }

    /**
     *
     * Charge card using Stripe service
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function check(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.STRIPE_SECRET'));
        try {
            Charge::create(array(
                "amount" => 2000 * 100, // convert from cent to dollar
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description" => "Charge for stripteeEsxample@gmail.com"
            ));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'shipment purchased successfully');
    }
}
