@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
    <link rel="stylesheet" href="{{asset('WOW-master/css/libs/animate.css')}}">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    {{-- goole fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Pacifico|Playfair+Display&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid py-0">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="py-4  px-auto w-50 ml-5 mt-5 wow swing center" data-wow-iteration="2" style="visibility: visible; animation-iteration-count: 2; animation-name: swing;">
                    <h4 class="text-center">
                        <span>
                            {{ __('Register') }}
                        </span>
                        <i class="fas fa-pencil-alt float-right mr-5"></i>
                    </h4>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="d-flex flex-column justify-content-around h-100">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Profile Pics') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center flex-column mx-auto">
                    <h1 class="text-center">
                        Register To Our Course
                    </h1>
                    <p class="text-center">We have been working very hard to create the new version of our Course. It <br> comes with alot of features. Check it out now!</p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-warning mr-5">Our Prices <i class="fa fa-angle-right"></i></button>
                        <button disabled="disabled" class="btn btn-dark"> Learn More <i class="fa fa-lightbulb"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('WOW-master/dist/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
@endsection
