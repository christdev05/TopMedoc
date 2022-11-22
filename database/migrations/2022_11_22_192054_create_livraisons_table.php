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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->foreignId("commande_id")->constrained();
            $table->foreignId("ville_id")->constrained();
            $table->foreignId("interval_distance_id")->constrained();
            $table->text('lieu_livraison');
            $table->text('lieu_livraison_gps');
            $table->integer('frais_livraison');
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
        Schema::table('livraisons', function (Blueprint $table) {
            $table->dropForeign("commande_id");
            $table->dropForeign("ville_id");
            $table->dropForeign("interval_distance_id");
        });
        Schema::dropIfExists('livraisons');
    }
};
