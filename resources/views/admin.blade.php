@extends('layout');

@section('header')
<li class="menu-item">
    <a class="link-term mercado-item-title"> Admin Dashboard</a>
</li>
<li class="menu-item">
    <a href="{{ route('item.add') }}" class="link-term mercado-item-title">Add item</a>
</li>
<li class="menu-item">
    <a href="{{ route('cart') }}" class="link-term mercado-item-title">Cart</a>
</li>
<li class="menu-item">
    <a href="{{ route('logout') }}" class="link-term mercado-item-title">Logout</a>
</li>
@endsection

@section('content')
<div class="container">
    <h1>Active Boxes </h1>
    @if (sizeof($boxes) == 0)
        <h5> There is No Active Boxes </h5>
    @endif
    <div class="row">
        @foreach ($boxes as $box )
        <ul class="product-list grid-products equal-container">
            <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                       
                            <figure><img src="assets/images/istockphoto-1282219840-170667a.jpg" ></figure>
                       
                    </div>
                    <div class="product-info">
                        <span>{{ $box -> name }}</span>
                        <div>
                            <span> Owner's ID :{{ $box -> owner }}</span>
                        </div>
                        <div class="wrap-price"><span class="product-price">{{ $box -> price }} ETH</span></div>
                        <div>
                            <span>Discription:</span>
                            <span>{{ $box  -> disc }}</span>
                        </div>
                    </div>  
                </div>
            </li>
        </ul>
        @endforeach
    
    </div>
    <hr>
   
</div>
<div class="container">
    <h2> Choose a box to be the winner Box !</h2>
   
    <a href="{{ route('winner.select') }}"> Select a Winner </a>
    <hr>
</div>
<div class="container">
    <h1>Avaliable items</h1>
    <div class="row">
        @foreach ($items as $item )
        <ul class="product-list grid-products equal-container">
    
            <li class="col-lg-2 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                            <figure><img src="assets/images/products/digital_20.jpg" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{ $item -> name }}</span></a>
                        <div class="wrap-price"><span class="product-price">{{ $item -> price }} ETH</span></div>
                        <a href="{{route('cart.Add' , ['item_id' => $item -> id])}}" class="btn add-to-cart">Add To Box</a>
                    </div>
                </div>
            </li>
           
    
        </ul>
        @endforeach
       
       
       
    
    </div>
</div>



@endsection