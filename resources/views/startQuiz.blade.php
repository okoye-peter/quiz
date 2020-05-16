@extends('layouts.app')

@section('css')
	<link rel="stylesheet" href="{{ asset('css/startQuiz.css') }}">
@endsection
@section('content')


<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-3">
			<img src="{{ $user->image }}" class="img-thumbnail my-5 mx-auto d-block">
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
				<div class="tab-content">
                    @foreach($questions as $subject => $question)
                        <div class="tab-pane  fade @if($courses[0] === $subject) active show @endif" id="tab{{$i++}}">
                            <div class="tab-content" style="margin-bottom:50px">
                                @foreach($question as $index => $content)
                                    <div class="tab-pane fade @if($index === 0) active show @endif" role="tabpanel" id="tab1-{{ ++$index }}">
                                        {{-- quetions --}}
                                        <p class="d-flex">
                                            <span class="mr-4">{{ $index }}.</span>
                                            <span>{{ $content->question }}</span>
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach
{{--					<div class="tab-pane fade active show" id="tab1">--}}

{{--						 first subject questions --}}
{{--						<div class="tab-content" style="margin-bottom:50px">--}}
{{--							@for ($i = 1; $i <= count($coursesQuestion[$keys[0]]); $i++)--}}
{{--								@php--}}
{{--									$answer = $coursesQuestion[$keys[0]][($i - 1)]->answer;--}}
{{--									$option1 = $coursesQuestion[$keys[0]][($i - 1)]->option1;--}}
{{--									$option2 = $coursesQuestion[$keys[0]][($i - 1)]->option2;--}}
{{--									$option3 = $coursesQuestion[$keys[0]][($i - 1)]->option3;--}}

