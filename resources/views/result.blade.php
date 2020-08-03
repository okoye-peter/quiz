@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/result.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="container-fluid">
            <div class="row">
                @if ($results)
                    <div id="printDiv" class="shadow col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="title"><img src="{{asset('image/images.png') }}" class="mx-5"> <span>MODESTY INTERNATIONAL COLLEGE.</span>  </h2>
                        <div class="row justify-content-center py-4">
                            <img src="{{ asset($user->image) }}" alt="image not found" class="img-thumbnail mt-4">
                        </div>
                        <div class="row p-3">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <span>
                                    NAME:
                                </span>
                                <span>
                                    {{strtoupper($user->name)}}
                                </span>
                                <span>
                                    EMAIL:
                                </span>
                                <span>
                                    {{strtoupper($user->email)}}
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <span>
                                    DATE OF BIRTH:
                                </span>
                                <span>
                                    {{strtoupper($user->birth)}}
                                </span>
                                <span>
                                    Gender:
                                </span>
                                <span>
                                    {{strtoupper($user->gender)}}
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <span>
                                    CITY:
                                </span>
                                <span>
                                    {{strtoupper($user->city)}}
                                </span>
                                <span>
                                    NATIONALITY:
                                </span>
                                <span>
                                    {{strtoupper($user->nationality)}}
                                </span>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <span>
                                    ADDRESS:
                                </span>
                                <span>
                                    {{strtoupper($user->address)}}
                                </span>
                            </div>
                        </div> 
                        <div class="container px-5 mt-5">
                            <h3 class="text-muted ml-5 pl-5">RESULTS:</h3>
                            <div class="row justify-content-between px-5 mx-5">
                                @foreach ($results as $course => $score)
                                    <strong class="col-lg-6 col-md-6 col-sm-6 col-6">{{$course}}:</strong>
                                    <strong class="col-lg-6 col-md-6 col-sm-6 col-6">{{$score}}</strong>
                                @endforeach
                                <strong class="col-lg-6 col-md-6 col-sm-6 col-6">Aggregate:</strong>
                                <strong class="col-lg-6 col-md-6 col-sm-6 col-6">{{$total}}</strong>
                            </div>
                        </div>
                        <div class="row justify-content-between  mt-5 mb-5 mx-5">
                            <div class="d-flex flex-column">
                                <img src="{{ asset('image/download.png') }}" class="signature">
                                <p class="text-center ml-5">
                                    <strong>(The Propietor) Mr. Chiwoke Azubuike.</strong>
                                </p>
    
                            </div>
                            <div class="mx-3 my-2 d-flex flex-column">
                                <span style="border-bottom: 1px solid black; width:10em; padding:1em; margin-top:2.9em"></span>
                                <strong class="text-center">{{$user->name}}</strong>
                            </div>
                            
                        </div>
                    </div>
                @else
                <div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>4<span>0</span>4</h1>
                        </div>
                        <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                        <a href="/">home page</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function printArea(){
            let printContent = "<html><head><style type='text/css'>#printDiv {width: 45em;border: 1px solid cadetblue;margin-top: 2em;padding: 1em;}#user{width: 12em;height: 12em;margin-left: auto;margin-top: .5rem;    display: block;margin-right: auto;margin-bottom: 3rem;}.userDetails{width: 30em;display: flex;    justify-content: space-between;margin-left: auto;margin-right: auto;}h5{font-weight: 600;font-size: 14px;}table,tr,td,th{border: 1px solid lightgray;border-collapse: collapse;}table{width: 35em; margin-left:auto;margin-right:auto;}th,td{padding: 1.5em;text-align: center;}th{color: black;    font-size: 18px;font-weight: 700;}td{font-size: 16px;color: black;}</style></head><body>";
            // printContent += "</body></html>";
            let winPrint = window.open('','','width=900,height=650');
            winPrint.document.write(printContent);
            printContent = document.getElementById('printDiv');
            winPrint.document.write(printContent.innerHTML);
            winPrint.document.close()
            winPrint.focus();
            winPrint.print();
            winPrint.close();
        }

        // let table = document.getElementById('scores');
        // let total = 0;
        // let tbody = table.getElementsByTagName('tbody');
        // for (let i = 0; i <= 3; i++) {
        //     total += +tbody[0].children[i].children[1].innerHTML;
        // }
        // document.getElementById('total').innerHTML = total;
        // printArea();
    </script>
@endsection