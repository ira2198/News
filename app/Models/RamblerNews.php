<?php

namespace App\Models;

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


}
