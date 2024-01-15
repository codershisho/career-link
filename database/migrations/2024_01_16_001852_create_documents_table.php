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
        Schema::create('t_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruit_id')->constrained('t_recruits');
            $table->integer('document_type')->nullable()->comment('ドキュメントの種類'); // ドキュメントの種類（履歴書、職務経歴書など）
            $table->string('file_path')->nullable()->comment('ファイルパス'); // ファイルのパスやURL
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_documents');
    }
};
