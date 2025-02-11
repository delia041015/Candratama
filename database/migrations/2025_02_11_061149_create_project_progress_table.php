<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('project_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('omset_id'); // Relasi ke tabel omset
            $table->date('tgl_setting');
            $table->unsignedBigInteger('teknisi_id'); // Relasi ke tabel users
            $table->string('dokumentasi')->nullable();
            $table->enum('status', ['waitinglist', 'selesai'])->default('waitinglist');
            $table->timestamps();
    
            $table->foreign('omset_id')->references('id_omset')->on('omsets')->onDelete('cascade');
            $table->foreign('teknisi_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_progress');
    }
};
