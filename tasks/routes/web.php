<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];

// route::get('/', function () {
//     return view('index', [
//         'name' => 'Andrew',
//     ]);
// });

Route::get('/', function () {
    return redirect() -> route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => Task::latest()->get(),
    ]);
})->name('tasks.index');

// Form - needs to be before {id}
Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function(Task $task)   {
    return view('edit', ['task' =>  $task]);
}) -> name('tasks.edit');

Route::get('/tasks/{task}', function(Task $task)   {
    return view('show', ['task' =>  $task]);
}) -> name('tasks.show');


Route::post('/tasks', function(TaskRequest $request) {
    $task=Task::create($request->validated());
//     $data = $request->validated();
//    $task = new Task;
//    $task->title = $data['title'];
//    $task->description = $data['description'];
//    $task->long_description = $data['long_description'];
//    $task->save();


   return redirect()->route('tasks.show', ['task' => $task->id])
   ->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function(TaskRequest $request,Task $task) {
    $task->update($request->validated());
    // $data = $request->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();

    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success', 'Task updated successfully');
 })->name('tasks.update');

 Route::delete('/tasks/{task}', function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
    ->with('success', 'Task deleted successfully');
 })->name('tasks.destroy');

// Route::get('/hello', function() {
//     return 'Hello World';
// });

// Route::get('greet/{name}', function($name) {
//     return 'Hello ' . $name . '!';
// }); // Adding dynamic parts in the URL

// HTTP methods
// GET - to read data. fetch documents
// POST - to store new data, send forms
// PUT - to modify existing data
// DELETE - to delete existing data

// Route::get('/hallo', function() {
//     return redirect() -> route('hello');
// });

// named routes
// Route::get('/hello', function() {
//     return 'Hello World';
// }) -> name('hello');

// Define fallback routes
Route::fallback(function() {
    return '404';
});