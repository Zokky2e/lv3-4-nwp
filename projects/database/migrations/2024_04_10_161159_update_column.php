<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('project_user', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->after('id');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    { 
        Schema::table('project_user', function (Blueprint $table) {
        $table->renameColumn('id', 'user_id');
        $table->foreign('user_id')->references('id')->on('users');
        });
    }
};
