<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Jenssegers\Agent\Agent;

use App\Models\Course;
use App\Models\AddToCart;


class Cart extends Component
{
    public $getUserAddToCartProduct;



    public function render()
    {

        if (Auth::check()) {
            $this->updateCartAfterUserLogin();
        }
        $this->getAddToCartProducts();

        return view('livewire.cart');
    }



    public function removeCourseFromCart($id)
    {
        $addToCart =  AddToCart::find($id);

        $addToCart->delete();
        $this->emit('updateAddToCartCount');

        session()->flash('success', 'Product removed from cart !!!');
    }



    public function getAddToCartProducts()
    {
        $agent = new Agent();

        $this->getUserAddToCartProduct = Auth::check()
            ? AddToCart::with('course')->whereUserId(auth()->user()->id)
            ->whereStatus('!=', \constPayPalStatus::SUCCESS)
            ->get()
            : AddToCart::with('course')->whereBrowserName($agent->browser())
            ->whereStatus('!=', \constPayPalStatus::SUCCESS)->get();
    }



    public function addToCartButton($course_id)
    {
        $agent = new Agent();

        // dd($course_id);

        $course = Course::find($course_id);


        // Sorry here is if the course is already inside tha cart

        if (count(AddToCart::where(['browser_name' => $agent->browser(), 'course_id' => $course_id])->get()) > 0) {

            session()->flash('info', 'The Course' . $course->name . ' is already available in cart');

            return;
        }

        // Sorry here is if the authenticated users course is already inside tha cart

        elseif (Auth::check() && count(AddToCart::where(['user_id' => auth()->user()->id, 'course_id' => $course_id])->get()) > 0) {

            session()->flash('info', 'The Course ' . $course->name . ' is already available in cart');
            return;
        }


        // Check if the user is not logged in add to cart with the broswer name
        if (!Auth::check()) {
            AddToCart::create(['browser_name' => $agent->browser(), 'course_id' => $course_id, 'price' => $course->price, 'qty' => 1]);
        }

        // If the user is logged in add to cart with User Id;
        else {
            AddToCart::create(['user_id' => auth()->user()->id, 'course_id' => $course_id, 'price' => $course->price, 'qty' => 1]);
        }

        session()->flash('success', 'The Course' . $course->name . ' added to cart');
        $this->emit('updateAddToCartCount');
    }



    public function checkOut($course_id = null)
    {
        if (!empty($course_id)) {
            $this->addToCartButton($course_id);  // is a function
        }

        // if (!Auth::check()) {
        //     return   $this->dispatchBrowserEvent('loginModal');
        // }

        $this->getUserAddToCartProduct = AddToCart::with('course')->whereUserId(auth()->user()->id)
            ->where('status', '!=', \constPayPalStatus::SUCCESS)
            ->get();


        $provider = new PayPalClient([]);
        $token  = $provider->getAccessToken();
        $provider->setAccessToken($token);

        // dd($provider);

        $payPalOrder = $provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    "amount" => [
                        "currency_code" => 'USD',
                        "value" => $this->getUserAddToCartProduct->sum('price'),
                    ]
                ]
            ],
            'application_context' => [
                'cancel_url' => route('payment.cancel'),
                'return_url' => route('payment.success'),
            ]

        ]);

        // dd($payPalOrder);


        if ($payPalOrder['status']  == 'CREATED') {

            foreach ($this->getUserAddToCartProduct as $key => $cartCourse) {
                $cartCourse->status = \constPayPalStatus::IN_PROCESS;
                $cartCourse->payment_id = $payPalOrder['id'];
                $cartCourse->save();
            }
            return redirect($payPalOrder['links'][1]['href']);
        } else {
            return redirect()->back()->with("Whoops!! Something got wrong");
        }
    }



    public function updateAddToCartAfterUserLogin()
    {
        $agent = new Agent();

        $coursesInCartByIpBrowserName = AddToCart::with('course')
            ->whereBrowserName($agent->browser());

        if (count($coursesInCartByIpBrowserName->get()) > 0) {
            $coursesInCartByIpBrowserName->update(
                ['user_id' => auth()->user()->id, 'browser_name' => Null]
            );
        }
    }
}
