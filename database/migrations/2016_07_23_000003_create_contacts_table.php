<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('contacts')) {
            return;
        }

        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('contact_id');
            $table->primary('contact_id');
            $table->integer('user_id')->default(0);
            $table->integer('corp_id')->default(0);
            // Adding more table related fields here...
            $table->string('avatar', 255)->default('')->nullable();
            $table->char('gender', 1)->nullable();
            $table->date('birthday')->nullable();
            $table->string('code', 50);
            $table->string('name', 20);
            $table->string('mobile', 20)->default('')->nullable();
            $table->string('email', 20)->default('')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_employee')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_sub_admin')->default(0)->nullable();
            $table->string('open_id', 50)->default('')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
