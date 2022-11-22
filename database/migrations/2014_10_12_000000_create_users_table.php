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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId("type_pieces_id")->constrained();
            $table->foreignId("villes_id")->constrained();
            $table->string('email')->unique();
            $table->text('telephone');
            $table->text('num_piece_identite');
            $table->date('date_expiration');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('utype')->default('USR')->comment('ADM for Admin and USR for User or Customer');
            $table->string('password');
            $table->rememberToken();
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
            $table->dropForeign("type_pieces_id");
            $table->dropForeign("villes_id");
        });
        Schema::dropIfExists('users');
    }
};
