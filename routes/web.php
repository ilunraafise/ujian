<?php

use App\Exports\StudentScoresExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\StudentAnswerController;
use App\Http\Controllers\CourseQuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function(){
        
        Route::resource('courses', CourseController::class)->middleware('role:teacher');

        Route::get('/course/question/create/{course}', [CourseQuestionController::class, 'create'])
        ->middleware('role:teacher')->name('course.create.question');
        #untuk guru menambahkan pertanyaan di suatu kelas tertentu

        Route::post('/course/question/save/{course}', [CourseQuestionController::class, 'store'])
        ->middleware('role:teacher')->name('course.create.question.store');

        Route::resource('course_questions', CourseQuestionController::class)
        ->middleware('role:teacher');

        Route::get('/course/students/show/{course}', [CourseStudentController::class, 'index'])
        ->middleware('role:teacher')->name('course.course_students.index');

        Route::get('/course/students/create/{course}', [CourseStudentController::class, 'create'])
        ->middleware('role:teacher')->name('course.course_students.create');

        Route::post('/course/students/create/save/{course}', [CourseStudentController::class, 'store'])
        ->middleware('role:teacher')->name('course.course_students.store');

        Route::get('/learning/finished/{course}', [LearningController::class, 'learning_finished'])
        ->middleware('role:student')->name('learning.finished.course');

        Route::get('/learning/rapport/{course}', [LearningController::class, 'learning_rapport'])
        ->middleware('role:student')->name('learning.rapport.course');

        #menampilkan beberapa kelas yang diberikan oleh guru
        Route::get('/learning', [LearningController::class, 'index'])
        ->middleware('role:student')->name('learning.index');

        Route::get('/learning/{course}/{question}', [LearningController::class, 'learning'])
        ->middleware('role:student')->name('learning.course');

        Route::post('/learning/{course}/{question}', [StudentAnswerController::class, 'store'])
        ->middleware('role:student')->name('learning.course.answer.store');

        Route::post('/courses/{course}/questions/import', [CourseQuestionController::class, 'import'])
        ->middleware('role:teacher')->name('course-questions.import');

        Route::get('/courses/{course}/export-scores', function (\App\Models\Course $course) {
            return Excel::download(new StudentScoresExport($course), 'nilai_siswa_' . $course->id . '.xlsx');
        })->name('export.scores');

        Route::post('/courses/{course}/students/import', [CourseStudentController::class, 'store'])
        ->middleware('role:teacher')->name('dashboard.course.course_students.store');

    });
});

require __DIR__.'/auth.php';
