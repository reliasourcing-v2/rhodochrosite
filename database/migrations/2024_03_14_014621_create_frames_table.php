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
        Schema::create('frames', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_page_id')->index()->nullable();
            $table->foreignId('sub_page_id')->index()->nullable();
            $table->foreignId('child_page_id')->index()->nullable();
            $table->integer('order')->unsigned()->default(0)->index();
            $table->string('label');
            $table->string('custom_class')->nullable();
            $table->boolean('image_first')->default(1)->nullable();
            $table->string('frame_type')->default(1);
            $table->string('card_type')->default(1)->nullable();
            $table->string('image')->nullable();
            $table->text('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frames');
    }
};
