<?php

namespace App\Repositories;



use App\Models\Author;

abstract class AutherRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Author::class;
    }
}
