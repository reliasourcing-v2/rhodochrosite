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
        Schema::create('parent_pages', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->unsigned()->default(0)->index();
            $table->string('slug')->index();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('header')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('meta_image')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_pages');
    }
};
