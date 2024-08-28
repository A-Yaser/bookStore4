<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Category extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    protected $fillable = [
        'name',
        'parent_id',
        'slug',

    ];
    public $translatable = [
        'name',
        'slug',

    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relationship with the child category
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'book_category');
    }
}
