<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEnd\AboutUsController;
use App\Http\Controllers\FrontEnd\ContactUsController;
use App\Http\Controllers\FrontEnd\CourseController as FrontEndCourseController;
use App\Http\Controllers\FrontEnd\FrontEndEventController;
use App\Http\Controllers\FrontEnd\TeacherController;
use App\Http\Controllers\FrontEnd\WebsiteController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// Route::group(['middleware' => ['guest']], function () {
Route::get('/', [WebsiteController::class, 'website'])->name('website.index');

Route::get('/Courses', [FrontEndCourseController::class, 'index'])->name('Courses.index');
Route::get('/Courses/{course}/{slug?}', [FrontEndCourseController::class, 'single'])->name('Courses.single');
Route::post('/Courses/store/{slug?}', [FrontEndCourseController::class, 'enroll'])->name('Courses.enroll');

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/{slug}', [TeacherController::class, 'single'])->name('teachers.single');

Route::get('/aboutUs', [AboutUsController::class, 'index'])->name('aboutUs.index');
Route::get('/aboutUs/{slug}', [AboutUsController::class, 'single'])->name('aboutUs.single');

Route::get('/contactUs', [ContactUsController::class, 'index'])->name('contactUs.index');
Route::get('/contactUs/{slug}', [ContactUsController::class, 'single'])->name('contactUs.single');

Route::get('/Events', [FrontEndEventController::class, 'index'])->name('Events.index');
Route::get('/Events/{slug}', [FrontEndEventController::class, 'single'])->name('Events.single');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'single'])->name('news.single');

Route::get('Category/{slug}', [CategoryController::class, 'single'])->name('Categories.single');
// });

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('courses', CourseController::class)->except('show');
    Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

    Route::resource('roles',   RoleController::class);

    Route::resource('lessons', LessonController::class)->except('create');
    Route::get('/lessons/create/{slug}', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/image-upload', [LessonController::class, 'image-upload'])->name('lessons.image-upload');


    Route::resource('events', EventController::class);
    Route::resource('newses', NewsController::class);

    Route::resource('users', UserController::class)->except('show');
    Route::get('/users/{slug}', [UserController::class, 'show'])->name('users.show');


    Route::resource('categories', CategoryController::class)->except('show');
    Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

    // Students
    Route::resource('/students', StudentController::class)->except('show');
    Route::get('/students/{slug}', [StudentController::class, 'show'])->name('students.show');

    // instructors
    Route::resource('/instructors', InstructorController::class)->except('show');
    Route::get('/instructors/{slug}', [InstructorController::class, 'show'])->name('instructors.show');

    Route::resource('settings', SettingController::class);
    Route::resource('reviews', ReviewController::class);
});
