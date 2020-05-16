@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">    
@endsection
@section('content')
<div class="container-fliud">
    <div class="row justify-content-center w-100">
        <div class="col-3" id="first">
            <img src="{{ $user->image }}" class="img-thumbnail my-5">
            <div class="row w-100">
                <div class="col-6">
                    Name:
                </div>
                <div class="col-6">
                    {{$user->name}}
                </div>
                <div class="col-6">
                    Email: 
                </div>
                <div class="col-6">
                    {{$user->email}}
                </div>

            </div>
        </div>
        <div class="col-8">
            <h5 class="w-50 mt-5">
                Select your preferred Subjects atleast 4:
            </h5>

            <form action="{{ route('courseReg') }}" method="post">
                @if ($errors->has('course'))
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="Mathematics" type="checkbox" class="form-check-label @error('Mathatics') is-invalid @enderror" name="course[]" value="Mathematics" >

                        <label for="Mathematics" class="col-md-4 col-form-label text-md-left">{{ __('Mathematics') }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="English_Language" type="checkbox" class="form-check-label @error('Mathatics') is-invalid @enderror" name="course[]" value="English Language" >

                        <label for="English_Language" class="col-md-4 col-form-label text-md-left">{{ __('English Language') }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="Physics" type="checkbox" class="form-check-label @error('Physics') is-invalid @enderror" name="course[]" value="Physics" >

                        <label for="Physics" class="col-md-4 col-form-label text-md-left">{{ __('Physics') }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="Chemistry" type="checkbox" class="form-check-label @error('Chemistry') is-invalid @enderror" name="course[]" value="Chemistry" >

                        <label for="Chemistry" class="col-md-4 col-form-label text-md-left">{{ __('Chemistry') }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="Biology" type="checkbox" class="form-check-label @error('Biology') is-invalid @enderror" name="course[]" value="Biology" >

                        <label for="Biology" class="col-md-4 col-form-label text-md-left">{{ __('Biology') }}</label>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-6">
                        <input id="Economics" type="checkbox" class="form-check-label @error('Economics') is-invalid @enderror" name="course[]" value="Economics" >

                        <label for="Economics" class="col-md-4 col-form-label text-md-left">{{ __('Economics') }}</label>
                    </div>
                </div>

                <input type="submit" value="register" class="btn btn-info mb-4 ml-5 text-white">
                @csrf
            </form>
        </div>
    </div>


    <div class="row w-100 shadow px-5 py-4">
        <div class="col-3 text-muted">
            <h4 class=" mb-4">CUSTOMER FAVES</h4>
            <p>Quiz Maker</p>
            <p>Survey Maker </p>
            <p>Form Builder </p>
            <p>Poll Maker </p>
            <p>Survey & Questionnaire Template </p>
            <p>Form Templates </p>
            <p>Survey Questions</p>
            <p>Contact Forms</p>
            <p>Registration Forms</p>
            <p>Job Application Forms</p>
        </div>
        <div class="col-3 text-muted">
            <h4 class=" mb-4">HELP & INSPIRATION</h4>
            <p>Help Center</p>
            <p>FAQs</p>
            <p>Blogs</p>
            <p>Typeform Agencies</p>
        </div>
        <div class="col-3 text-muted">
            <h4 class=" mb-4">CONNECT</h4>
            <p>Mailchimp</p>
            <p>Hubspot</p>
            <p>Autopilot</p>
            <p>Trello</p>
            <p>Google Sheet</p>
            <p>All apps & integrations</p>
            <p>Developers</p>
            <p>Partner with us</p>
        </div>
        <div class="col-3 text-muted">
            <h4 class=" mb-4">CONNECT</h4>
            <p>Careers</p>
            <p>What we believe</p>
            <p>News</p>
            <p>Contact us</p>
            <p>Contact sales</p>
            <p>Terms & Conditions</p>
            <p class="d-flex justify-content-around">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-instagram"></i>
                <i class="fa fa-youtube"></i>
                <i class="fa fa-linkedin"></i>
            </p>
        </div>
    </div>
</div>

@endsection
