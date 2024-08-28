<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Book extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;


    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'books';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'title',
        'description',
        'pages_count',
        //'author',
        'status',
        'release_date',
        'price',
        'cover_image',
        'slug',
    ];
    public $translatable = [
        'title',
        'description',
        'slug',

    ];


    // protected $hidden = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_book');
    }

    public function publishers(): BelongsToMany
    {
        return $this->belongsToMany(Publisher::class, 'book_publisher');
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
