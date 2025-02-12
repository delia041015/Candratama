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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nomer_surat');
            $table->string('divisi_dari');
            $table->string('divisi_tujuan');
            $table->text('dasar_pengajuan');
            $table->string('no_pengajuan');
            $table->string('item_diajukan');
            $table->integer('jumlah');
            $table->decimal('harga', 15, 2);
            $table->decimal('total', 15, 2);
            $table->enum('status', ['acc', 'tidak']);
            $table->timestamps();
        });
    }

};
