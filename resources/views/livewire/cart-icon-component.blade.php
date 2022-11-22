<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{route('shop.cart')}}">
        <img alt="cart" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
        @if (Cart::instance('cart')->count()>0)
            <span class="pro-count blue">{{Cart::count()}}</span>
        @endif
        
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach (Cart::instance('cart')->content() as $item)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}"><img alt="{{$item->model->name}}" src="{{asset('assets/imgs/shop/product-')}}{{$item->model->id}}-1.jpg"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{route('product.details',['slug'=>$item->model->slug])}}">{{ Str::substr($item->model->name,0,20)}}.....</a></h4>
                    <h4><span>{{$item->qty}} x </span>{{$item->model->regular_price}} FCFA</h4>
                </div>
                {{--<div class="shopping-cart-delete">
                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                </div>--}}
            </li>  
            @endforeach
            
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>{{Cart::instance('cart')->total()}} FCFA</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{route('shop.cart')}}" class="outline">View cart</a>
                <a href="#" wire:click.prevent="checkout">Checkout</a>
            </div>
        </div>
    </div>
</div>