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
        Schema::create('livreurs', function (Blueprint $table) {
            $table->id();
            $table->integer('telephone1');
            $table->integer('telephone2');
            $table->integer('num_piece_identite');
            $table->date('date_expiration');
            $table->text('coordonnees_gps');
            $table->foreignId("villes_id")->constrained();
            $table->foreignId("type_pieces_id")->constrained();
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
        Schema::table('livreurs', function (Blueprint $table) {
            $table->dropForeign("villes_id");
            $table->dropForeign("type_pieces_id");
        });
        Schema::dropIfExists('livreurs');
    }
};
