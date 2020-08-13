@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
@endsection
@section('content')
<div class="container-fluid">
	<div class="row pt-3" style="height: fit-content">
		<div class="col-lg-4 col-md-4 col-sm-12 col-12">
			<img src="{{ $user->image }}" class="img-thumbnail">
            <div class="row w-100" style="font-size: 16px">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    Name:
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    {{$user->name}}
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    Email:
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-12" id="email">
                    {{$user->email}}
                </div>
            </div>
            <h5 class="row timer justify-content-center mt-5">
                <span id="hrs">@if ($time_remaining->hour < 10)0{{$time_remaining->hour}}@else{{$time_remaining->hour}}@endif</span>
                <span class="blinkers">:</span>
                <span id="mins">@if ($time_remaining->minute < 10)0{{$time_remaining->minute}}@else{{$time_remaining->minute}}@endif</span>
                <span class="blinkers">:</span>
                <span id="secs">@if ($time_remaining->second < 10)0{{$time_remaining->second}}@else{{$time_remaining->second}}@endif</span>
            </h5>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-12">
            <form action="{{ route('mark') }}" method="post" name="quiz">
                @csrf
                {{-- subjects begins --}}
				<ul class="nav nav-pills nav-justify mb-4" role="tablist">
                    @foreach($courses as $key =>$course)
                        <li  class="nav-item">
                 			<a class="nav-link @if($key === 0) active @endif" href="#tab{{++$key}}" data-toggle="tab">{{ $course }}</a>
                 		</li>
                    @endforeach
				</ul>
                {{-- subjects ends --}}
                @php
                  $i = 1;
                @endphp
                {{-- question begins --}}
                @foreach($courses as  $x => $course)
                    @if($x === 0)<div class="tab-content"> @endif
                    <div id="tab{{$i++}}" class="tab-pane  fade @if($x === 0) active show @endif">
                        <div class="tab-content" style="margin-bottom:50px">
                            @php
                                // shuffle the subject question
                                $quests =  $questions[$course]->shuffle();
                            @endphp
                            @foreach($quests as $index => $question)
                            
                                <div class="tab-pane fade @if($index === 0) active show @endif" role="tabpanel" id="tab{{$i}}-{{ ++$index }}">
                                    {{-- quetions --}}
                                    <p class="d-flex">
                                        <span class="mr-4">{{ $index }}.</span>
                                        <span>{{ $question->question }}</span>
                                    </p>
                                    {{-- shuffle question options --}}
                                    @php
                                      $options = array($question->answer, $question->option1, $question->option2, $question->option3);
                                      shuffle($options);
                                      $sub = substr_count($course, " ") > 0 ? implode("_",explode(' ', $course)) : $course;
                                    @endphp
                                    {{-- display options --}}
                                    <p class="d-flex flex-column">
                                        @foreach($options as $x => $option)
                                            <span>
                                                <input type="radio" name="{{ $course."_".$index }}[]" value="{{ $option }}" onclick="choosen({{$sub.$index}}, this)" id="{{$sub.$index.'_'.$x}}"> {{ $option }}
                                            </span>
                                        @endforeach
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        {{-- course question numbers --}}
                        <ul class="nav nav-pills pagination">
                            @for ($x = 1; $x <= count($questions[$course]); $x++)
                                <li  class="nav-item page-item">
                                    <a class="nav-link @if($x == 1)active @endif page-link question_num" id="{{$sub.$x}}" href="#tab{{$i}}-{{$x}}" data-toggle="tab">{{ $x }}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    {{-- subject question ends --}}
                @endforeach
                <input type="submit" value="Submit" class="btn btn-success mt-5">
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/timer.js') }}"></script>
@endsection