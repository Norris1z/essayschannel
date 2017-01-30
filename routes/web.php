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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', ['uses'=> 'HomeController@index', 'as' => 'home']);
Route::get('about_us', ['uses'=> 'FrontController@about', 'as' => 'about_us']);
Route::get('services', ['uses'=> 'FrontController@services', 'as' => 'services']);

Route::get('message/{id}', 'MessageController@chatHistory')->name('message.read');


Route::get('contact_us', ['uses'=> 'WelcomeController@contact', 'as' => 'contact_us']);

Route::get('profile_page', ['uses'=> 'HomeController@profile', 'as' => 'profile_page']);
Route::get('{id}/order_detail', ['uses'=> 'OrdersController@show_writer_order', 'as' => 'order_detail']);
Route::get('new_order', ['uses'=> 'OrdersController@create', 'as' => 'new_order']);
Route::post('create_order', ['uses'=> 'OrdersController@store', 'as' => 'create_order']);
Route::post('upload_draft_file', ['uses'=> 'OrdersController@uploaddraft', 'as' => 'upload_draft_file']);
Route::post('upload_complete_file', ['uses'=> 'OrdersController@uploadcomplete', 'as' => 'upload_complete_file']);
Route::post('upload_complete', ['uses'=> 'OrdersController@complete', 'as' => 'upload_complete']);
Route::post('adjust_price', ['uses'=> 'OrdersController@adjust', 'as' => 'adjust_price']);
Route::post('assign_order', ['uses'=> 'OrdersController@assignorder', 'as' => 'assign_order']);
Route::get('create_user', ['uses'=> 'UsersController@create', 'as' => 'create_user', 'middleware'=>'roles', 'roles'=>['admin']]);
Route::post('create_user', ['uses'=> 'UsersController@store', 'as' => 'create_user']);
Route::get('{id}/view_order', ['uses'=> 'OrdersController@show', 'as' => 'view_order']);
Route::get('{id}/view_user', ['uses'=> 'UsersController@show', 'as' => 'view_user']);


Route::get('messages', ['uses'=> 'MessagesController@index', 'as' => 'messages']);
Route::post('new_message', ['uses'=> 'MessagesController@store', 'as' => 'new_message']);
Route::get('site_settings', ['uses'=> 'SettingsController@create', 'as' => 'site_settings']);
Route::get('payments', ['uses'=> 'PaymentsController@create', 'as' => 'payments']);
Route::get('bids', ['uses'=> 'BidsController@create', 'as' => 'bids']);
Route::get('active_users', ['uses'=> 'UsersController@index', 'as' => 'active_users']);
Route::get('pending_users', ['uses'=> 'UsersController@pending', 'as' => 'pending_users']);
Route::post('order_action', ['uses'=> 'OrdersController@orderactions', 'as' => 'order_action']);
Route::post('place_bid', ['uses'=> 'OrdersController@placebid', 'as' => 'place_bid']);
Route::get('manage_orders', ['uses'=> 'OrdersController@adminmanage', 'as' => 'manage_orders']);
Route::get('pending_orders', ['uses'=> 'OrdersController@pending', 'as' => 'pending_orders']);

Route::get('payments', ['uses'=> 'PaymentsController@index', 'as' => 'payments']);
Route::get('get_amount', ['uses'=> 'PaymentsController@getamount', 'as' => 'get_amount']);
Route::post('get_amount', ['uses'=> 'PaymentsController@queryamount', 'as' => 'get_amount']);
Route::post('make_payment', ['uses'=> 'PaymentsController@makepayment', 'as' => 'make_payment']);
Route::get('assigned', ['uses'=> 'OrdersController@assigned', 'as' => 'assigned']);
Route::post('confirm_order', ['uses'=> 'OrdersController@confirmorder', 'as' => 'confirm_order']);
Route::get('current', ['uses'=> 'OrdersController@current', 'as' => 'current']);
Route::get('confirmed', ['uses'=> 'OrdersController@confirmed', 'as' => 'confirmed']);
Route::get('unconfirmed', ['uses'=> 'OrdersController@assignedbutunconfirmed', 'as' => 'unconfirmed']);
Route::get('revision', ['uses'=> 'OrdersController@revision', 'as' => 'revision']);
Route::get('editing', ['uses'=> 'OrdersController@editing', 'as' => 'editing']);
Route::get('completed', ['uses'=> 'OrdersController@completed', 'as' => 'completed']);
Route::get('approved', ['uses'=> 'OrdersController@approved', 'as' => 'approved']);



Route::post('completed_order_action', ['uses'=> 'OrdersController@completedorderaction', 'as' => 'completed_order_action']);
Route::post('payment_action', ['uses'=> 'PaymentsController@paymentaction', 'as' => 'payment_action']);
Route::get('writer_payments/{id}', ['uses'=> 'PaymentsController@show', 'as' => 'writer_payments']);
Route::get('order_edit/{id}', ['uses'=> 'OrdersController@edit', 'as' => 'order_edit']);
Route::get('order_update/{id}', ['uses'=> 'OrdersController@update', 'as' => 'order_update']);

Route::get('notice_edit/{id}', ['uses'=> 'SettingsController@edit', 'as' => 'notice_edit']);
Route::get('notice_update/{id}', ['uses'=> 'SettingsController@update', 'as' => 'notice_update']);

Route::post('set_deadline', ['uses'=> 'OrdersController@setdeadline', 'as' => 'set_deadline']);

Route::post('request_ext', ['uses'=> 'OrdersController@extension', 'as' => 'request_ext']);
Route::post('request_reassign', ['uses'=> 'OrdersController@reassignrequest', 'as' => 'request_reassign']);

//payments

Route::get('getCheckout', ['as'=>'getCheckout','uses'=>'OrdersController@getCheckout']);
Route::get('getDone', ['as'=>'getDone','uses'=>'OrdersController@getDone']);
Route::get('getCancel', ['as'=>'getCancel','uses'=>'OrdersController@getCancel']);

Route::get('users', ['as'=>'users', 'uses'=>'UsersController@index']);

// //messages
// Route::get('/chat/', ['as'=>'chat', 'uses'=>'OrdersController@chat']);



//chats
Route::group(['middleware' => 'auth', 'prefix' => 'api'], function () {
	Route::get('users', function () { 
		return App\User::where('id', '!=', \Auth::user()->id)->get();
	});
	Route::get('auth-user', function () {
		return \Auth::user();
	});
});

/**
 * Chat routes
 */
Route::group(['middleware' => 'auth'], function () {
	Route::get('chats', ['uses' => 'ChatController@index', 'as' => 'chat.index']);
	Route::group(['prefix' => 'api'], function () {
		Route::get('message/{id}', ['uses' => 'ChatController@getMessage', 'as' => 'chat.message']);
		Route::get('messages/{id}', ['uses' => 'ChatController@getMessages', 'as' => 'chat.messages']);
		Route::post('message', ['uses' => 'ChatController@postMessage', 'as' => 'chat.message.send']);
		Route::patch('message/{id}', ['uses' => 'ChatController@updateMessage', 'as' => 'chat.message.update']);
		Route::delete('message/{id}', ['uses' => 'ChatController@deleteMessage', 'as' => 'chat.message.delete']);
	});
});


Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'OrdersController@postPayment',
));
 
// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'OrdersController@getPaymentStatus',
));


