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
        Schema::create('t_phase_user_results', function (Blueprint $table) {
            $table->id()->comment('フェーズ毎のユーザー毎の結果ID');
            $table->foreignId('phase_user_id')->constrained('t_phase_users');
            $table->foreignId('assessment_id')->constrained('m_assessments');
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
        Schema::dropIfExists('t_phase_user_results');
    }
};
