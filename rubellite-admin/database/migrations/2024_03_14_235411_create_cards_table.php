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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('frame_id')->index();
            $table->integer('order')->unsigned()->default(0)->index();
            $table->string('title')->nullable();
            $table->text('content')->nullable();;
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->boolean('accent')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
