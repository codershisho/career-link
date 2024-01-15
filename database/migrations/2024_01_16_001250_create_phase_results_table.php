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
        Schema::create('t_phase_results', function (Blueprint $table) {
            $table->id()->comment('結果ID');
            $table->foreignId('recruit_id')->constrained('t_recruits');
            $table->foreignId('phase_id')->constrained('m_phases');
            $table->integer('result')->nullable()->comment('結果'); // 各フェーズごとの採用結果
            $table->text('comments')->nullable()->comment('コメント'); // コメントや備考
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_phase_results');
    }
};
