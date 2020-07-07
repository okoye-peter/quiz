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
                        <div class="col-12">
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
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="table-1_length">
                                                        <label>Show 
                                                            <select name="table_length" class="form-control form-control-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select>
                                                            entries
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="table-1_filter" class="dataTables_filter">
                                                        <label>Search:
                                                            <input type="search" class="form-control form-control-sm" placeholder="">
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
                                                        <tbody>
                                                            @foreach ($courses as $course)
                                                                <tr>
                                                                    <td>{{ $course->id }}</td>
                                                                    <td>{{ $course->course }}</td>
                                                                    <td>{{ $course->time_limit }}</td>
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
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="table-1_info" role="status" aria-live="polite">Showing 1 to 10 of 12 entries</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
                                                        <ul class="pagination">
                                                            <li class="paginate_button page-item previous disabled" id="table-1_previous"><a href="#" aria-controls="table-1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                            <li class="paginate_button page-item active"><a href="#" aria-controls="table-1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#" aria-controls="table-1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item next" id="table-1_next"><a href="#" aria-controls="table-1" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li>
                                                        </ul>
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
    <script>
        function toggleForm() {
            /* Toggle between hiding and showing the active panel */
            let panel = document.querySelector('.panel');
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        };
    </script>
@endsection