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
        Schema::create('t_recruits', function (Blueprint $table) {
            $table->id()->comment('応募者ID');
            $table->string('name')->comment('応募者名');
            $table->string('name_kana')->comment('応募者名（カナ）');
            $table->string('email')->nullable()->comment('メールアドレス');
            $table->date('birth_date')->nullable()->comment('誕生日');
            $table->string('post_code')->nullable()->comment('郵便番号');
            $table->string('address')->nullable()->comment('住所');
            $table->string('phone')->nullable()->comment('電話番号');
            $table->text('positions')->nullable()->comment('希望職種');
            $table->date('join_date')->nullable()->comment('希望時期');
            $table->text('source')->nullable()->comment('情報源');
            $table->text('free_message')->nullable()->comment('メッセージ');
            $table->string('image')->nullable()->comment('イメージ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_recruits');
    }
};
