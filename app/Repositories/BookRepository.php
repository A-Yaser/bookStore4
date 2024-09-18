<?php

namespace App\Repositories;

use App\Models\Book;

abstract class BookRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Book::class;
    }
}
