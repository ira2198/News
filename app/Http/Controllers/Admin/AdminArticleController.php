<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\SourcesQueryBuilder;
use App\Queries\UserQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    protected QueryBuilder $categoriesQueryBuilder;
    protected QueryBuilder $newsQueryBuilder;
    protected QueryBuilder $sourcesQueryBilder;
    protected QueryBuilder $userQueryBilder;

    public function __construct( 
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsQueryBuilder $newsQueryBuilder,
        SourcesQueryBuilder $sourcesQueryBilder,
        UserQueryBuilder $userQueryBilder
        )
    {  
        $this->categoriesQueryBuilder=$categoriesQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
        $this->sourcesQueryBilder = $sourcesQueryBilder;
        $this->userQueryBilder = $userQueryBilder;
    }

   
    public function create():View
    {     
        $sources = $this->sourcesQueryBilder->getAll();  
        $categories = $this->categoriesQueryBuilder->getAll();
        $users = $this->userQueryBilder->getAll();

        return view('admin.createArticle', compact('categories', 'sources'));
    }
    
    public function store(Request $request):RedirectResponse
    {
        $sources = $request->input('sources');        

        $news = $request->only(['title', 'user_id', 'description', 'categories_id', 'status', 'text']);
        //dd($news);

        $news = News::create($news);
       

        if ($news !== false) {
            if( $sources !== null) {
                $news->sources()->attach($sources);  
               
                return (\redirect()->route('admin.news.show')-> with ('success', "OK"));
            }
        }
        
        return (\back()->with('error', 'News has not been create'));
    }


    public function show(NewsQueryBuilder $newsQueryBuilder, News $news, $status = 'all')
    {   
        $user = User::find($news); 
        $category = Category::find($news);
        return view('admin.newsShow', ['newsList' => $newsQueryBuilder->getNewsByStatusAdmin($status), $category, $user]);
    }

    
    public function edit(News $news): View
    {
       
        return view ('admin.updateArticle', [
            'news'=>$news,
            'sources' => $this->sourcesQueryBilder->getAll(),  
            'categories' => $this->categoriesQueryBuilder->getAll()
        ]);
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $sources = $request->input('sources');
        $news = $news->fill($request->only(['title', 'user_id', 'description', 'categories_id', 'status', 'text']));
        
        if($news->save()) {
            $news->sources()->sync($sources);
            return (\redirect()->route('admin.news.show')->with('success', "OK"));
        }
        return (\back()->with('error', 'News has not been create'));
    }
    

}
