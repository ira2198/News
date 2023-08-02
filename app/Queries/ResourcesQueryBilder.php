<?php

namespace  App\Queries;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ResourcesQueryBilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Resource::query();                
    }

       public function getAll(): Collection
    {
        return $this->getModel()->get();
    }
}