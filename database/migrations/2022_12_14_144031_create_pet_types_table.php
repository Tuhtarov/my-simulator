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
        Schema::create('pet_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->unsignedSmallInteger('growth_factor')->default(1);
            $table->unsignedSmallInteger('age_max');

            $table->foreignId('image_id');
            $table->index('image_id', 'image_pet_type_idx');
            $table->foreign('image_id', 'image_pet_type_fk')
                ->on('images')
                ->references('id');

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
        Schema::dropIfExists('pet_types');
    }
};
