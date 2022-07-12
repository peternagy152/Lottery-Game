@extends('layout');

@section('header')
<li class="menu-item">
    <a href="{{ route('login') }}" class="link-term mercado-item-title">Login</a>
</li>
@endsection
@section('content')

<!--main area-->
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
                            <form class="form-stl" action="{{ route('reg') }}" method="get" >
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                    <h4 class="form-subtitle">Personal infomation</h4>
                                </fieldset>									
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">First Name*</label>
                                    <input type="text" id="frm-reg-lname" name="Fname" >
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Last Name*</label>
                                    <input type="text" id="frm-reg-lname" name="Lname" >
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Phone Number*</label>
                                    <input type="text" id="frm-reg-lname" name="phone" >
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Gender*</label>
                                    <input type="text" id="frm-reg-lname" name="gender" >
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Email Address*</label>
                                    <input type="email" id="frm-reg-email" name="email" placeholder="Email address">
                                </fieldset>
                                
                                <fieldset class="wrap-functions ">
                                    <label class="remember-field">
                                        <input name="newletter" id="new-letter" value="forever" type="checkbox"><span>Sign Up for Newsletter</span>
                                    </label>
                                </fieldset>
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Login Information</h3>
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="frm-reg-pass">Password *</label>
                                    <input type="text" id="frm-reg-pass" name="reg-pass" placeholder="Password">
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="frm-reg-cfpass">Confirm Password *</label>
                                    <input type="text" id="frm-reg-cfpass" name="reg-cfpass" placeholder="Confirm Password">
                                </fieldset>
                                <input type="submit"  href ="{{ route('reg') }}"class="btn btn-sign" value="Register" name="register">
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