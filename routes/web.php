<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PublicController;

Route::get('/', function () {
    return "larave 教育平台";
});

// 后台路由部分
Route::group(['prefix' => 'admin'], function() {
    // 后台登录页面
    Route::get('public/login', [PublicController::class, 'login']);
    // 后台登录处理页面
    Route::post('public/check', [PublicController::class, 'check']);
});
