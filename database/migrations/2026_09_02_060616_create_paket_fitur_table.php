<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_fitur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_harga_id')->constrained('paket_harga')->cascadeOnDelete();
            $table->string('fitur_text');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_fitur');
    }
};