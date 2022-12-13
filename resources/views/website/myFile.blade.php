@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 24px;">
                    My Website List
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
                            <th scope="col">Option</th>
                            </tr>
                        </thead>
                        @php
                            $i = 0;
                            foreach ($websites as $a) {
                        @endphp
                        <tbody>
                            <tr>
                                <th scope="row"> {{$i+=1}} </th>
                                <td> {{$a->website}}</td>
                                <td>{{ $a->status }}</td>
                                <td>{{ $a->ip }}</td>
                                <td>{{ $a->port }}</td>
                                <td>
                                    <a href="{{route('EditWeb', ['id'=>$a->id])}}" class="btn btn-primary">Edit</a>
                                    <a href="{{route('deleteWeb', ['id'=>$a->id])}}" 
                                    onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                        @php } @endphp
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload New File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('uploadFile') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="file" name="file" class="form-control">
              <br>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Import Website List</button>
              </div>
          </form>
        </div>
        
      </div>
    </div>
</div>
@endsection