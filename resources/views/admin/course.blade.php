@extends('admin.layouts.app') 

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/course.css') }}"> 
@endsection 
@section('content')
    <div class="container">
        <div class="row">
            <section class="section">
                <div class="section-body">
                    <div class="row">
                        <div class="col-12" id="wrapper">
                            @if (session()->has('msg'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{session()->get('msg')}}
                                </div>                                
                            @endif
                            <button type="button" class="btn btn-sm btn-success mb-2" onclick="toggleForm()">Add Course</button>
                            @error('course')
                                <small class="d-block">{{ $message }}</small>
                            @enderror
                            @error('time_limit')
                                <small  class="d-block">{{ $message }}</small>
                            @enderror
                            <form class="form-inline mb-3 panel" action="{{ route('course.create') }}" method="post">
                                @csrf
                                <label for="course">Course Title:</label>
                                <input type="text" class="form-control form-control-sm mx-2" placeholder="Enter course" id="course" name="course">
                                <label for="time" class="ml-4">Time Limit(mins):</label>
                                <input type="number" class="form-control form-control-sm mx-2" placeholder="Enter time limit" id="time" name="time_limit">
                                <button type="submit" class="btn btn-dark mr-2 btn-sm">Create</button> 
                                <button type="button" class="btn-link btn btn-sm" onclick="toggleForm()"> Cancel</button>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Courses</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 offset-6">
                                                    <div id="table-1_filter" class="dataTables_filter">
                                                        <label class="ml-auto d-flex justify-content-end">
                                                            Search: <input type="search" class="form-control w-50 ml-2 form-control-sm" placeholder="filter table" onkeyup="filter(this.value)">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table table-striped dataTable no-footer" role="grid">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="text-center">#</th>
                                                                <th>Course</th>
                                                                <th>Time Limit(mins)</th>
                                                                <th>Total Quetion(s)</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="users">
                                                            @foreach ($courses as $course)
                                                                <tr class="user">
                                                                    <td>{{ $course->id }}</td>
                                                                    <td>
                                                                        <course-edit :id="{{ $course->id }}" val="{{ $course->course }}" column="course"></course-edit>
                                                                    </td>
                                                                    <td>
                                                                        <course-edit :id="{{ $course->id }}" val="{{ $course->time_limit }}" column="time_limit"></course-edit>
                                                                    </td>
                                                                    <td>{{$course->questions ? count($course->questions) : 0 }}</td>
                                                                    <td  class="d-flex justify-content-around">
                                                                        <a href="{{ route('course.questions', [$course->id,$course->course]) }}" class="btn btn-sm btn-primary">questions</a>
                                                                        <form action="{{ route('course.delete', [$course->id,$course->course]) }}" method="post" class="form-inline">
                                                                            @csrf
                                                                            @method("DELETE")
                                                                            <button  type="submit" class="btn btn-sm btn-danger">delete</button>                                                                            
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="table-1_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div>
                                                </div> --}}
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
                                                        {{ $courses->links()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection