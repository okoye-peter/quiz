@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/questions.css') }}">
    
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
                            <button type="button" class="btn btn-sm btn-success mb-2" onclick="toggleForm()">Add Question</button>
                            @error('question')
                                <small class="d-block">{{ $message }}</small>
                            @enderror
                            @error('answer')
                                <small  class="d-block">{{ $message }}</small>
                            @enderror
                            @error('option1')
                                <small  class="d-block">{{ $message }}</small>
                            @enderror
                            @error('option2')
                                <small  class="d-block">{{ $message }}</small>
                            @enderror
                            @error('option3')
                                <small  class="d-block">{{ $message }}</small>
                            @enderror
                            <form class="form-inline mb-3 panel" action="{{ route('question.create', [$course->id]) }}" method="post">
                                @csrf
                                <div class="grid">
                                    <div>
                                        <label for="question">Question:</label>
                                        <input type="text" class="form-control form-control-sm mx-2 mb-2" placeholder="Enter question" name="question[]">
                                    </div>
                                    <div>
                                        <label for="answer" class="ml-4">Answer:</label>
                                        <input type="text" class="form-control form-control-sm mx-2" placeholder="Enter answer" name="answer[]">
                                    </div>
                                    <div>
                                        <label for="option" class="ml-4">Option 1:</label>
                                        <input type="text" class="form-control form-control-sm mx-2" placeholder="Enter option 1" name="option1[]">
                                    </div>
                                    <div>
                                        <label for="option" class="ml-4">Option 2:</label>
                                        <input type="text" class="form-control form-control-sm mx-2" placeholder="Enter option 2"  name="option2[]">
                                    </div>
                                    <div>
                                        <label for="option">Option 3:</label>
                                    <input type="text" class="form-control form-control-sm mx-2" placeholder="Enter option 3" name="option3[]">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark mr-2 btn-sm my-2" id="create">Create</button> 
                                <button type="button" class="btn-link btn btn-sm mr-2 my-2" onclick="toggleForm()"> Cancel</button>
                                <button type="button" class="btn-primary btn btn-sm my-2" onclick="addNewRow()">Add new row</button>

                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{$course->course}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="table-1_length">
                                                        <label class="d-flex">Show 
                                                            <select name="table_length" class="form-control form-control-sm mx-2 w-25">
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
                                                        <label class="ml-auto d-flex justify-content-end">
                                                            Search:  <input type="search" class="form-control form-control-sm w-50 ml-2" onkeyup="filter(this.value)" placeholder="filter table">
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
                                                                <th>Question</th>
                                                                <th>Answer</th>
                                                                <th>option 1</th>
                                                                <th>option 2</th>
                                                                <th>option 3</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="users">
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach ($questions as $question)
                                                                <tr class="user">
                                                                    <td>
                                                                        {{ $i++ }}
                                                                    </td>
                                                                    <td>
                                                                        <question-edit :id="{{ $question->id }}" column="question" val="{{ $question->question }}"></question-edit>
                                                                    </td>
                                                                    <td>
                                                                        <question-edit :id="{{ $question->id }}" column="answer" val="{{ $question->answer }}"></question-edit>
                                                                    </td>
                                                                    <td>
                                                                        <question-edit :id="{{ $question->id }}" column="option1" val="{{ $question->option1 }}"></question-edit>
                                                                    </td>
                                                                    <td>
                                                                        <question-edit :id="{{ $question->id }}" column="option2" val="{{ $question->option2 }}"></question-edit>
                                                                    </td>
                                                                    <td>
                                                                        <question-edit :id="{{ $question->id }}" column="option3" val="{{ $question->option3 }}"></question-edit>
                                                                    </td>
                                                                    <td>
                                                                        <form action="{{ route('question.delete', [$question->id]) }}" method="post">
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
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers" id="table-1_paginate">
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