<?php

namespace App\Queries;


use App\Models\RamblerNews;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RamblerNewsQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return RamblerNews::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(6);
    }  

}