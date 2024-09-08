@extends('app')

@section('content')
    <h1 class="my-5 text-center">{{ $model->title }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    {{ $model->description }}
                    <div class="row justify-content-center my-4">

                        @if($model->status_id == 1)
                        <a class="btn btn-info btn-sm"
                           href="{{ route('edit', ['id' => $model->id]) }}">
                           <i class="bi-pencil"> Edit</i>
                        </a>
                        @endif
                        <div class="p-1"></div>
                        <a class="btn btn-secondary btn-sm" href="{{route('index')}}" class="">
                            <i class="bi-house"> Home</i>
                        </a>
                        <div class="p-1"></div>
                        <form action="{{ route('delete', ['id' => $model->id]) }}"
                              method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                <i class="bi-trash"> Delete</i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
