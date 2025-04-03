<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PublicController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\AuthController;

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
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    // 后台首页
    Route::get('index/index', [IndexController::class, 'index']);
    Route::get('index/welcome', [IndexController::class, 'welcome']);

    // 管理员的管理模块
    Route::get('manager/index', [ManagerController::class, 'index']);

    // 权限管理模块
    Route::get('auth/index', [AuthController::class, 'index']);
    Route::any('auth/add', [AuthController::class, 'add']);
});
