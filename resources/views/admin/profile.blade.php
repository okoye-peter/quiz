@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/profile.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-3 col-md-3 col-sm-3 col-3 d-flex align-content-center  justify-content-center">
                <img src="{{ asset($user->image) }}" alt="">
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-9">
                <div class="shadow grid p-4">
                    <span>
                        Name:
                    </span>
                    <input type="text" value="{{ $user->name }}" disabled>
                </div>

            </div>
        </div>
    </div>
@endsection