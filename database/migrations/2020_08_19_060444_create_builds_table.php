<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('statement');
            $table->string('apu');
            $table->string('act');
            $table->string('project');
            $table->unsignedInteger('type_id')->nullable();
            $table->string('address');
            $table->string('area');
            $table->string('solution');
            $table->string('note');
            $table->string('longitude');
            $table->string('latitude');
            $table->boolean('legality')->default(0);
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
        Schema::dropIfExists('builds');
    }
}
