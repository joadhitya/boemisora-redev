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
        Schema::create('md_social_media', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('name');
            $table->string('type');
            $table->string('link')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->json('created_by');
            $table->json('updated_by');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_social_media');
    }
};
