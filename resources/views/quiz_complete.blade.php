@extends('layouts.app')

@section('css')
    <style>
        .wrapper{
            height: 40em;
        }

        .wrapper h1{
            font-family: cursive;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="d-flex">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 wrapper">
                <img src="{{ asset('image/images.png') }}" alt="" class="d-block mx-auto my-4">
                <h1 class="text-center my-5">
                    You have successfully <br>
                    completed the quiz.
                </h1>
            </div>
        </div>
    </div>
@endsection