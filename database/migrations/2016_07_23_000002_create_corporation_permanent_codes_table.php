<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporationPermanentCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('corporation_permanent_codes')) {
            return;
        }

        Schema::create('corporation_permanent_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corp_id');
            $table->integer('agent_id');

            // Adding more table related fields here...
            $table->string('name', 100)->default('');
            $table->string('permanent_code', 150)->default('');
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
        Schema::dropIfExists('corporation_permanent_codes');
    }
}
