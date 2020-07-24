@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/results.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="shadow p-3 rounded w-100  bg-white">
                <div class="row pl-4">
                    <label class="d-flex text-muted">Search: <input type="text" name="search" class="form-control form-control-sm ml-2" onkeyup="searchResult(this.value)"></label>
                </div>
                <div class="header px-4 pt-4">
                    <span class="text-muted text-center">
                        User
                    </span>
                    <span class="text-muted text-center">
                        Aggregate
                    </span>
                </div>
                <hr>
                @foreach ($results as $result)
                    <div class="grid p-4">
                        <span>
                          <img src="{{ asset($result->user->image) }}" alt="" class="mr-3">  
                            <a href="{{ route('user.profile', [$result->user->id, $result->user->name]) }}">{{$result->user->name}}</a>
                        </span>
                        <span class="text-center">
                            {{array_sum(json_decode($result->scores, true))}}
                        </span>
                    </div>
                @endforeach
                <div class="row justify-content-center">
                    {{$results->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
  <script src="{{ asset('js/dashboard.js') }}"></script>    
@endsection