@extends('admin.layouts.app')
@section('css')
    <style>
        .shadow p {
            font-size: 14px
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="container">
            @foreach ($complaints as $complaint)
                <div class="row shadow py-1 px-5 mb-3">
                    <p class="w-100 mb-0">
                        <span class="mr-5">Name:</span>
                        <span class="text-muted">{{$complaint->name}}</span>
                    </p>
                    <p class="w-100 mb-0">
                        <span class="mr-5">Email:</span>
                        <span class="text-muted">{{$complaint->email}}</span>
                    </p>
                    <p style="text-decoration: underline" class="mb-0">Body:</p>
                    <p class="w-100 text-info text-justify">{{$complaint->message}}</p>
                </div>
            @endforeach
            <div class="row justify-content-end">
                {{$complaints->links()}}
            </div>
        </div>
    </div>
@endsection