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

//------------FRONTEND----------------

//index
Route::get('','frontend\HomeController@getIndex');
Route::get('about','frontend\HomeController@getAbout' );
Route::get('contact', 'frontend\HomeController@getContact');

//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('', 'frontend\CartController@getCart');
});

//checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('','frontend\CheckoutController@getCheckout' );
    Route::get('complete','frontend\CheckoutController@getComplete' );
    Route::post('','frontend\CheckoutController@postCheckout' );
});

//product
Route::group(['prefix' => 'product'], function () {
    Route::get('shop','frontend\ProductController@getShop' );
    Route::get('detail', 'frontend\ProductController@getDetail');
});



//----------------BACKEND------------
//login
Route::get('login','backend\LoginController@getLogin');
Route::post('login','backend\LoginController@postLogin');

//admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('','backend\IndexController@getIndex');

    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('','backend\CategoryController@getCategory');
        Route::get('edit','backend\CategoryController@getEditCategory');
        Route::post('','backend\CategoryController@postCategory');
        Route::post('edit','backend\CategoryController@postEditCategory');
    });

    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('','backend\OrderController@getOrder');
        Route::get('detail', 'backend\OrderController@getDetail');
        Route::get('processed', 'backend\OrderController@getProcessed');
    });

    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('','backend\ProductController@getProduct');
        Route::get('add', 'backend\ProductController@getAddProduct');
        Route::get('edit','backend\ProductController@getEditProduct' );
        Route::post('add', 'backend\ProductController@postAddProduct');
        Route::post('edit','backend\ProductController@postEditProduct' );
    });

    //user
    Route::group(['prefix' => 'user'], function () {
        Route::get('','backend\UserController@getUser');
        Route::get('add', 'backend\UserController@getAddUser');
        Route::get('edit','backend\UserController@getEditUser');
        Route::post('add', 'backend\UserController@postAddUser');
        Route::post('edit','backend\UserController@postEditUser');
    });

});







//--------------------LÝ THUYẾT--------------

//SCHEMA

Route::group(['prefix' => 'schema'], function () {
    //Tạo bảng
    Route::get('create-table', function () {
        Schema::create('users', function ($table) {
            $table->bigIncrements('id');      //bigint ,tự tăng ,khóa chính ,unsigned
            $table->string('name')->nullable();   //varchar ,255 ký tự , cho phép null
            $table->integer('phone')->unsigned()->nullable();   //int , ko dấu , cho phép null
            $table->string('address', 100)->nullable()->unique();   //varchar , 100 ký tự , cho phép null, duy nhất
            $table->boolean('level')->nullable()->default(1);    // boolean , cho phép null , mặc đinh là 1
            $table->timestamps();             // tự tạo 2 trường created_at , updated_at
        });

        Schema::create('post', function ($table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    });

    //xóa bảng
    Route::get('del-table', function () {
        Schema::dropIfExists('thanh-vien');
    });

    //sửa tên bảng
    Route::get('rename-table', function () {
        Schema::rename('users', 'thanh-vien');
    });


    //tương tác với cột
    //thêm cột
    Route::get('add-col', function () {
        Schema::table('users', function ($table) {
            $table->integer('id_number')->unsigned()->nullable()->after('address');
        });
    });

    //sửa , xóa cột
    //sử dụng thư viện docttrine/dbal
    //composer require doctrine/dbal
    Route::get('edit-col', function () {
        //sửa tên cột
        Schema::table('users', function ($table) {
            $table->renameColumn('name', 'full');
        });

        //xóa cột
        Schema::table('users', function ($table) {
            $table->dropColumn('id_number');
        });

    });
});

