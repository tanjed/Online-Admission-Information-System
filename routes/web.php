<?php

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


//Student Routes
Route::group(['middleware' => 'student-auth'],function (){
    Route::get('/student/logout','LoginController@studentLogout')->name('student.logout');
});
Route::get('/signin','LoginController@showStudentLogin')->name('student.signin.show');
Route::post('/signin','LoginController@processStudentLogin')->name('student.signin');

Route::get('/signup','RegistrationController@showStudentRegistration')->name('student.signup.show');
Route::post('/signup','RegistrationController@processStudentRegistration')->name('student.signup');






//Admins Route
Route::group(['middleware' => 'admin-auth'],function (){

    Route::get('admin/create','AdminUseController@create');
    Route::get('/admin/dashboard','AdminUseController@manageDash')->name('admin.dashboard');
    Route::get('/admin/delete/{id}','AdminUseController@delete');
    Route::get('/admin/logout','LoginController@adminLogout')->name('admin.logout');

});

Route::get('/admin/signin','LoginController@showAdminLogin')->name('admin.signin.show');
Route::post('/admin/signin','LoginController@processAdminLogin')->name('admin.signin');

Route::get('/admin/signup','RegistrationController@showAdminRegistration')->name('admin.signup.show');
Route::post('/admin/signup','RegistrationController@processAdminRegistration')->name('admin.signup');

Route::get('/sendMail', 'MailController@sendMail');



//University Route
Route::group(['middleware' => 'university-auth'],function (){

    Route::get('/university/dashboard','UniversityUseController@manageDash')->name('university.dashboard');
    Route::post('/university/update','UniversityUseController@updateInfo')->name('university.update');
    Route::get('/university/createDepartment','UniversityUseController@createDept')->name('university.createDepartment');
    Route::get('/university/createProgram','UniversityUseController@createProgram')->name('university.createProgram');
    Route::get('/university/showProgram/{id}','UniversityUseController@showProgram');
    Route::post('/university/waiver/update','UniversityUseController@addWaiver');
    Route::get('/university/delete/{section}/{id}','UniversityUseController@deleteSection');
    Route::post('/university/upload/cover','UniversityUseController@uploadCover')->name('upload.cover');
    Route::post('/university/create/notice','UniversityUseController@createNotice')->name('create.notice');
});
Route::get('/university/logout','LoginController@universityLogout')->name('university.logout');
Route::get('/university/signup','RegistrationController@showUniversityRegistration')->name('university.signup.show');
Route::post('/university/signup','RegistrationController@processUniversityRegistration')->name('university.signup');

Route::get('/university/signin','LoginController@showUniversityLogin')->name('university.signin.show');
Route::post('/university/signin','LoginController@processUniversityLogin')->name('university.signin');

Route::get('/university/verify','MailController@showVerification')->name('show.verification');
Route::post('/university/verify','MailController@processVerification')->name('process.verification');



//Index Route
Route::get('/','IndexUseController@showIndex')->name('index');
Route::get('/universityList/{status}','IndexUseController@showUniversityList');
Route::get('/university/{id}/details','IndexUseController@showUniversityDetails');
Route::get('/search','SearchUseController@showSearch');
Route::get('/search/result','SearchUseController@searchResult');
Route::get('/compare','SearchUseController@compare');
Route::get('/compare/result','SearchUseController@compareResult');
Route::get('/university/notice/{id}','IndexUseController@showNotice');

//Blog Route
Route::get('/blog/timeline','BlogUseController@showBlog')->name('blog.timeline');
Route::post('/blog/createpost','BlogUseController@createPost');
Route::get('/blog/post/{id}','BlogUseController@postDescription')->name('post.description');
Route::post('/blog/{id}/comment','BlogUseController@postComment');
Route::get('/blog/search','BlogUseController@searchPost');

