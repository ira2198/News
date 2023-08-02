<?php

namespace App\Providers;


use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\RamblerNewsQueryBuilder;
use App\Queries\ResourcesQueryBilder;
use App\Queries\SourcesQueryBuilder;
use App\Queries\UserQueryBuilder;
use App\Services\Contracts\ExchangeRates;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\Contracts\Upload;
use App\Services\Contracts\YandexNews;
use App\Services\ExchangeRatesService;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadServise;
use App\Services\YandexNewsServise;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SourcesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, UserQueryBuilder::class);  
        $this->app->bind(QueryBuilder::class, ResourcesQueryBilder::class);      
        
        $this->app->bind(QueryBuilder::class, RamblerNewsQueryBuilder::class);
        $this->app->bind(Upload::class, UploadServise::class);

        $this->app->bind(YandexNews::class, YandexNewsServise::class);
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(ExchangeRates::class, ExchangeRatesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PaginationPaginator::useBootstrapFive();
    }

   
}
