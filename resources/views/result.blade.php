@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css./result.css') }}">
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div id="printDiv">
            <img src="{{asset('image/images.png')}}" id="user" class="d-block mx-auto mb-5 mt-2">
            <div class="d-flex justify-content-between userDetails mx-auto">
                <h5 class="col-lg-6 col-md-6 col-sm-6 col-6 px-0">NAME:</h5>
                <p class="col-lg-6 col-md-6 col-sm-6 col-6 px-0">{{ ucfirst($user->name) }}</p>
            </div>
            <div class="d-flex justify-content-center userDetails mx-auto">
                <h5 class="col-lg-6 col-md-6 col-sm-6 col-6 px-0">EMAIL:</h5>
                <p class="col-lg-6 col-md-6 col-sm-6 col-6 px-0">{{ ucfirst($user->email) }}</p>
            </div>
            <table id="scores" class="mx-auto mt-2">
                <thead>
                    <tr>
                        <th>SUBJECT</th>
                        <th>SCORES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $course => $score)
                        <tr>
                            <td>{{ ucfirst($course) }}</td>
                            <td>{{ $score }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Aggregate</td>
                        <td id='total'></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
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
    
        let table = document.getElementById('scores');
        let total = 0;
        let tbody = table.getElementsByTagName('tbody');
        for (let i = 0; i <= 3; i++) {
            total += +tbody[0].children[i].children[1].innerHTML;
        }
        document.getElementById('total').innerHTML = total;
        printArea();
    </script>
@endsection