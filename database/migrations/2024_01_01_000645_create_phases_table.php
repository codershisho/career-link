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
        Schema::create('m_phases', function (Blueprint $table) {
            $table->id()->comment('フェーズID');
            $table->string('name')->comment('フェーズ名'); // フェーズ名（書類選考、一次選考、二次選考など）
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_phases');
    }
};
