<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;


Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);


// Route::get('/', function () {
//     return view('home');
// });

// // Index
// Route::get('/jobs', function () {
//     $jobs = Job::with('employer')->latest()->simplePaginate(3);

//     return view('jobs.index', [
//         'jobs' => $jobs
//     ]);
// });

// // Create
// Route::get('/jobs/create', function () {
//     return view('jobs.create');
// });

// // Show
// Route::get('/jobs/{id}', function ($id) {
//     $job = Job::find($id);

//     return view('jobs.show', ['job' => $job]);
// });

// // Store
// Route::post('/jobs', function () {
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     Job::create([
//         'title' => request('title'),
//         'salary' => request('salary'),
//         'employer_id' => 1
//     ]);

//     return redirect('/jobs');
// });

// // Edit
// Route::get('/jobs/{id}/edit', function ($id) {
//     $job = Job::find($id);
//     return view('jobs.edit', ['job' => $job]);
// });

// // Update
// Route::patch('/jobs/{id}', function ($id) {
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     // authorize (On hold...)
//     $job = Job::findOrFail($id);
//     $job->update([
//         'title' => request('title'),
//         'salary' => request('salary'),
//     ]);
//     return redirect('/jobs/' . $job->id);
// });

// // Destroy
// Route::delete('/jobs/{id}', function ($id) {
//     // authorize (On hold...)
//     Job::findOrFail($id)->delete();
//     return redirect('/jobs');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

