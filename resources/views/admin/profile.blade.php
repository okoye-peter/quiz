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
                    <span>
                        Email:
                    </span>
                    <input type="email" value="{{ $user->email }}" disabled>
                    <span>
                        Address:
                    </span>
                    <input type="text" value="{{ $user->address }}" disabled>
                    <span>
                        City:
                    </span>
                    <input type="text" value="{{ $user->city }}" disabled>
                    <span>
                        Gender:
                    </span>
                    <input type="text" value="{{ $user->gender }}" disabled>
                    <span>
                        Date of birth:
                    </span>
                    <input type="date" value="{{ $user->birth }}" disabled>
                    <span>
                        Nationality:
                    </span>
                    <input type="text" value="{{ $user->nationality }}" disabled>
                </div>
            </div>
        </div>
    </div>
@endsection