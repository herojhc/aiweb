<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_links', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('menu_id')->unsigned()->comment('菜单ID');
            $table->integer('parent_id')->unsigned()->nullable()->default(null);
            $table->string('title', 100)->comment('标题');
            $table->string('url')->comment('菜单链接');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->string('target', 10)->nullable()->comment('a 标签 target属性');
            $table->string('class')->nullable()->comment('css 类名');
            $table->string('icon_class')->nullable()->comment('icon 类型');
            $table->boolean('status')->default(0)->comment('状态');
            $table->timestamps();
            $table->integer('corp_id')->default(0);
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('menu_links')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_links');
    }
}
