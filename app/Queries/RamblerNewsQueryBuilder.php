<?php

namespace App\Queries;


use App\Models\RamblerNews;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RamblerNewsQueryBuilder extends QueryBuilder
{
    public function getModel():Builder
    { 
        return RamblerNews::query()->latest();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(7);
    }  
    
    public function getByResource(string $resource = null):LengthAwarePaginator
    {
        if($resource){
        return $this->getModel($resource)->paginate(10);
        }else{
            return $this->getModel()->paginate(10);
        }

    }

}