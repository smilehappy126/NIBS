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
//起始頁
Route::get('/','MyLoginController@welcome');
//登入驗證
Route::get('/mylogin','MyLoginController@mylogin');
//登入成功測試
// Route::get('/login/success','MyLoginController@loginauth');

//新增申請單
Route::get('/create', 'ApplicationController@index');
Route::post('/create','ApplicationController@store');
//借用狀況

Route::get('/borrow', 'BorrowController@index');
Route::post('/borrow/update/{id}','BorrowController@update');

//透過名字尋找
Route::post('/borrow/search','BorrowController@search');
//已歸還資料
// Route::get('/return', function () {
//     return view('button3_return.index');
// });


//已歸還資料
Route::get('/return', 'returnController@index');
//編輯資料
Route::post('/return/update/{id}','returnController@update');




//預約狀況(主畫面，請先選擇教室，可再思考畫面設計)
Route::get('/reserve', 'CourseController@index');
//預約狀況(點選教室後)
Route::get('/reserve/{roomname}', 'CourseController@show');
//(點選上下一週後)
Route::get('/reserve/{roomname}/{weekfirst}', 'CourseController@showOtherWeek');
//單筆excel
Route::post('/importExcel', 'CourseController@importExcel');


//新增課程資料
Route::post('reserve/createCourse', 'CourseController@create');
//更新課程資料
Route::post('/reserve/updateCourse/{id}','CourseController@update');
//刪除課程資料
Route::delete('reserve/deleteCourse/{id}','CourseController@destroy');


//以下尚未處理
//新增教室資料
Route::post('/reserve/{roomname}','ClassroomController@store');
Route::get('/newclassroom', 'ClassroomController@newClassroomPage');
//修改教室資料
Route::get('/editclassroom', 'ClassroomController@editClassroomPage');
Route::post('/editclassroom/{classroom}','ClassroomController@update');
//刪除教室資料
Route::delete('/editclassroom/{classroom}','ClassroomController@destroy');

//固定課程預約
Route::get('/inputClass/{roomname}', 'LongcourseController@index');
//新增多筆
Route::post('/inputClass/save', 'LongcourseController@store');
//固定課程excel
Route::post('/inputClass/importExcel', 'LongcourseController@importExcel');

// Login驗證
Auth::routes();
Route::post('/loginNow', 'Auth\LoginController@login');
Route::get('/logout', 'MyLoginController@logout');

// Admin路由區
Route::get('/admin','AdminController@admin');
Route::get('/admin/userlists','AdminController@userlists');
Route::post('/admin/searchUser','AdminController@searchUser');
Route::post('/admin/userlists/update/{id}','AdminController@updateUserLists');
Route::post('/admin/searchall','AdminController@searchall');
Route::post('/admin/searchall/update/{id}','AdminController@updateContentData');

Route::get('/home', 'MyLoginController@afterlogin')->name('home');
