<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
       $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        Session()->flash('success_message', 'Item added in cart');
        return redirect()->route('shop.cart');
    }
    public function addToWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-icon-component','refreshComponent');
    }

    public function removefromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component','refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        $product = Product::where('slug',$this->slug)->first();
        $rproducts = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.details-component', ['product'=>$product,'nproducts'=>$nproducts,'rproducts'=>$rproducts,'categories'=> $categories])->layout('layouts.app');
    }
}
