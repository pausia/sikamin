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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique(); 
            $table->integer('sidang_diikuti_hari_ini')->default(0);
            $table->string('name_full')->nullable();
            $table->string('nip')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->where('role_name', 'Dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
