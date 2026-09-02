<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_tech_stack', function (Blueprint $table) {
            $table->id();
            $table->foreignId('porto_project_id')->constrained('portfolio_projects')->cascadeOnDelete();
            $table->string('tech_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_tech_stack');
    }
};