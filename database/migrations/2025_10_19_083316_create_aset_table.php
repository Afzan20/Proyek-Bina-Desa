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
        Schema::create('aset', function (Blueprint $table) {
            $table->increments('aset_id');

            // Tambahkan kolom kategori_id sebelum foreign key
            $table->unsignedInteger('kategori_id');
            $table->foreign('kategori_id')
                ->references('kategori_id')
                ->on('kategori_aset')
                ->onDelete('cascade');

            $table->string('kode_aset')->unique();
            $table->string('nama_aset');
            $table->date('tgl_perolehan');
            $table->decimal('nilai_perolehan', 15, 2)->default(0);
            $table->string('kondisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
