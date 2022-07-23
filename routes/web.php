<?php

use App\Http\Controllers\SocialController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Models\User;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;

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

/*Ajax Crud*/

Route::get('/students',[StudentController::class,'index']);
Route::post('/add-student',[StudentController::class,'addStudent'])->name('student.add');
Route::get('/student/{id}',[StudentController::class,'getStudentById']);
Route::put('/student',[StudentController::class,'updateStudent'])->name('student.update');
Route::delete('/student/{id}',[StudentController::class,'deleteStudent']);
Route::delete('/selected-students',[StudentController::class,'deleteCheckedStudents'])->name('student.deleteSelected');
Route::get('/export-excel-students',[StudentController::class,'exportExcelStudents'])->name('export-excel-students');
Route::get('/export-csv-students',[StudentController::class,'exportCSVStudents'])->name('export-csv-students');
Route::get('/download-pdf-students',[StudentController::class,'downloadPDFStudents'])->name('download-pdf-students');
Route::post('/import-students',[StudentController::class,'importStudents'])->name('import-students');
Route::get('/pagination/paginate-data',[StudentController::class,'pagination']);
Route::get('/search-student',[StudentController::class,'searchStudent'])->name('search.student');


/*User Authentication*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Social Login*/

/*Facebook Login*/
Route::get('login/facebook',[SocialController::class,'facebookRedirect']);
Route::get('login/facebook/callback',[SocialController::class,'loginWithFacebook']);

/*Google Login*/
Route::get('login/google',[SocialController::class,'googleRedirect']);
Route::get('/login/google/callback',[SocialController::class,'loginWithGoogle']);

/*Github Login*/
Route::get('login/github',[SocialController::class,'githubRedirect']);
Route::get('/login/github/callback',[SocialController::class,'loginWithGithub']);

/*Notification*/

Route::get('/send-notification',function(){
    //$user = User::find(2);
    //$user->notify(new EmailNotification());
    //Notification::send($user, new EmailNotification());
    $users = User::all();
    foreach($users as $user){
        Notification::send($user, new EmailNotification('Chandan','Junior Software Engineer'));
    }
    return redirect('/');
});

Route::get('/sendnotification',[TestController::class,'sendNotification']);