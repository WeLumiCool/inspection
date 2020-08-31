<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeFailsColumnsToBuildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('builds', function (Blueprint $table) {
            $table->text('statement')->nullable()->change();
            $table->text('apu')->nullable()->change();
            $table->text('act')->nullable()->change();
            $table->text('project')->nullable()->change();
            $table->text('solution')->nullable()->change();
            $table->text('certificate')->nullable()->change();
            $table->string('category')->after('type_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('builds', function (Blueprint $table) {
            $table->string('statement')->change();
            $table->string('apu')->change();
            $table->string('act')->change();
            $table->string('project')->change();
            $table->string('solution')->change();
            $table->string('certificate')->change();
            $table->dropColumn('category');
        });
    }
}
