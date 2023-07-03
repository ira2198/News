<?php

namespace App\Models;

use App\Enums\NewsStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    use HasFactory;

     protected $table = 'news';

     protected $fillable = [
        'title',
        'categories_id',
        'user_id',
        'status',
        'description',
        'text',
    ];

    public function sources():BelongsToMany
    {
        return $this->belongsToMany(Source::class, 
            'news_from_sources', 'news_id', 'sources_id'
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    /*
     Scopes
       
    */
    /*
        get by category
    */
    public function scopeCategory(Builder $query, int $categoryId): void
    {
        $query->where('categories_id', $categoryId)
        ->where('status', "<>", NewsStatus::BLOKED->value)
        ->where('status', "<>", NewsStatus::WORKING->value);
    }

    /*
        get by status
    */

    public function scopeActive(Builder $query): void
    {
        $query->where('status', NewsStatus::ACTIVE->value);
    }

    public function scopeWorking(Builder $query): void
    {
        $query->where('status', NewsStatus::WORKING->value);
    }

    public function scopeHot(Builder $query): void
    {
        $query->where('status', NewsStatus::HOT->value);
    }

    public function scopeBloked(Builder $query): void
    {
        $query->where('status', NewsStatus::BLOKED->value);
    }


    public function scopeForEveryone(Builder $query) : void
    {
        $query->where('status', "<>", NewsStatus::BLOKED->value)
            ->where('status', "<>", NewsStatus::WORKING->value);
    }
}
