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

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('description')->nullable();
            // $table->foreign('category_id')//many to many;
            // $table->string('author_id');//many to many
            $table->integer('pages_count');
            $table->text('status');
            $table->date('release_date');
            // $table->fsoreign('publisher_id'); many to many
            // $table->fsoreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->integer('price');
            $table->string('cover_image')->nullable();
            $table->text('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
