<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Publisher extends Model
{
    use CrudTrait;
    use HasFactory;
    // use HasTranslations;

    protected $fillable = [
        'name',
        'country',

    ];
    public $translatable = [
        'name',
        'country',

    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_publisher');
    }
}
