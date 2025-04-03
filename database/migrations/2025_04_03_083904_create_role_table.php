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
        Schema::create('role', function (Blueprint $table) {
            $table->id()->comment('主键ID');
            $table->string('role_name', 20) -> comment('角色名称');
            $table->text('auth_ids') -> comment('权限ID集合');
            $table->text('auth_ac') -> comment('权限控制器和方法组合字符串');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
};
