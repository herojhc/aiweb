<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('corporations')) {
            return;
        }

        Schema::create('corporations', function (Blueprint $table) {
            $table->integer('corp_id');

            $table->string('name', 100)->default('');
            $table->string('code', 150)->default('');
            $table->string('logo', 150)->default('')->nullable();
            $table->string('tel', 20)->default('')->nullable();
            $table->string('email', 100)->default('')->nullable();
            $table->string('introduce', 150)->default('')->nullable();
            $table->integer('province')->default(0);
            $table->integer('city')->default(0);
            $table->smallInteger('type')->default(0);// 租户类型 1 个人 2 租户
            $table->integer('level')->default(0);// 租户的等级
            $table->integer('role_id')->default(0);// 租户的角色（管理员的角色）
            $table->unsignedInteger('user_id')->default(0);// 租户的管理员
            $table->boolean('status')->default(0);
            $table->timestamps();
            // 设置主键
            $table->primary('corp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporations');
    }
}
