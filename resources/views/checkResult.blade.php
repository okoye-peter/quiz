@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkResult.css') }}">
@endsection

@section('content')

    <div class="d-flex justify-content-center p-5 ">
        <form action="{{ route('result') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>

@endsection