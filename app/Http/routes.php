<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

route::get("index","test@index");
route::get("news","test@news");
route::get("about","test@about");
route::get("service","test@service");
route::get("icash","test@icash");
route::get("contact","test@contact");
route::get("form","test@form");
route::get("clients","test@clients");
route::get("writenews","test@writenews");
route::get("dashboard","test@dashboard");
route::get("applied","test@applied");

//view on admin
route::get("applied","test@showapplied");
route::get("writenews","test@showall");
route::get("dashboard","test@showmsg");
route::get("login","MainController@admin");


route::post("checklogin","MainController@checklogin");
route::get("successlogin","MainController@successlogin");
route::get("logout","MainController@logout");

Route::get('dashboard/{id}', 'test@showmsgid')->name('showmsgid');
//view on user
route::get("news","test@lihat");
route::get("news/{topic}",'test@news');

//insert data to database
//Admin
route::post("insertNews","test@insertNews");

//database pekerjaan
route::post("store","test@store");

//database pesan
route::post("kirim","test@kirim");

// delete data in database
// delete News
route::get("/destroy/{id}","test@destroy");
