<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopComponent extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = "bootstrap";

    public $pageSize = 12;

    public $orderBy = "Default Sorting";

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        Session()->flash('success_message', 'Item added in cart');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {
       $this->pageSize = $size; 
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
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
        if ($this->orderBy == 'Price: Low to High') {
            $products = Product::orderBy('regular_price','ASC')->Paginate($this->pageSize);
        }
        elseif($this->orderBy == 'Price: High to Low'){
            $products = Product::orderBy('regular_price','DESC')->Paginate($this->pageSize);
        }
        elseif($this->orderBy == 'Sort By Newness'){
            $products = Product::orderBy('created_at','DESC')->Paginate($this->pageSize);

        }
        else{
            $products = Product::Paginate($this->pageSize);
        }

        $categories = Category::orderBy('name','ASC')->get();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.shop-component',['products'=>$products,'nproducts'=>$nproducts,'categories'=> $categories])->layout('layouts.app');
    }
}
