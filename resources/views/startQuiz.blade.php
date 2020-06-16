@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/startQuiz.css') }}">
@endsection
@section('content')


<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-3">
			<img src="{{ $user->image }}" class="img-thumbnail my-5 mx-auto d-block wow bounceInDown">
            <div class="row w-100">
                <div class="col-6">
                    Name:
                </div>
                <div class="col-6">
                    {{$user->name}}
                </div>
                <div class="col-6">
                    Email:
                </div>
                <div class="col-6">
                    {{$user->email}}
                </div>
            </div>
            <h5 class="row timer justify-content-center my-5">
                <span id="hrs">00</span>
                <span class="blinkers">:</span>
                <span id="mins">01</span>
                <span class="blinkers">:</span>
                <span id="secs">12</span>
            </h5>
		</div>
		<div class="col-9">
			<form action="{{ route('mark') }}" method="post">
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

                @foreach($questions as $subject => $question)
                    @php
                        $z = array_search($subject, $courses) + 1;
                    @endphp
                    @if($courses[0] === $subject)<div class="tab-content"> @endif
                    <div id="tab{{$i++}}" class="tab-pane  fade @if($courses[0] === $subject) active show @endif">
                        <div class="tab-content" style="margin-bottom:50px">
                            @foreach($question as $index => $content)
                                <div class="tab-pane fade @if($index === 0) active show @endif" role="tabpanel" id="tab{{$i}}-{{ ++$index }}">
                                    {{-- quetions --}}
                                    <p class="d-flex">
                                        <span class="mr-4">{{ $index }}.</span>
                                        <span>{{ $content->question }}</span>
                                    </p>
                                    {{-- shuffle question --}}
                                    @php
                                      $options = array($content->answer, $content->option1, $content->option2, $content->option3);
                                      shuffle($options);
                                    @endphp
                                    {{-- display option --}}
                                    <p class="d-flex flex-column">
                                        @foreach($options as $x => $option)
                                            <span>
											    <input type="radio" name="{{ $subject."_".$index }}[]" value="{{ $option }}"> {{ $option }}
                                            </span>
                                        @endforeach
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        {{-- subject question number --}}
                        <ul class="nav nav-pills pagination">
                            @for ($x = 1; $x <= count($question); $x++)
                                <li  class="nav-item page-item">
                                    <a class="nav-link @if($x == 1) active @endif page-link" href="#tab{{$i}}-{{$x}}" data-toggle="tab">{{ $x }}</a>
                                </li>
                            @endfor
                        </ul>
                        {{-- subject question ends --}}
                    </div>
                @endforeach
                @csrf
                <input type="submit" value="Submit" class="btn btn-success mt-5">
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/timer.js') }}"></script>
@endsection
