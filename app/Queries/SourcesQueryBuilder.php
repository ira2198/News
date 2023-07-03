<?php

namespace App\Queries;

use App\Models\Source;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class SourcesQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Source::query();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->getModel()->paginate(12);
    }

    public function getByArticle($article): Collection    
    {
        
        return $this->getModel()->source()->attach($article)->with('sources');
        
    }
}