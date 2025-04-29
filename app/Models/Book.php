<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasUuids, SoftDeletes;
    protected $fillable = [
                'title',
                'code' ,
                'publisher_id',
                'publisher' ,
                'published_year',
                'edition',
                'language',
                'copies',
                'pages',
                'description',
                'tags',
                'poster',
            ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publish()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
}
