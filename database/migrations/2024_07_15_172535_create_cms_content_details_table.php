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
        Schema::create('cms_content_details', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('id_master', 21);
            $table->enum('type', ['label', 'image', 'undefined', 'button'])->default('undefined');
            $table->string('code');
            $table->string('name');
            $table->text('class')->nullable();
            $table->binary('content_id')->nullable();
            $table->binary('content_en')->nullable();
            $table->integer('sequence')->nullable();
            $table->string('description')->nullable();
            $table->string('style')->nullable();
            $table->string('image')->nullable();
            $table->string('link_title')->nullable();
            $table->string('link_url')->nullable();
            $table->enum('is_active', ['yes', 'no'])->default('yes');
            $table->json('created_by');
            $table->json('updated_by');
            $table->timestamps();
            $table->foreign('id_master')->references('id')->on('cms_content_master')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_content_details');
    }
};
