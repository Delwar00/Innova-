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

Route::get('/','FrontendController@frontpage');
Route::get('/team','FrontendController@team');
Route::post('/contact/form/submit', 'FrontendController@contactformsubmit')->name('form-submit');
Route::get('/admin/service/{id}', 'FrontendController@adminserviceId')->name('adminserviceId');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact/message/view', 'HomeController@contactmessageview')->name('all-message');
Route::get('/contact/message/single/view/{message_id}', 'HomeController@contactmessagesingleview')->name('single-message');
Route::get('/contact/message/delete/{message_id}', 'HomeController@contactmessagedelete')->name('delete-message');
Route::get('/contact/message/marksasread/{message_id}', 'HomeController@marksasread')->name('marks-as-read');
Route::get('/contact/message/update/{message_id}', 'HomeController@contactmessageupdate')->name('contactmessageupdate');
Route::post('/contact/message/update/submit', 'HomeController@contactmessageupdatesubmit')->name('updatesubmit');
Route::get('/contact/message/restore/{message_id}', 'HomeController@contactmessagerestore')->name('contactmessagerestore');
Route::get('/admin/about', 'HomeController@adminabout')->name('adminabout');
Route::post('/admin/about/submit', 'HomeController@adminaboutsubmit')->name('adminaboutsubmit');
Route::get('/admin/about/active/{about_id}', 'HomeController@adminaboutactive')->name('adminaboutactive');
Route::post('/admin/about/point/submit', 'HomeController@adminaboutpointsubmit')->name('adminaboutpointsubmit');
Route::get('/admin/service', 'HomeController@adminservice')->name('adminservice');


Route::post('/admin/service/submit', 'HomeController@adminservicesubmit')->name('adminservicesubmit');
Route::get('/admin/service/deactive/{service_id}', 'HomeController@adminservicedeactive')->name('adminservicedeactive');
Route::get('/admin/service/active/{service_id}', 'HomeController@adminserviceactive')->name('adminserviceactive');
Route::get('/admin/construction/view', 'HomeController@adminconstructionview')->name('adminconstructionview');
Route::post('/admin/construction/submit', 'HomeController@adminconstructionsubmit')->name('adminconstructionsubmit');
Route::get('/admin/construction/active/{construction_id}', 'HomeController@adminconstructionactive')->name('adminconstructionactive');
Route::get('/admin/testimonial', 'HomeController@admintestimonial')->name('admintestimonial');
Route::post('/admin/testimonial/submit', 'HomeController@admintestimonialsubmit')->name('admintestimonialsubmit');
Route::get('/admin/testimonial/deactive/{testimonial_id}', 'HomeController@admintestimonialdeactive')->name('admintestimonialdeactive');
Route::get('/admin/testimonial/active/{testimonial_id}', 'HomeController@admintestimonialactive')->name('admintestimonialactive');
