@extends('app')

@section('content')
    <h1 class="my-5 text-center">Today's Tasks</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Add a new task
                </div>
                <div class="p-4">
                    <form action="{{ route('create', 'title', 'status') }}"
                          method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label for="title">Title:
                            </div>
                            <div class="col-10">
                                <input class="form form-control"
                                       name="title"
                                       type="text">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-2">
                                <label for="title">Description:
                            </div>
                            <div class="col-10">
                                <input class="form form-control"
                                       name="description"
                                       type="text">
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mt-4">Submit</button>
                    </form>
                </div>
            </div>

                <div class="card mt-4">
                    <div class="card-header">
                        Incomplete Tasks
                    </div>
                    <ul class="list-group">
                        @foreach ($pending_todos as $pending_todo)
                            <li class="list-group @if ($pending_todo->completed) list-group-item-success @endif list-group-item d-flex justify-content-between align-items-center">
                                {{ $pending_todo->title }}
                                <div class="">
                                    {{ $pending_todo->description }}
                                </div>
                                <div class="row">
                                    <a class="btn btn-warning btn-sm"
                                       href="{{ route('complete', ['id' => $pending_todo->id]) }}"><i class="bi-check">Complete</i>
                                    </a>
                                    <div class="p-1"></div>
                                    <a class="btn btn-primary btn-sm"
                                       href="{{ route('show', ['id' => $pending_todo->id]) }}">
                                        <i class="bi-eye"> Show</i>
                                    </a>
                                    <div class="p-1"></div>
                                    <a class="btn btn-info btn-sm"
                                       href="{{ route('edit', ['id' => $pending_todo->id]) }}">
                                        <i class="bi-pencil"> Edit</i>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            Compeleted Tasks
                        </div>
                        @foreach ($completed_todos as $completed_todo)
                            <li class="list-group @if ($completed_todo->completed) list-group-item-success @endif list-group-item d-flex justify-content-between align-items-center">
                                {{ $completed_todo->title }}
                                <div class="">
                                    {{ $completed_todo->description }}
                                </div>
                                <div class="row">
                                    <a class="btn btn-success btn-sm"
                                       href="">
                                       <i class="bi-check"> Done</i>
                                    </a>
                                    <div class="p-1"></div>
                                    <a class="btn btn-primary btn-sm"
                                       href="{{ route('show', ['id' => $completed_todo->id]) }}">
                                       <i class="bi-eye"> Show</i>
                                    </a>
                                    <div class="p-1"></div>
                                    <form action="{{ route('delete', ['id' => $completed_todo->id]) }}"
                                          method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi-trash"> Delete</i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
