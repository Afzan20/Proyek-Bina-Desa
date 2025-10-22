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
       Schema::create('lokasi_aset', function (Blueprint $table) {
            $table->increments('lokasi_id');

            // Foreign key manual, disesuaikan dengan primary key di tabel aset
            $table->unsignedInteger('aset_id');
            $table->foreign('aset_id')
                ->references('aset_id')
                ->on('aset')
                ->onDelete('cascade');

            $table->text('keterangan')->nullable();
            $table->string('lokasi_text');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_aset');
    }
};
