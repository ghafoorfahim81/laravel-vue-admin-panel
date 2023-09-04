<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\Client\PriorityController;
// use App\Http\Controllers\Client\WellbeingController;
use App\Http\Controllers\Client\ClinicalASController;
use App\Http\Controllers\Client\ReferralController;
use App\Http\Controllers\Partial\DisabilityController;
use App\Http\Controllers\Partial\SymptomController;
use App\Http\Controllers\Partial\MajorSymptomController;
// use App\Http\Controllers\Psycho\AppointmentController;
use App\Http\Controllers\TimingController;
use App\Http\Controllers\PsychologistController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Order\OrderController;

use App\Events\Appointment;
use App\Events\Test;
use App\Http\Controllers\TransactionsController;
use App\Http\Middleware\DBConfigMiddleware;

use App\Http\Controllers\Reports;
// Route::get('/broadcast',function(){
//     // broadcast(new Appointment());
//     broadcast(new Test());
// });
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
//Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//    return view('dashboard');
//})->name('dashboard');

//begin auth middelware and route group
// Route::get('/company/create', [CompanyController::class, 'create'])->middleware('permission:company_create')->name('company.create');
// Route::post('/company/store', [CompanyController::class, 'store'])->middleware('permission:company_create')->name('company.store');

Route::get('/testPdf', ['uses' => 'Report\ReportController@index',  'as' => 'tests.index']);

Route::get('/dbFresh', function () {
    Artisan::call('migrate:fresh --seed');
});

Route::get('/company/create', ['uses' => 'CompanyController@create', 'middleware' => [ 'permission:company_create'], 'as' => 'company.create']);
Route::post('/company/store', ['uses' => 'CompanyController@store', 'middleware' => [ 'permission:company_create'], 'as' => 'company.store']);
Route::get('/mail/send', ['uses' => 'ItemController@sendMail', 'as' => 'item.mail']);

