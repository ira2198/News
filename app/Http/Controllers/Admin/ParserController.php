<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RamblerNews;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $url = "https://news.rambler.ru/rss/tech/";

        $parser->setLink($url)->saveParseData();


        $news = $parser->saveParseData();

        foreach ($news['news'] as $item){

            $item['pub_date']=$item['pubDate'];
            unset($item['pubDate']);

        //    dd($item);
            $rambler = RamblerNews::create($item);
        }

        if ($rambler){ 
            return (\redirect()->route('index')-> with ('success', __('The news was successfully created!')));               

        }
        return (\back()->with('error', __('News creation error!')));
    }

    
}