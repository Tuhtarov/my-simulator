<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('path');
            $table->dropColumn('url');
            $table->dropTimestamps();

            $table->string('name');
            $table->string('ext');
            $table->integer('width');
            $table->integer('height');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('path');
            $table->string('url');
            $table->timestamps();

            $table->dropColumn('name');
            $table->dropColumn('ext');
            $table->dropColumn('width');
            $table->dropColumn('height');
        });
    }
};