Route::middleware('auth')->group(function () {


    Route::get('category', ['uses' => 'CategoryController@index', 'middleware' => ['permission:category_list'], 'as' => 'category.index']);
    Route::get('categoryAll', ['uses' => 'CategoryController@categories', 'middleware' => ['permission:category_list'], 'as' => 'categories']);
    Route::get('category/create', ['uses' => 'CategoryController@create', 'middleware' => ['permission:category_create'], 'as' => 'category.create']);
    Route::post('category/store', ['uses' => 'CategoryController@store', 'middleware' => ['permission:category_create'], 'as' => 'category.store']);
        Route::get('expense/{id}', ['uses' => 'Controller@show', 'middleware' => ['permission:expense_view'], 'as' => 'expense.show']);
    Route::get('category/edit/{id}', ['uses' => 'CategoryController@edit', 'middleware' => ['permission:category_edit'], 'as' => 'category.edit']);
    Route::post('category/post/{id}', ['uses' => 'CategoryController@update', 'middleware' => ['permission:category_edit'], 'as' => 'category.update']);
    Route::post('category/{id}', ['uses' => 'CategoryController@destroy', 'middleware' => ['permission:category_delete'], 'as' => 'category.destroy']);

    Route::get('/product', ['uses'=>'ProductController@index','middleware' => [ 'permission:product_list'],'as'=>'product.index']);
    Route::get('/product/create', ['uses'=>'ProductController@create', 'middleware' => [ 'permission:product_create'],'as'=>'product.create']);
    Route::post('/product/store', ['uses'=>'ProductController@store', 'middleware' => [ 'permission:product_create'],'as'=>'product.store']);
    Route::post('/product/edit', ['uses'=>'ProductController@edit', 'middleware' => [ 'permission:product_edit'],'as'=>'product.edit']);
    Route::post('/product/update', ['uses'=>'ProductController@update', 'middleware' => [ 'permission:product_edit'],'as'=>'product.update']);
    Route::get('/product/all', ['uses'=>'ProductController@getItems', 'middleware' => [ 'permission:product_list'],'as'=>'product.all']);


    Route::get('/about-us', ['uses'=>'AboutController@index','middleware' => [ 'permission:about_us_list'],'as'=>'about-us.index']);
    Route::get('/about-us/create', ['uses'=>'AboutController@create', 'middleware' => [ 'permission:about_us_create'],'as'=>'about-us.create']);
    Route::post('/about-us/store', ['uses'=>'AboutController@store', 'middleware' => [ 'permission:about_us_create'],'as'=>'about-us.store']);
    Route::post('/about-us/edit', ['uses'=>'AboutController@edit', 'middleware' => [ 'permission:about_us_edit'],'as'=>'about-us.edit']);
    Route::post('/about-us/update', ['uses'=>'AboutController@update', 'middleware' => [ 'permission:about_us_edit'],'as'=>'about-us.update']);

    Route::get('/contact-us', ['uses'=>'ContactController@index','middleware' => [ 'permission:contact_us_list'],'as'=>'contact-us.index']);
    Route::get('/contact-us/create', ['uses'=>'ContactController@create', 'middleware' => [ 'permission:contact_us_create'],'as'=>'contact-us.create']);
    Route::post('/contact-us/store', ['uses'=>'ContactController@store', 'middleware' => [ 'permission:contact_us_create'],'as'=>'contact-us.store']);
    Route::post('/contact-us/edit', ['uses'=>'ContactController@edit', 'middleware' => [ 'permission:contact_us_edit'],'as'=>'contact-us.edit']);
    Route::post('/contact-us/update', ['uses'=>'ContactController@update', 'middleware' => [ 'permission:contact_us_edit'],'as'=>'contact-us.update']);


    Route::get('/comment', ['uses'=>'CommentController@index','middleware' => [ 'permission:comment_list'],'as'=>'comment.index']);
    Route::get('/comment/create', ['uses'=>'CommentController@create', 'middleware' => [ 'permission:comment_create'],'as'=>'comment.create']);
    Route::post('/comment/store', ['uses'=>'CommentController@store', 'middleware' => [ 'permission:comment_create'],'as'=>'comment.store']);
    Route::post('/comment/edit', ['uses'=>'CommentController@edit', 'middleware' => [ 'permission:comment_edit'],'as'=>'comment.edit']);
    Route::post('/comment/update', ['uses'=>'CommentController@update', 'middleware' => [ 'permission:comment_edit'],'as'=>'comment.update']);


    Route::get('/blog', ['uses'=>'CommentController@index','middleware' => [ 'permission:blog_list'],'as'=>'blog.index']);
    Route::get('/blog/create', ['uses'=>'CommentController@create', 'middleware' => [ 'permission:blog_create'],'as'=>'blog.create']);
    Route::post('/blog/store', ['uses'=>'CommentController@store', 'middleware' => [ 'permission:blog_create'],'as'=>'blog.store']);
    Route::post('/blog/edit', ['uses'=>'CommentController@edit', 'middleware' => [ 'permission:blog_edit'],'as'=>'blog.edit']);
    Route::post('/blog/update', ['uses'=>'CommentController@update', 'middleware' => [ 'permission:blog_edit'],'as'=>'blog.update']);




    Route::post('/checkpassword', ['uses'=>'AdminController@checkpassword', 'as'=>'checkpassword']);

    Route::get('/', ['uses'=>'DashboardController@index','as'=>'dashboard']);
    Route::get('/dashboardData', ['uses'=>'DashboardController@dashboardData', 'middleware' => ['permission:dashboard_show'],'as'=>'dashboardData']);

    Route::get('/clientsDashboard', ['uses'=>'DashboardController@index','middleware'=>['permission:dashboard_show'],'as'=>'getClientDashboard']);

    Route::group(['namespace' => 'UserManagement'], function () {
        // user
        Route::get('user', ['uses' => 'UserController@index', 'middleware' => [ 'permission:user_list'], 'as' => 'user.index']);
        Route::get('user/create', ['uses' => 'UserController@create', 'middleware' => [ 'permission:user_create'], 'as' => 'user.create']);
        Route::post('user/store', ['uses' => 'UserController@store', 'middleware' => [ 'permission:user_create'], 'as' => 'user.store']);
        Route::get('user/setting', ['uses' => 'UserController@getCurrentUserSetting', 'middleware' => [ 'permission:user_view'], 'as' => 'user.setting']);
        Route::post('user/setting', ['uses' => 'UserController@setting', 'middleware' => [ 'permission:user_view'], 'as' => 'user.update_setting']);
        Route::get('user/edit/{id}', ['uses' => 'UserController@edit', 'middleware' => [ 'permission:user_edit'], 'as' => 'user.edit']);
        Route::get('user/{id}', ['uses' => 'UserController@show', 'middleware' => [ 'permission:user_view'], 'as' => 'user.show']);
        Route::get('profile/{id}', ['uses' => 'UserController@profile', 'as' => 'user.profile']);
        Route::patch('user/{id}', ['uses' => 'UserController@update', 'middleware' => [ 'permission:user_edit'], 'as' => 'user.update']);
        Route::post('user/updateProfile', ['uses' => 'UserController@updateProfile', 'middleware' => [ 'permission:user_edit'], 'as' => 'user.updateProfile']);
        Route::post('user/{id}', ['uses' => 'UserController@destroy', 'middleware' => [ 'permission:user_delete'], 'as' => 'user']);
        Route::get('check_password', 'UserController@checkPassword')->name('users.password');
        Route::get('checkEmail',  ['uses'=> 'UserController@checkEmail', 'middleware' => [ 'permission:user_list']])->name('users.check');



        // role
        Route::get('role', ['uses' => 'RoleController@index', 'middleware' => [ 'permission:role_list'], 'as' => 'role.index']);
        Route::get('role/create', ['uses' => 'RoleController@create', 'middleware' => [ 'permission:role_create'], 'as' => 'role.create']);
        Route::post('role/store', ['uses' => 'RoleController@store', 'middleware' => [ 'permission:role_create'], 'as' => 'role.store']);
        Route::get('role/edit/{id}', ['uses' => 'RoleController@edit', 'middleware' => [ 'permission:role_edit'], 'as' => 'role.edit']);
        Route::get('role/{id}', ['uses' => 'RoleController@show', 'middleware' => [ 'permission:role_view'], 'as' => 'role.show']);
        Route::patch('role/{id}', ['uses' => 'RoleController@update', 'middleware' => [ 'permission:role_edit'], 'as' => 'role.update']);
        Route::post('role/{id}', ['uses' => 'RoleController@destroy', 'middleware' => [ 'permission:role_delete'], 'as' => 'role']);
    });

});
