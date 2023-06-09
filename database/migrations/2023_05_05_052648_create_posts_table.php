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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignid('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->longText('excerpt');
            $table->longText('body');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->boolean('private')->default(true);
            $table->string('banner_colour')->nullable()->default('#dee2e6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
