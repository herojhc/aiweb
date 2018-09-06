<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pages', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->comment('网站标题');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->integer('parent_id')->unsigned()->nullable()->default(null)->comment('上级页面ID');
            $table->text('css')->nullable()->comment('自定义css');
            $table->text('js')->nullable()->comment('自定义js');
            $table->text('data')->nullable()->comment('自定义模板数据');
            $table->boolean('status')->default(0)->comment('页面状态0未启用1启用');
            $table->string('meta_title')->nullable()->comment('seo 页面标题');
            $table->string('meta_keywords')->nullable()->comment('seo 页面关键字');
            $table->string('meta_description')->nullable()->comment('seo 页面描述');
            $table->timestamps();
            $table->integer('corp_id')->default(0);
            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
