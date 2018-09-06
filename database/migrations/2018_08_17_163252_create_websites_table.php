<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->comment('网站名称');
            $table->string('description')->nullable()->comment('网站描述');
            $table->string('logo')->comment('LOGO地址');
            $table->string('domain')->nullable()->comment('网站主域名');
            $table->string('mobile_domain')->nullable()->comment('手机站域名');
            $table->string('theme')->default('default')->comment('默认主题');
            $table->boolean('is_default')->default(0)->comment('是否默认网站');
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
        Schema::dropIfExists('websites');
    }
}
