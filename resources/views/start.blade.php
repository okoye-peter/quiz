@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/start.css') }}">    
@endsection

@section('content')
    <div class="container bg-white py-5">
        <div class="row p-5 justify-content-center">
            <img src='{{ asset("$user->image") }}' alt="" class="d-block mx-auto">

            <div class="grids">
                <span  class="grid">NAME:</span>
                <span class="grid">{{strtoupper($user->name)}}</span>
                <span class="grid">EMAIL:</span>
                <span class="grid">{{strtoupper($user->email)}}</span>
                <span class="grid">NATIONALITY:</span>
                <span class="grid">{{strtoupper($user->nationality)}}</span>
                <span class="grid">DATE OF BIRTH:</span>
                <span class="grid">{{strtoupper($user->birth)}}</span>
                <span class="grid">ADDRESS:</span>
                <span class="grid">{{strtoupper($user->address)}}</span>
                <span class="grid">GENDER:</span>
                <span class="grid">{{strtoupper($user->gender)}}</span>
            </div>
        </div>
        <div class="row my-3 flex-column ml-5">
            <h3 class="text-muted ml-5" style="text-decoration: underline">Courses:</h3>
            <div class="subject ml-5">
                @foreach ($courses as $course)
                    <span>{{$course}}</span>
                    <span>{{$time[$course]}} mins</span>
                @endforeach
                <span>Total time:</span>
                <span>{{array_sum($time)}} mins</span>
            </div>

            <a href="{{ route('start.quiz', [$user->id,$user->name]) }}" class="btn btn-success my-5">Start Quiz</a>
        </div>
    </div>
@endsection