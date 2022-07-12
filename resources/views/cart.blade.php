@extends('layout')
@section('content')
<div class="container">
    @if (Cart::count()===0)
    <h1> Your Shopping Cart is Empty </h1>
    @else
    <div class="wrap-iten-in-cart">
        <ul class="products-cart">
            
            
            @foreach (Cart::content() as $item )
            <li class="pr-cart-item">
                <div class="product-image">
                    <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                </div>
                <div class="product-name">
                    <a class="link-to-product" href="#">{{ $item -> name }}</a>
                </div>
                
                <div class="price-field sub-total"><p class="price">{{ $item -> price }} ETH</p></div>
                <div class="delete">
                    <a href="" class="btn btn-delete" title="">
                        <span>Delete from your cart</span>
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </a>
                </div>
            </li>
            @endforeach
            
            								
        </ul>
    </div>
    
    <div class="summary">
        <div class="order-summary">
            <h4 class="title-box">Box Summary</h4>
            <p class="summary-info"><span class="title">Subtotal</span><b class="index">{{ Cart::subtotal() }} ETH </b></p>
          
        </div>
        <div class="checkout-info">
           
            <a class="btn btn-checkout" href="{{ route('create.box') }}">Create Box </a>
           
        </div>
        <div class="update-clear">
            <a class="btn btn-clear" href="{{ route('Empty.cart') }}">Clear Shopping Cart</a>
        </div>
    </div>
</div>
    @endif
    
    
    @endsection

