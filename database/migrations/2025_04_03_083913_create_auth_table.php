<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auth', function (Blueprint $table) {
            $table->id()->comment('主键ID');
            $table->string('auth_name', 20)->notNull()->comment('权限名称');
            $table->string('controller', 40)->nullable()->comment('权限对应的控制器');
            $table->string('action', 30)->nullable()->comment('权限对应的方法');
            $table->tinyInteger('pid')->comment('当前权限其父ID');
            $table->enum('is_nav', [1, 2])->notNull() -> default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth');
    }
};
