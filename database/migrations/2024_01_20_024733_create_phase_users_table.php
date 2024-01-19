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
        Schema::create('t_phase_users', function (Blueprint $table) {
            $table->id()->comment('応募者のフェーズ毎の担当者ID');
            $table->foreignId('recruit_id')->constrained('t_recruits');
            $table->foreignId('phase_id')->constrained('m_phases');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_phase_users');
    }
};
