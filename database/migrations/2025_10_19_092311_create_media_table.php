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
        Schema::create('media', function (Blueprint $table) {
            $table->increments('media_id');
            $table->string('path'); // lokasi file
            $table->string('model_type'); // tipe model (contoh: 'aset', 'lokasi_aset', 'pemeliharaan_aset')
            $table->unsignedBigInteger('model_id'); // ID dari model terkait
            $table->timestamps();

            $table->index(['model_type', 'model_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
