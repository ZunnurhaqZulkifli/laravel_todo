@extends('app')

@section('content')
    <h1 class="my-5 text-center">Edit Todo</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Edit Todo
                </div>
                <div class="card-body">
                    <form action="{{ route('update', ['id' => $model->id]) }}" method="POST">
                        @csrf
                        <div class="form-group
                        @error('title')
                            has-error
                        @enderror">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $model->title }}">
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group
                        @error('description')
                            has-error
                        @enderror">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $model->description }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection