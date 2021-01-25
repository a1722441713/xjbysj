<?php

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

Route::get('/test',function(){
    return view('test');
})->name('test');

//Web
Route::get('/login','Auth\LoginController@showFormLogin')->name('show.login.form'); 
Route::post('/login','Auth\LoginController@login')->name('admin.login');
Route::get('/logout','Auth\LoginController@loginOut')->name('admin.logout');

Route::middleware('auth')->group(function(){
    Route::get('/backend','Web\BackendController@showFormBackend')->name('show.backend.form');
    Route::get('/backend/all/question','Web\QuestionController@showAll')->name('show.all.question');
    Route::post('/backend/search/question','Web\QuestionController@search')->name('admin.search.question');
    Route::post('/backend/add/question','Web\QuestionController@add')->name('admin.add.question');
    Route::get('/backend/update/question/{id}','Web\QuestionController@showUpdateForm')->name('show.update.form');//未启用
    Route::get('/backend/del/question/{id}','Web\QuestionController@del')->name('admin.del.question');
    
    Route::get('/backend/all/form','Web\FormController@showAll')->name('show.all.form');
    Route::post('/backend/add/form','Web\FormController@add')->name('admin.add.form');
    
    Route::get('/backend/email/form','Web\EmailController@showEmailForm')->name('send.email.form');
    Route::post('/backend/send/email','Web\EmailController@send')->name('admin.send.email');
    
    Route::get('/backend/all/fraction','Web\FractionController@showAll')->name('show.all.fraction');
    Route::post('/backend/search/fraction','Web\FractionController@search')->name('admin.search.fraction');
});



// Front
Route::get('/frontend/paper/{url}','Front\PaperController@show')->name('show.paper');
Route::post('/frontend/paper/save','Front\PaperController@save')->name('paper.test');
Route::get('/frontend/tip','Front\PaperController@tip')->name('show.tip');


Route::get('/404',function(){ dd(1); })->name('show.From.404');

