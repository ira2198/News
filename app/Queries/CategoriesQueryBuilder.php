<?php

namespace  App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CategoriesQueryBuilder extends QueryBuilder
{
    public function getModel(): Builder
    {
        return Category::query();                
    }

    public function getCategoryById(int $categoryId)
    {
        return $this->getModel()->byId($categoryId);
    }

    public function getAll(): Collection
    {
        return $this->getModel()->get();
    }
}