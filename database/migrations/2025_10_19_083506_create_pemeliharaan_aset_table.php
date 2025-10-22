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
          Schema::create('pemeliharaan_aset', function (Blueprint $table) {
            $table->increments('pemeliharaan_id');

            // Fix foreign key manual
            $table->unsignedInteger('aset_id');
            $table->foreign('aset_id')
                ->references('aset_id')
                ->on('aset')
                ->onDelete('cascade');

            $table->date('tanggal');
            $table->text('tindakan');
            $table->decimal('biaya', 15, 2)->default(0);
            $table->string('pelaksana')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_aset');
    }
};
