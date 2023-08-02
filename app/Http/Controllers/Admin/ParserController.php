<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParse;
use App\Models\RamblerNews;
use App\Queries\ResourcesQueryBilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser, ResourcesQueryBilder $resourcesQueryBilder)
    {
        $urls = $resourcesQueryBilder->getAll();
  
    // $list=[];
        foreach ($urls as $item){
            $url = $item->link;
             dispatch(new NewsParse($url));
        }    

    return 'Data Saved';

    //     //return view('news.ramblerNews', ['news' => $news]);

    //     // $news = $parser->saveParseData();

    //     foreach ($news['news'] as $item){

    //         $item['pub_date']=$item['pubDate'];
    //         unset($item['pubDate']);

    //     //    dd($item);
    //         $rambler = RamblerNews::create($item);
    //     }

    //     if ($rambler){ 
    //         return (\redirect()->route('news.ramblerNews', ['news'=>$rambler])-> with ('success', __('The news was successfully created!')));               

    //     }
    //     return (\back()->with('error', __('News creation error!')));
    }

    
}