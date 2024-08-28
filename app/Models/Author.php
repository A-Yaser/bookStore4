<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Author extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name',
        'bio',
        'photo',
    ];
    public $translatable = [
        'name',
        'bio',

    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_author');
    }
}
