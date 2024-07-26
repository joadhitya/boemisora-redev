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
        Schema::create('cms_blogs', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('id_category', 21);
            $table->string('title');
            $table->string('headline');
            $table->string('keyword');
            $table->string('slug');
            $table->string('short_description')->nullable();
            $table->binary('content_id');
            $table->binary('content_en')->nullable();
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->date('date_archieve')->nullable();
            $table->string('status')->default('DRAFT');
            $table->string('is_favorite')->default('no');
            $table->foreign('id_category')->references('id')->on('md_category_blogs')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_blogs');
    }
};
