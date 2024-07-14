<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

        // Create subscription in Razorpay (assuming plan ID is hardcoded)
        $subscription = $api->subscription->create([
            'plan_id' => 'plan_OY7USPDNgBdIwl',
            'total_count' => 1,  // One-time payment for 1 year
            'customer_notify' => 1,
            'customer_id' => auth()->user()->id,  // Link to your user ID
            'start_at' => now()->timestamp,  // Start immediately
            'expire_by' => now()->addYear()->timestamp,  // Expires in 1 year
        ]);

        // Redirect to Razorpay for payment
        return redirect()->to($subscription->short_url);
    }

    public function verifyPayment(Request $request)
    {
        // Handle Razorpay payment verification after successful payment
        $payment_id = $request->input('razorpay_payment_id');

        // Verify payment using Razorpay API
        // Update user's subscription status in your database

        return redirect()->route('dashboard')->with('success', 'Subscription successful!');
    }
}
