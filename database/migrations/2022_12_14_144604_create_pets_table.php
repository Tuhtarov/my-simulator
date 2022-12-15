<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                ->nullable(false);

            $table->unsignedSmallInteger('size')
                ->default(0);

            $table->unsignedSmallInteger('age')
                ->default(0);

            $table->boolean('is_dead')
                ->default(false);

            $table->foreignId('pet_type_id');
            $table->index('pet_type_id', 'pet_to_pet_type_idx');
            $table->foreign('pet_type_id', 'pet_to_pet_type_fk')
                ->on('pet_types')
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
        Schema::dropIfExists('pets');
    }
};
