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
            $table->foreignId('assessment_id')->constrained('m_assessments');
            $table->text('comments')->nullable()->comment('コメント');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_phase_users', function (Blueprint $table) {
            //
            $table->dropForeign('t_phase_users_recruit_id_foreign');
            $table->dropForeign('t_phase_users_phase_id_foreign');
            $table->dropForeign('t_phase_users_user_id_foreign');
        });
        Schema::dropIfExists('t_phase_users');
    }
};
