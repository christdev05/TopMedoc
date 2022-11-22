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
        Schema::create('disponibilites', function (Blueprint $table) {
            $table->id();
            $table->foreignId("products_id")->constrained();
            $table->foreignId("pharmacie_id")->constrained();
            $table->integer('prix_vendu');
            $table->integer('quantite');
            $table->integer('disponible');
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
        Schema::table('disponibilites', function (Blueprint $table) {
            $table->dropForeign("products_id");
            $table->dropForeign("pharmacie_id");
        });
        Schema::dropIfExists('disponibilites');
    }
};
