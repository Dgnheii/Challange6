@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 24px;">
                    Website List
                    </br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New</button>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Website</th>
                            <th scope="col">Status</th>
                            <th scope="col">IP</th>
                            <th scope="col">Port</th>
                            </tr>
                        </thead>
                        @php
                            $i = 0;
                            $file = fopen(storage_path('app\public\websiteUpload\\'.$filename), "r");
                        @endphp
                        @php while(!feof($file)) {
                            $line = fgets($file);
                        @endphp
                        <tbody>
                            <tr>     
                                <th scope="row"> {{$i+=1}} </th>
                                <td> {{$line}}</td>
                                <td>
                                </td>
                                <td> </td>
                                <td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection