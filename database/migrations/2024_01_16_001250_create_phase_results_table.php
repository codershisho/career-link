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
            $table->foreignId('assessment_id')->constrained('m_assessments');
            $table->integer('result_flg')->nullable()->comment('結果フラグ');
            $table->text('review_comment')->nullable()->comment('総評');
            $table->text('memo')->nullable()->comment('メモ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_phase_results', function (Blueprint $table) {
            //
            $table->dropForeign('t_phase_results_recruit_id_foreign');
            $table->dropForeign('t_phase_results_phase_id_foreign');
            $table->dropForeign('t_phase_results_assessment_id_foreign');
        });
        Schema::dropIfExists('t_phase_results');
    }
};
