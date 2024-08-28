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
        Schema::create('category_book', function (Blueprint $table) {
            // Foreign key for the category
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            // Foreign key for the book
            $table->foreignId('book_id')
                ->constrained('books')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_book');
    }
};
