<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');


    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');

    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-icon-component','refreshComponent');
        session()->flash('success_message','Item has been removed');

    }

    public function destroyAll()
    {
       Cart::instance('cart')->destroy();
        $this->emitTo('cart-icon-component','refreshComponent');

    }

    public function checkout(){

        if (Auth::check()) {
            # code...
            return redirect()->route('shop.checkout');
        }
        else {
            # code...
            return redirect()->route('login');
        }

    }

    public function setAmountForCheckout(){
        if (session()->has('coupon')) {
            # code...
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDisount,
                'tax' => $this->taxAfterDisount,
                'total' => $this->totalAfterDisount
            ]);
        }
        else {
            # code...
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);

        }
    }
    
    public function render()
    {
        if (session()->has('coupon')) 
        {
            # code...
            if (Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']) {
                # code...
                session()->forget('coupon');
            }
            else {
                # code...
                $this->calculateDiscounts();
            }

            $this->setAmountForCheckout();
        }
        return view('livewire.cart-component')->layout('layouts.app');
    }
}
