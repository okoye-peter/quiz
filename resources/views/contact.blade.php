@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <style>
        .error{
            color: red;
            font-style: italic;
        }
    </style>

@endsection

@section('content')
    <div class="container-contact100">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show w-100">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('success')}}
          </div>
        @endif
        <div class="wrap-contact100">
            <form class="contact100-form validate-form" method="POST" action="{{route('contact.save')}}">
                @csrf
                <span class="contact100-form-title">
                    Send Us A Message
                </span>

                @error('firstname')
                    <small class="error">{{ $message }}</small>
                @enderror
                @error('lastname')
                    <small class="error">{{ $message }}</small>
                @enderror
                <label class="label-input100" for="first-name">Tell us your name *</label>
                <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
                    <input id="first-name" class="input100" type="text" name="firstname" placeholder="First name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
                    <input class="input100" type="text" name="lastname" placeholder="Last name">
                    <span class="focus-input100"></span>
                </div>

                @error('email')
                    <small class="error">{{ $message }}</small>
                @enderror
                <label class="label-input100" for="email">Enter your email *</label>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input id="email" class="input100" type="email" name="email" placeholder="Eg. example@email.com">
                    <span class="focus-input100"></span>
                </div>

                @error('phone')
                    <small class="error">{{ $message }}</small>
                @enderror
                <label class="label-input100" for="phone">Enter phone number</label>
                <div class="wrap-input100">
                    <input id="phone" class="input100" type="tel" name="phone" placeholder="Eg. +1 800 000000">
                    <span class="focus-input100"></span>
                </div>

                @error('message')
                    <small class="error">{{ $message }}</small>
                @enderror
                <label class="label-input100" for="message">Message *</label>
                <div class="wrap-input100 validate-input" data-validate = "Message is required">
                    <textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        Send Message
                    </button>
                </div>
            </form>

            <div class="contact100-more flex-col-c-m" style="background-image: url({{asset('image/bg-01.jpg')}});">
                <div class="flex-w size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-map-marker"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Address
                        </span>

                        <span class="txt2">
                            Mada Center 8th floor, 379 Hudson St, New York, NY 10018 US
                        </span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            Lets Talk
                        </span>

                        <span class="txt3">
                            +1 800 1236879
                        </span>
                    </div>
                </div>

                <div class="dis-flex size1 p-b-47">
                    <div class="txt1 p-r-25">
                        <span class="lnr lnr-envelope"></span>
                    </div>

                    <div class="flex-col size2">
                        <span class="txt1 p-b-20">
                            General Support
                        </span>

                        <span class="txt3">
                            contact@example.com
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<div id="dropDownSelect1"></div>


	<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>

	<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>

	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>

	<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>

	<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>

	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
@endsection