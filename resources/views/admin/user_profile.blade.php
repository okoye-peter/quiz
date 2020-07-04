@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/user_profile.css') }}">    
@endsection

@section('content')
    <div class="container">
        @if (session()->has('success'))
            
            <div class="alert alert-success fade in alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                <strong>Success!</strong> {{session()->get('success')}}
            </div>
        @endif
        @if(!empty($errors))
            <div class="alert alert-danger fade in alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                @foreach ($errors as $error)
                    <small class="d-block">{{ $error }}</small>
                @endforeach
            </div>
        @endif
        <img src='{{ asset("$user->image") }}' alt="" class="img-thumbnail image">
        <div class="row flex-wrap mb-4 justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="text-center">User details</h5>
                <p class="d-flex justify-content-between">
                    <span>Name:</span>
                    <span>{{$user->name}}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Email:</span>
                    <span>{{$user->email}}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Date of birth:</span>
                    <span>{{$user->name}}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Address:</span>
                    <span>{{$user->name}}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Nationality:</span>
                    <span>{{$user->name}}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>City:</span>
                    <span>{{$user->name}}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Gender:</span>
                    <span>{{$user->name}}</span>
                </p>
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-outline-dark btn-sm d-block w-50 mx-auto" data-toggle="modal" data-target="#user_details_edit">
                    Edit Details
                </button>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="text-center">Results</h5>
                @if ($registered_courses == 'not yet registered')
                    <h5 class="text-center">not yet registered</h5>
                @else
                    @foreach ($registered_courses->course as $course)
                        <p class="d-flex justify-content-between">
                            <span>
                                {{$course}}:
                            </span>
                            @if ($result != 'not available')
                                <span>
                                    {{$result->$course}}
                                </span>
                            @endif
                        </p>                       
                    @endforeach
                @endif
            </div>
        </div>
    </div> 
    
    <!-- edit user details or registered courses modal -->
    <div class="modal fade" id="user_details_edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="close ml-auto" data-dismiss="modal">&times;</button>
                <div class="modal-body p-0">

                    <!-- toggle form -->
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#user">user details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="pill" href="#course">course</a>
                        </li>
                    </ul>

                    <!-- forms -->
                    <div class="tab-content">
                        <div id="user" class="container tab-pane active">
                            <form class="user_details_edit_form" action='{{route("user.update", [$user->id,$user->name])}}' method="post" enctype="multipart/form-data">
                                @method('PATCH')
                                <img src='{{ asset("$user->image") }}' alt="" class="user_edit_image">
                                <div class="container">
                                    <div class="row flex-wrap">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input type="name" name="name" id="name" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="dov">Date of birth:</label>
                                                <input type="date" name="birth" id="birth" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nationality">Nationality:</label>
                                                <input type="text" name="nationality" id="nationality" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select name="gender" id="gender">
                                                    <option value="" disabled selected>select a gender</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" name="email" id="email" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" name="address" id="address" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City:</label>
                                                <input type="text" name="city" id="city" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="img">image:</label>
                                                <input type="file" name="image" class="user_img" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="update" class="btn btn-sm w-50 d-block mx-auto btn-success mb-3">
                            </form>
                        </div>
                        <div id="course" class="container tab-pane fade"><br>
                            <form class="user_details_edit_form" action='{{ route("course.update", [$id, $user->name]) }}' method="post">
                                <div class="container">
                                    <div class="row flex-wrap">
                                        <div class="col-lg-12">
                                            @if ($registered_courses != 'not yet registered')
                                            <div class="card">
                                                <div class="card-header text-center">Registered Course</div>
                                                <div class="card-body d-flex justify-content-between">
                                                    @foreach ($registered_courses->course as $course)
                                                        <span>{{$course}}</span>                                     
                                                    @endforeach
                                                </div>
                                            </div>
                                            <p class="text-muted">Available Courses:</p>
                                            <form action="" method="post">
                                                @method("PATCH")
                                                @csrf
                                                <div class="edit_courses">
                                                    @foreach ($courses as $course)
                                                        <div class="form-check">
                                                            @if (in_array($course->course, $registered_courses->course))
                                                                <input type="checkbox" name="course[]" value="{{$course->course}}" class="form-check-input" checked> {{$course->course}}
                                                            @else
                                                                <input type="checkbox" name="course[]" value="{{$course->course}}" class="form-check-input"> {{$course->course}}
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <input type="submit" class="btn btn-outline-primary btn-sm w-50 d-block mx-auto mb-3 mt-2" value="update">
                                            </form>
                                                
                                            @else
                                                <h4 class="text-center">
                                                    not yet registered
                                                </h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection