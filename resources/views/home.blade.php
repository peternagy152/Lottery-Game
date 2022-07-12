@extends('layout');

@section('header')
<li class="menu-item">
    <a href="{{ route('logout') }}" class="link-term mercado-item-title">Logout</a>
</li>
@endsection
@section('content')

<div class="container">
    <h1>Welcome {{ $user_logged_in -> Fname }}</h1>
    <h2>Dashboard of Latest 3 winners</h2>
    <table style="width:100%">
        <tr>
            <th> winner </th>
            <th> Box </th>
            <th>Prize</th>
        </tr>
        <hr>

        @foreach ($Latest_winners as $w )
        <tr>
            <td>{{  $w -> owner_name }}</td>
            <td>{{  $w -> box_name }}</td>
            <td>{{  $w -> prize }}</td>
        </tr>
           
        @endforeach
    </table>
</div>
<div class="container">
    
   
    <h3> Your Previously Bought Boxes </h3>
    <hr>
    @if (sizeof($Pre_boxes) == 0)
            <h3> There is No Pre-boxes </h3>
        @endif
    @foreach ($Pre_boxes as $Pre_box )
    <ul class="product-list grid-products equal-container">
        <li class="col-lg-2 col-md-6 col-sm-6 col-xs-6 ">
            <div class="product product-style-3 equal-elem ">
                <div class="product-thumnail">
                        <figure><img src="assets/images/istockphoto-1282219840-170667a.jpg" ></figure>
                </div>
                <div class="product-info">
                    <span>{{ $Pre_box -> name }}</span>
                    
                    <div class="wrap-price"><span class="product-price">{{ $Pre_box -> price }} ETH</span></div>
                    
                </div>  
            </div>
        </li>
    </ul>
    @endforeach

</div>

<div class="container">
    <h1> Avaliable Active Boxes You Can buy </h1>
    <hr>
</div>
<div class="container">
    <div class="row">
        @if (sizeof($boxes) == 0)
            <h3> There is No Active boxes </h3>
        @endif
        @foreach ($boxes as $box )
        <ul class="product-list grid-products equal-container">
            <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                       
                            <figure><img src="assets/images/istockphoto-1282219840-170667a.jpg" ></figure>
                       
                    </div>
                    <div class="product-info">
                        <span>{{ $box -> name }}</span>
                        
                        <div class="wrap-price"><span class="product-price">{{ $box -> price }} ETH</span></div>
                        <div>
                            <span>Discription:</span>
                            <span>{{ $box  -> disc }}</span>
                        </div>
                        <a href="{{route('buyitem' , ['box_id' => $box -> id])}}" class="btn add-to-cart">Buy Box </a>
                    </div>  
                </div>
            </li>
        </ul>
        @endforeach
    
    </div>
</div>



@endsection