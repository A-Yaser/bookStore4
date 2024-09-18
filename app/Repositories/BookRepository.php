<?php

namespace App\Repositories;



use App\Models\Author;

abstract class AuthorRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Author::class;
    }
}
