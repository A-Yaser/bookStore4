<?php

namespace App\Repositories;



use App\Models\Category;

abstract class CategoryRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Category::class;
    }
}
