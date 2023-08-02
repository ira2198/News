<?php

namespace App\Http\Controllers\ForEveryone;

use App\Http\Controllers\Controller;
use App\Queries\RamblerNewsQueryBuilder;
use App\Services\Contracts\ExchangeRates;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(
        Request $request, 
        ExchangeRates $currencies, 
        RamblerNewsQueryBuilder $ramblerNewsQueryBuilder
        ): View
    {
        $url = "https://www.cbr-xml-daily.ru/daily_utf8.xml";

        $currencies->setLink($url)->saveParseData();
        $json = json_encode($currencies->saveParseData());
        $currencies=json_decode($json, true);
       
        
        return view('general.index', [
            'ramblerNews'=> $ramblerNewsQueryBuilder->getAll(),
            'currencies'=> $currencies,
        ]);
    
    }
   
    

}