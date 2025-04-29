<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasUuids, SoftDeletes;
    protected $fillable = [
        'name',
        'about',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
   
}
