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
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->text('nom_pharmacie');
            $table->text('pharmacien_chef');
            $table->foreignId("ville_id")->constrained();
            $table->text('arrondissement');
            $table->text('quartier');
            $table->double('longitude');
            $table->double('latitude');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pharmacies', function (Blueprint $table) {
            $table->dropForeign("ville_id");
        });
        Schema::dropIfExists('pharmacies');
    }
};
