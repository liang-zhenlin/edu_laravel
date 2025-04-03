<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PublicController;
use App\Http\Controllers\Admin\IndexController;

Route::get('/', function () {
    return "larave 教育平台";
});

// 后台路由部分（不需要权限判断）
Route::group(['prefix' => 'admin'], function() {
    // 后台登录页面
    Route::get('public/login', [PublicController::class, 'login']) -> name('login');
    // 后台登录处理页面
    Route::post('public/check', [PublicController::class, 'check']);
    // 后台退出登录
    Route::get('public/logout', [PublicController::class, 'logout']);

});


// 后台路由部分（需要权限判断）
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // 后台首页
    Route::get('index/index', [IndexController::class, 'index']);
    Route::get('index/welcome', [IndexController::class, 'welcome']);

});
