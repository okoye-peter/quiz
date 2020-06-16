@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">    
@endsection
@section('content')
<div class="container-fliud">
    <div class="row justify-content-center w-100 mx-0">
        <div class="col-3 col-lg-3 col-md-3 col-sm-3" id="first">
            <img src="{{ $user->image }}" class="img-thumbnail my-5">
            <div class="row w-100 flex-wrap">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    Name:
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    {{$user->name}}
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    Email: 
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    {{$user->email}}
                </div>

            </div>
        </div>
        <div class="col-8 col-lg-8 col-md-8 col-sm-8">
            <h5 class="w-50 mt-5">
                Select your preferred Subjects at least 4:
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
                <div class="option">
                    @foreach ($courses as $course)
                        <div class="form-group">
                            <input id="{{$course}}" type="checkbox" class="form-check-label @error('{{$course}}') is-invalid @enderror" name="course[]" value="{{$course}}" >

                            <label for="{{$course}}">{{$course}}</label>
                        </div>
                    @endforeach
                </div>

                <input type="submit" value="register" class="btn btn-info mb-4 ml-5 text-white">
                @csrf
            </form>
        </div>
    </div>


    <div class="row w-100 shadow px-5 py-4 mx-0">
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
