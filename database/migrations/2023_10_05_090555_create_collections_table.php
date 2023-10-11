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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('namaKoleksi', 100);
            $table->tinyInteger('jenisKoleksi');
            $table->date('createdAt')->default(now());
            $table->integer('jumlahKoleksi');
            $table->string('namaPengarang');
            $table->integer('tahunTerbit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
