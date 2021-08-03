@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('albums') }}">Go Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if( Request::is('*/edit'))
                        <form action="{{ url('albums/update') }}/{{ $album->id }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Album name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $album->name }}">
                            </div>

                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="number" name="email" class="form-control" value="{{ $album->year }}">
                            </div>

                            <div class="form-group">
                                <label>Artist:</label>
                                <input type="text" name="artist" class="form-control" value="{{ $album->artist }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    @else
                        <form action="{{ url('albums/create') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Album Name:</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Year:</label>
                                <input type="number" name="year" class="form-control" value={{ now()->year }}>
                            </div>

                            <div class="form-group">
                                <label>Artist:</label>
                                <input type="text" name="artist" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
