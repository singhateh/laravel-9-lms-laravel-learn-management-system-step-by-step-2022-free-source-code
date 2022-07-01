<?php

namespace App\Http\Controllers;

use App\Models\CourseOrder;
use Illuminate\Http\Request;

// Success Method Section

// Import the class namespaces first, before using it directly

use Jambasangsang\Flash\Facades\LaravelFlash;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


use App\Models\AddToCart;
use App\Models\Order;
use App\Models\OrderProduct;


class PaymentController extends Controller
{






    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        // dd($response);

        if (isset($response['status']) && isset($response['status']) == 'COMPLETED') {
            $productInCart = AddToCart::where(['user_id' =>  auth()->user()->id, 'payment_id' => $response['id']])->with('course')->get();

            $order = Order::create(['user_id' => auth()
                ->user()->id, 'status' => \constPayPalStatus::SUCCESS, 'date' => now(), 'payment_id' => $response['id']]);

            foreach ($productInCart as $key => $cart) {
                CourseOrder::create([
                    'course_id' => $cart->course_id,
                    'payment_id' => $cart->payment_id,
                    'order_id' => $order->id,
                    'discount' => $cart->discount,
                    'qty' => $cart->qty,
                    'price' => $cart->course->price  * $cart->qty
                ]);
            }

            AddToCart::where([
                'user_id' =>  auth()->user()->id,
                'payment_id' => $response['id']
            ])->delete();

            LaravelFlash::withSuccess('Payment Completed Successfully');

            return  redirect()->route('home', ['cart']);
        }

        LaravelFlash::withError('Whops!! Something went wrong please try again');

        return  redirect()->back();
    }


    public function cancel(Request $request)
    {
        if ($request['token']) {

            AddToCart::where(['payment_id' => $request->token])
                ->update(['payment_id' => '', 'status' => \constPayPalStatus::PENDING]);

            LaravelFlash::withInfo('Payment has been Cancelled');

            return  redirect()->route('home', ['cart']);
        }

        LaravelFlash::withError('Whops!! Something went wrong please try again');

        return  redirect()->route('home', ['cart']);
    }
}
