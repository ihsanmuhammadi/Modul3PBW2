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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transactionId');
            $table->unsignedBigInteger('collectionId');
            $table->date('tanggalKembali')->nullable();
            $table->tinyInteger('status');
            $table->string('keterangan', 1000)->nullable();
            $table->timestamps();

            $table->foreign('transactionId')->references('id')->on('transactions');
            $table->foreign('collectionId')->references('id')->on('collections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transactions');
    }
};
