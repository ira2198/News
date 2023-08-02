<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RamblerNews extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'pub_date',
        'link',
        'description',
       
    ];

    public function scopeResource(Builder $query, string $resource): void
    {
        $query->where('author', $resource);
    }


}
