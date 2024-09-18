<?php

namespace App\Repositories;



use App\Models\Publisher;

abstract class PublisherRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Publisher::class;
    }
}
