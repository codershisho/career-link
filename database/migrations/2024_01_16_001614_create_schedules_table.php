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
        Schema::create('t_schedules', function (Blueprint $table) {
            $table->id()->comment('スケジュールID');
            $table->foreignId('recruit_id')->constrained('t_recruits');
            $table->dateTime('start_datetime')->nullable()->comment('開始日時');
            $table->dateTime('end_datetime')->nullable()->comment('終了日時');
            $table->text('description')->nullable()->comment('説明・メモ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_schedules');
    }
};
