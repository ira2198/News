<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Store;
use App\Http\Requests\News\Update;
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
use Illuminate\Support\Facades\Log;
use Throwable;

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

    
    public function store(Store $request):RedirectResponse
    {
        $validated = $request->validated(); 
         //dd($news);
        $news = News::create($validated);       

        if ($news) {          
                $news->sources()->attach($request->getSources()); 
                $category  = Category::find($request->id);
                $user = User::find($request->id);
                return (\redirect()->route('article', [$news, $category, $user])-> with ('success', __('The article was successfully created!')));           
        }        
        return (\back()->with('error', __('Article creation error!')));
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

    public function update(Update $request, News $news): RedirectResponse
    { 
       $news = $news->fill($request->validated());
        if($news->save()) {
            $news->sources()->sync($request->getSources());
            $category  = Category::find($request->id);
            $user = User::find($request->id);
        
            return (\redirect()->route('article', [$news, $category, $user])->with('success', __('The article has been successfully updated!')));
        }
        return (\back()->with('error', __('Error updating the article!')));
    }


    public function destroy(News $news)
    {
        try {            
            $news->delete();   
            return (response()->with('success', __("Record deleted!"))->json(('Record deleted!')));

        }catch(Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return \response()->json('error', 400);
        }
    }
    

}
