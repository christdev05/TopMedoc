<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

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
    
    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
