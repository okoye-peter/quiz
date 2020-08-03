@extends('admin.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')
    <div class="container wrapper">
      @if (session()->has('msg'))
          <div class="alert alert-success alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              {{session()->get('msg')}}
          </div>                                
      @endif
      <div class="row bg-white shadow-sm p-3 rounded">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <button type="button" class="btn btn-primary p-1 text-white nav-link">
              Users <span class="badge badge-light">{{$all}}</span>
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-success p-1 text-white nav-link">
              completed <span class="badge badge-light">{{$completed}}</span>
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-danger p-1 text-white nav-link">
              Unregistered <span class="badge badge-light">{{$pending}}</span>
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-warning p-1 nav-link">
              In progress <span class="badge badge-light">{{$inProgress}}</span>
            </button>
          </li>
          <li class="nav-item">
            <button type="button" class="btn btn-info p-1 nav-link">
              not started <span class="badge badge-light">{{$notStarted}}</span>
            </button>
          </li>
        </ul>
      </div>

      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Posts</h4>
            </div>
            <div class="card-body">
              <div class="float-left">
                <div class="selectric-wrapper selectric-form-control selectric-selectric">
                  <div class="selectric-hide-select">
                    <form action="{{ route('admin.decision') }}" method="post" class="form-inline" name="addToArray">
                      @csrf
                      <input type="hidden" name="users_id" id="users_id">
                      <label class="d-flex" style="font-size: 14px">
                        Choose action to be performed on selected users:
                        <select class="form-control selectric ml-2" tabindex="-1" name="action" required onchange="this.parentNode.parentNode.submit()">
                          <option disabled selected >Action to be performed</option>
                          <option value="Delete Permanently">Delete Permanently</option>
                          <option value="Make Admins">Make Admins</option>
                          <option value="Restart Quiz">Restart Quiz</option>
                        </select>
                      </label>
                    </form>
                  </div>
                </div>
              </div>
              <div class="float-right">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="filter table" onkeyup="filter(this.value)">
                  </div>
                </form>
              </div>
              <div class="clearfix mb-3"></div>
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody id="users">
                    <tr>
                      <th class="pt-2">
                      
                      </th>
                      <th>Author</th>
                      <th>Email</th>
                      <th>courses</th>
                      <th>Created At</th>
                      <th>Status</th>
                    </tr>
                    @foreach ($users as $user)
                      <tr class="user">
                        <td>
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" class="form-check-input" value="{{$user->id}}" name="{{$user->name}}" onclick="setUsersInputValue(this)">
                          </div>
                        </td>
                        <td>
                          <a href="{{ route('user.profile', [$user->id, $user->name]) }}">
                            <img alt="image" src='{{ asset("$user->image") }}' class="rounded-circle" width="35"
                              data-toggle="title" title="">
                            <span class="d-inline-block ml-1">{{ $user->name }}</span>
                          </a>
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        @if ($user->registered_courses)
                          <td>{{ implode(', ',json_decode($user->registered_courses->courses)->course) }}</td>    
                        @else
                          <td>no course registered</td>
                        @endif
                        <td>{{ $user->created_at }}</td>
                        <td>
                          @if ($user->registered_courses)
                            @if ($user->registered_courses->started && $user->registered_courses->completed == true)
                              <div class="badge badge-success">Completed</div>
                            @elseif($user->registered_courses->started && $user->registered_courses->completed == false)
                              <div class="badge badge-warning">In progress</div>
                            @elseif(!$user->registered_courses->started)
                              <div class="badge badge-info text-white">not started</div>
                            @endif
                          @else
                            <div class="badge badge-danger">Pending</div>  
                          @endif
                        </td>
                      </tr>    
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
@endsection

@section('script')
  <script src="{{ asset('js/dashboard.js') }}"></script>    
@endsection