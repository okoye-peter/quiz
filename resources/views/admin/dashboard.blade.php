@extends('admin.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')
    <div class="container">
      <div class="row bg-white shadow-sm p-3 rounded">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="#">All <span class="badge badge-white">10</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Draft <span class="badge badge-primary">2</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pending <span class="badge badge-primary">3</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
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
                    <select class="form-control selectric" tabindex="-1">
                      <option>Action For Selected</option>
                      <option>Move to Draft</option>
                      <option>Move to Pending</option>
                      <option>Delete Permanently</option>
                    </select>
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
                        <div class="custom-checkbox custom-checkbox-table custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                            class="custom-control-input" id="checkbox-all">
                          <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                        </div>
                      </th>
                      <th>Author</th>
                      <th>Email</th>
                      <th>courses</th>
                      <th>Created At</th>
                      <th>Results</th>
                      <th>Status</th>
                    </tr>
                    @foreach ($users as $user)
                      <tr class="user">
                        <td>
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
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
                        @if ($user->result)
                          @php
                            $result = json_decode($user->result->scores, true);
                            $total = array_sum($result);
                          @endphp
                          <td>{{ $total }}</td>
                        @else
                            <td>not available</td>
                        @endif
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