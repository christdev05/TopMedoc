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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("ville_id")->constrained();
            $table->integer('code_livreur');
            $table->text('list_produits');
            $table->text('list_quantites');
            $table->text('list_pharmacies');
            $table->integer('total_produit');
            $table->integer('receveur');
            $table->integer('nom_receveur');
            $table->integer('telephone_receptionneur');
            $table->text('addresse_id');
            $table->text('localisation_gps');
            $table->integer('frais_service');
            $table->integer('en_attente');
            $table->integer('code_transaction');
            $table->date('date_commande');
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
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign("user_id");
            $table->dropForeign("commande_id");
            $table->dropForeign("ville_id");
            $table->dropForeign("addresse_id");
        });

        Schema::dropIfExists('commandes');
    }
};
