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
                                                            Search:  <input type="search" class="form-control form-control-sm w-50 ml-2" placeholder="filter table">
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
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach ($questions as $question)
                                                                <tr>
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