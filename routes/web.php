<?php

use App\Models\Todo;
use Illuminate\Support\Facades\Route;

// all the todo listings
Route::get('/index', function () {
    
    $completed_todos = Todo::completedTodos();
    $pending_todos = Todo::pendingTodos();

    return view('todos.index', compact('pending_todos', 'completed_todos'));
})->name('index');

// create a new todo list
Route::post('/create', function () {
    $data = request()->all();
    $data['status_id'] = 1;  // automatically set the status to 'to do'
    $model = Todo::create($data);

    return view('todos.show', compact('model'))->with('success', 'New Todo is Created !');
})->name('create');

// update a existing todo list
Route::post('/update/{id}', function ($id) {
    
    $data = request()->all();
    $data['status_id'] = 1;

    $model = Todo::findOrFail($id);
    $model->update($data);
    $model->save();

    return view('todos.show', compact('model'))->with('success', 'New Todo is Created !');
})->name('update');

// delete a existing todo list
Route::post('/delete/{id}', function ($id) {

    $model = Todo::findOrFail($id);
    $model->delete();

    $completed_todos = Todo::completedTodos();
    $pending_todos = Todo::pendingTodos();
    
    return view('todos.index', compact('pending_todos', 'completed_todos'))->with('success', 'Todo is Deleted !');
})->name('delete');


// delete a existing todo list
Route::get('/show/{id}', function ($id) {

    $model = Todo::findOrFail($id);
    return view('todos.show', compact('model'));
})->name('show');


// delete a existing todo list
Route::get('/complete/{id}', function ($id) {

    $model = Todo::findOrFail($id);
    $model->status_id = 2; // set the status to 'done'
    $model->save();

    $completed_todos = Todo::completedTodos();
    $pending_todos = Todo::pendingTodos();

    return view('todos.index', compact('pending_todos', 'completed_todos'))->with('success', 'Todo is Completed !');
})->name('complete');

// delete a existing todo list
Route::get('/edit/{id}', function ($id) {

    $model = Todo::findOrFail($id);

    return view('todos.edit', compact('model'));
})->name('edit');
