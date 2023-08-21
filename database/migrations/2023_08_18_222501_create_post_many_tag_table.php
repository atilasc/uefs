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
        Schema::create('post_many_tag', function (Blueprint $table) {
            // $table->id();
            $table->integer('tag_id');
            $table->integer('post_id');
            // $table->foreign('tag_id')->references('id')->on('tags');
            // $table->foreign('post_id')->references('id')->on('posts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_many_tag');
    }
};