{{--									$option = array($answer, $option1, $option2, $option3);--}}
{{--									shuffle($option);--}}
{{--								@endphp--}}
{{--								@if ($i == 1)--}}
{{--									<div class="tab-pane fade active show" role="tabpanel" id="tab1-{{ $i }}">--}}
{{--										<p class="d-flex">--}}
{{--											<span class="mr-4">{{ $i }}.</span>--}}
{{--											<span>{{ $coursesQuestion[$keys[0]][($i - 1)]->question }}</span>--}}
{{--										</p>--}}
{{--										<p class="d-flex flex-column">--}}
{{--											@for ($x = 0; $x < count($option); $x++)--}}
{{--												<span>--}}
{{--													<input type="radio" name="{{ $keys[0].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--												</span>--}}
{{--											@endfor--}}
{{--										</p>--}}
{{--									</div>--}}
{{--								@else--}}

{{--								<div class="tab-pane fade" role="tabpanel" id="tab1-{{ $i }}">--}}
{{--									<p class="d-flex">--}}
{{--										<span class="mr-4">{{ $i }}.</span>--}}

{{--										<span>{{ $coursesQuestion[$keys[0]][($i - 1)]->question }}</span>--}}
{{--									</p>--}}
{{--									<p class="d-flex flex-column">--}}
{{--										@for ($x = 0; $x < count($option); $x++)--}}
{{--											<span>--}}
{{--												<input type="radio" name="{{ $keys[0].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--											</span>--}}
{{--										@endfor--}}
{{--									</p>--}}
{{--								</div>--}}
{{--							@endif--}}
{{--						@endfor--}}
{{--					</div>--}}
{{--					 frirst subject questions ends --}}

{{--					 first subject question number --}}
{{--					<ul class="nav nav-pills pagination">--}}
{{--						@for ($i = 1; $i <= count($coursesQuestion[$keys[0]]); $i++)--}}
{{--							@if ($i == 1)--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link active page-link" a href="#tab1-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@else--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link page-link" a href="#tab1-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@endif--}}
{{--						@endfor--}}
{{--					</ul>--}}
{{--					 first subject question ends --}}
{{--				</div>--}}
{{--				 first subject ends --}}


{{--				 second subject --}}
{{--				<div class="tab-pane fade" id="tab2">--}}

{{--					 second subject question --}}
{{--					<div class="tab-content" style="margin-bottom:50px">--}}
{{--						@for ($i = 1; $i <= count($coursesQuestion[$keys[1]]); $i++)--}}
{{--							@php--}}
{{--								$answer = $coursesQuestion[$keys[1]][($i - 1)]->answer;--}}
{{--								$option1 = $coursesQuestion[$keys[1]][($i - 1)]->option1;--}}
{{--								$option2 = $coursesQuestion[$keys[1]][($i - 1)]->option2;--}}
{{--								$option3 = $coursesQuestion[$keys[1]][($i - 1)]->option3;--}}

{{--								$option = array($answer, $option1, $option2, $option3);--}}
{{--								shuffle($option);--}}
{{--							@endphp--}}
{{--								@if ($i == 1)--}}
{{--									<div class="tab-pane fade active show" role="tabpanel" id="tab2-{{ $i }}">--}}
{{--										<p class="d-flex">--}}
{{--											<span class="mr-4">{{ $i }}.</span>--}}
{{--											<span>{{ $coursesQuestion[$keys[1]][($i - 1)]->question }}</span>--}}
{{--										</p>--}}
{{--										<p class="d-flex flex-column">--}}
{{--											@for ($x = 0; $x < count($option); $x++)--}}
{{--												<span>--}}
{{--													<input type="radio" name="{{ $keys[1].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--												</span>--}}
{{--											@endfor--}}
{{--										</p>--}}
{{--									</div>--}}
{{--								@else--}}

{{--								<div class="tab-pane fade" role="tabpanel" id="tab2-{{ $i }}">--}}
{{--									<p class="d-flex">--}}
{{--										<span class="mr-4">{{ $i }}.</span>--}}

{{--										<span>{{ $coursesQuestion[$keys[1]][($i - 1)]->question }}</span>--}}
{{--									</p>--}}
{{--									<p class="d-flex flex-column">--}}
{{--										@for ($x = 0; $x < count($option); $x++)--}}
{{--											<span>--}}
{{--												<input type="radio" name="{{ $keys[1].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--											</span>--}}
{{--										@endfor--}}
{{--									</p>--}}
{{--								</div>--}}
{{--							@endif--}}
{{--						@endfor--}}

{{--					</div>--}}
{{--					 second subject question ends --}}

{{--					 second subject question number --}}
{{--					<ul class="nav nav-pills pagination">--}}
{{--						@for ($i = 1; $i <= count($coursesQuestion[$keys[1]]); $i++)--}}
{{--							@if ($i == 1)--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link active page-link" a href="#tab2-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@else--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link page-link" a href="#tab2-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@endif--}}
{{--						@endfor--}}
{{--					</ul>--}}
{{--					 second subject question number --}}
{{--				</div>--}}
{{--				 second subject ends --}}


{{--				 third subject --}}
{{--				<div class="tab-pane fade" id="tab3">--}}

{{--					 third subject question --}}
{{--					<div class="tab-content" style="margin-bottom:50px">--}}
{{--						@for ($i = 1; $i <= count($coursesQuestion[$keys[2]]); $i++)--}}
{{--							@php--}}
{{--								$answer = $coursesQuestion[$keys[2]][($i - 1)]->answer;--}}
{{--								$option1 = $coursesQuestion[$keys[2]][($i - 1)]->option1;--}}
{{--								$option2 = $coursesQuestion[$keys[2]][($i - 1)]->option2;--}}
{{--								$option3 = $coursesQuestion[$keys[2]][($i - 1)]->option3;--}}

{{--								$option = array($answer, $option1, $option2, $option3);--}}
{{--								shuffle($option);--}}
{{--							@endphp--}}
{{--								@if ($i == 1)--}}
{{--									<div class="tab-pane fade active show" role="tabpanel" id="tab3-{{ $i }}">--}}
{{--										<p class="d-flex">--}}
{{--											<span class="mr-4">{{ $i }}.</span>--}}
{{--											<span>{{ $coursesQuestion[$keys[2]][($i - 1)]->question }}</span>--}}
{{--										</p>--}}
{{--										<p class="d-flex flex-column">--}}
{{--											@for ($x = 0; $x < count($option); $x++)--}}
{{--												<span>--}}
{{--													<input type="radio" name="{{ $keys[2].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--												</span>--}}
{{--											@endfor--}}
{{--										</p>--}}
{{--									</div>--}}
{{--								@else--}}

{{--								<div class="tab-pane fade" role="tabpanel" id="tab3-{{ $i }}">--}}
{{--									<p class="d-flex">--}}
{{--										<span class="mr-4">{{ $i }}.</span>--}}

{{--										<span>{{ $coursesQuestion[$keys[2]][($i - 1)]->question }}</span>--}}
{{--									</p>--}}
{{--									<p class="d-flex flex-column">--}}
{{--										@for ($x = 0; $x < count($option); $x++)--}}
{{--											<span>--}}
{{--												<input type="radio" name="{{ $keys[2].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--											</span>--}}
{{--										@endfor--}}
{{--									</p>--}}
{{--								</div>--}}
{{--							@endif--}}
{{--						@endfor--}}

{{--					</div>--}}
{{--					 third subject question ends --}}

{{--					 third subject question number --}}
{{--					<ul class="nav nav-pills pagination">--}}
{{--						@for ($i = 1; $i <= count($coursesQuestion[$keys[2]]); $i++)--}}
{{--							@if ($i == 1)--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link active page-link" a href="#tab3-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@else--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link page-link" a href="#tab3-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@endif--}}
{{--						@endfor--}}
{{--					</ul>--}}
{{--					 third subject question number --}}
{{--				</div>--}}
{{--				 third subject ends --}}

{{--				 fourth subject --}}
{{--				<div class="tab-pane fade" id="tab4">--}}

{{--					 fourth subject question --}}
{{--					<div class="tab-content" style="margin-bottom:50px">--}}
{{--						@for ($i = 1; $i <= count($coursesQuestion[$keys[3]]); $i++)--}}
{{--							@php--}}
{{--								$answer = $coursesQuestion[$keys[3]][($i - 1)]->answer;--}}
{{--								$option1 = $coursesQuestion[$keys[3]][($i - 1)]->option1;--}}
{{--								$option2 = $coursesQuestion[$keys[3]][($i - 1)]->option2;--}}
{{--								$option3 = $coursesQuestion[$keys[3]][($i - 1)]->option3;--}}

{{--								$option = array($answer, $option1, $option2, $option3);--}}
{{--								shuffle($option);--}}
{{--							@endphp--}}
{{--								@if ($i == 1)--}}
{{--									<div class="tab-pane fade active show" role="tabpanel" id="tab4-{{ $i }}">--}}
{{--										<p class="d-flex">--}}
{{--											<span class="mr-4">{{ $i }}.</span>--}}
{{--											<span>{{ $coursesQuestion[$keys[3]][($i - 1)]->question }}</span>--}}
{{--										</p>--}}
{{--										<p class="d-flex flex-column">--}}
{{--											@for ($x = 0; $x < count($option); $x++)--}}
{{--												<span>--}}
{{--													<input type="radio" name="{{ $keys[3].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--												</span>--}}
{{--											@endfor--}}
{{--										</p>--}}
{{--									</div>--}}
{{--								@else--}}

{{--								<div class="tab-pane fade" role="tabpanel" id="tab4-{{ $i }}">--}}
{{--									<p class="d-flex">--}}
{{--										<span class="mr-4">{{ $i }}.</span>--}}

{{--										<span>{{ $coursesQuestion[$keys[3]][($i - 1)]->question }}</span>--}}
{{--									</p>--}}
{{--									<p class="d-flex flex-column">--}}
{{--										@for ($x = 0; $x < count($option); $x++)--}}
{{--											<span>--}}
{{--												<input type="radio" name="{{ $keys[3].$i }}[]" value="{{ $option[$x] }}"> {{ $option[$x] }}--}}
{{--											</span>--}}
{{--										@endfor--}}
{{--									</p>--}}
{{--								</div>--}}
{{--							@endif--}}
{{--						@endfor--}}

{{--					</div>--}}
{{--					 fourth subject question ends --}}

{{--					 fourth subject question number --}}
{{--					<ul class="nav nav-pills pagination">--}}
{{--						@for ($i = 1; $i <= count($coursesQuestion[$keys[3]]); $i++)--}}
{{--							@if ($i == 1)--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link active page-link" a href="#tab4-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@else--}}
{{--								<li  class="nav-item page-item">--}}
{{--									<a class="nav-link page-link" a href="#tab4-{{$i}}" data-toggle="tab">{{ $i }}</a>--}}
{{--								</li>--}}
{{--							@endif--}}
{{--						@endfor--}}
{{--					</ul>--}}
{{--					 fourth subject question number --}}
{{--				</div>--}}
{{--				--}}{{-- fourth subjects ends --}}
{{--				@csrf--}}
{{--				<input type="submit" value="Submit" class="btn btn-success mt-5">--}}
                    </div>
			</form>
		</div>
	</div>
 </div>

@endsection
