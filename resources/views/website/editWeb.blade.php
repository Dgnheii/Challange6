@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 24px;">
                    Edit
                </div>

                <div class="card-body">
                        {{-- <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Website</th>
                            <th scope="col">Status</th>
                            <th scope="col">IP</th>
                            <th scope="col">Port</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody> --}}
                    <form method="POST" action="{{ route('updateWebsite') }}">
                        @csrf
                        <div class="form-group">
                            <label for="Website">Website</label>
                            <input type="text" name="website" class="form-control" value="{{ $website->website }}">
                        </div>
                        <div class="form-group">
                            <label for="Website">Status</label>
                            <input type="text" name="status" class="form-control" value="{{ $website->status }}">
                        </div>
                        <div class="form-group">
                            <label for="Website">IP</label>
                            <input type="text" name="ip" class="form-control" value="{{ $website->ip }}">
                        </div>
                        <div class="form-group">
                            <label for="Website">Port</label>
                            <input type="text" name="port" class="form-control" value="{{ $website->port }}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection