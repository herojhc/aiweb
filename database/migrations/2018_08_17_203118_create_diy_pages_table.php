<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiyPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diy_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_type')->comment('页面类型');
            $table->text('data')->comment('模板数据');
            $table->string('preview_image_url')->nullable()->comment('预览图片地址');
            $table->integer('corp_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diy_pages');
    }
}
