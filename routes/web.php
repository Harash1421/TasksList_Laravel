<?php

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Route;

class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    )
    {
        
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:05:00'
    ),
    new Task(
        2,
        'Sell of stuff',
        'Task 2 description',
        'Task 2 long description',
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:05:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        false,
        '2023-03-03 12:00:00',
        '2023-03-03 12:05:00'
    ),
    new Task(
        4,
        'Learn PHP',
        'Task 4 description',
        'Task 4 long description',
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:05:00'
    ),
];


Route::get('/', function() {
    return redirect()->route('tasks.index');
});

// Main Page
Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
    $task = collect($tasks)->firstWhere('id', $id);

    if(!$task) {
        abort(HttpResponse::HTTP_NOT_FOUND);
    }

    return view('show', ['task' => $task]);
})->name('tasks.show');



// // For greetings with Name input.
// Route::get('/Hello/{name}', function($name) {
//     return 'Hello ' . $name . '!';
// });

// // If shows error.
// Route::fallback(function() {
//     return 'Still Got somewhere.';
// });

// // For how to redirect hello to xxx.
// Route::get('/hello', function() {
//     return redirect()->route('hello');
// });

Route::get('/xxx', function() {
    return 'Hello';
})->name('hello');