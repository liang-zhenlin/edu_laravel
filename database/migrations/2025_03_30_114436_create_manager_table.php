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
        Schema::create('manager', function (Blueprint $table) {
            $table->id()->comment('主键ID');
            $table->string('username', 20)->notNull()->comment('用户名');
            $table->string('password')->notNull()->comment('密码');
            $table->enum('gender', [1, 2, 3])->notNull()->default('1')->comment('性别：1-男；2-女；3-保密');
            $table->string('mobile', 11)->comment('手机号');
            $table->string('email', 50)->comment('邮箱');
            $table->tinyInteger('role_id')->comment('角色表的主键ID');
            $table->timestamps();
            $table->rememberToken()->comment('登录的token');
            $table->enum('status', [1, 2])->notNull()->default('2')->comment('账户状态：1-禁用；2-启用；');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager');
    }
};
