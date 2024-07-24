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
        Schema::create('layout_images', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('id_master', 21);
            $table->string('name');
            $table->integer('sequence');
            $table->integer('height');
            $table->integer('width');
            $table->string('type');
            $table->string('image');
            $table->json('created_by');
            $table->json('updated_by');
            $table->timestamps();
            $table->foreign('id_master')->references('id')->on('layout_masters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layout_images');
    }
};
