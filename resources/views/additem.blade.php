@extends('layout');
@section('header')
<li class="menu-item">
    <a href="{{ route('AdminPage') }}" class="link-term mercado-item-title">Dashboard</a>
</li>
<li class="menu-item">
    <a href="{{ route('logout') }}" class="link-term mercado-item-title">Logout</a>
</li>
@endsection
@section('content')
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="{{ route('item') }}" , method="get" >								
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Name*</label>
                                    <input type="text" id="frm-reg-lname" name="name" >
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">image*</label>
                                    <input type="text" id="frm-reg-lname" name="image" >
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Discreption</label>
                                    <input type="text" id="frm-reg-lname" name="disc" >
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Price*</label>
                                    <input type="integer" id="frm-reg-lname" name="price" >
                                </fieldset>
                                
                                <input type="submit"  href ="{{ route('item') }}"class="btn btn-sign" value="Register" name="register">
                            </form>
                        </div>											
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>
<!--main area-->
@endsection