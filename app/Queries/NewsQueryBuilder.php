<?php

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return News::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->forEveryone()->with('category')->paginate(4);
    }


    public function getNewsByCategory(string $categoryId):LengthAwarePaginator
    {
        return $this->getModel()->category($categoryId)->paginate(4);
    }


    public function getNewsByStatusAdmin (string $status): LengthAwarePaginator
    {
        if($status ==='active') {
            return ($this->getModel()->active()->paginate(10));

        } elseif (($status ==='hot')) {
            return $this->getModel()->hot()->paginate(10);

        } elseif (($status ==='working')) {
            return $this->getModel()->working()->paginate(10);

        } elseif (($status ==='bloked')) {
            return $this->getModel()->bloked()->paginate(10);
        } else {
            return $this->getModel()->with('category')->paginate(10); 
        }
    }

}