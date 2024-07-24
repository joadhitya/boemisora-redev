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
        Schema::create('layout_masters', function (Blueprint $table) {
            $table->string('id', 21)->primary();
            $table->string('code');
            $table->string('name');
            $table->integer('number_of_image');
            $table->binary('style_css')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layout_masters');
    }
};
