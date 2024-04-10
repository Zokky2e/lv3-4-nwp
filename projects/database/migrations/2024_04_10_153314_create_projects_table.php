<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('leader_id')->after('opis_projekta'); // Dodajemo stupac za ID voditelja projekta nakon stupca 'opis_projekta'
            $table->foreign('leader_id')->references('id')->on('users'); // Definiramo vanjski ključ na tablicu 'users'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::table('projects', function (Blueprint $table) {
        $table->dropForeign(['leader_id']);
        $table->dropColumn('leader_id');
        });
    }
};
