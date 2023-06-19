<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(): Collection
    {
        return DB::table($this->table)
            ->select('news.*', 'categories.category_name as category', 'users.first_name as name', 'users.last_name as surname')
            ->join('categories', 'news.categories_id' ,'=', 'categories.id')
            ->join('users', 'news.user_id' ,'=',  'users.id')
            ->get();
    }

    public function getNewsByCategory(int $categories_id): Collection
    {
        return DB::table($this->table)
        ->select('news.*', 'categories.category_name as category', 'users.first_name as name', 'users.last_name as surname')
        ->join('categories', 'news.categories_id' ,'=', 'categories.id')
        ->join('users', 'news.user_id' ,'=',  'users.id')
        ->where('news.categories_id' ,'=', $categories_id)
        ->get();
    }

    public function getNewsById(int $id): Collection
    {
        return DB::table($this->table)
        ->select('news.title', 'news.id', 'news.text', 'news.created_at', 'categories.category_name as category', 'users.first_name as name', 'users.last_name as surname')
        ->join('categories', 'news.categories_id' ,'=', 'categories.id')
        ->join('users', 'news.user_id' ,'=',  'users.id')
        ->where('news.id' ,'=', $id)
        ->get();
    }
}
