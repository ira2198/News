<?php


namespace App\Services;

use App\Services\Contracts\ExchangeRates;
use Illuminate\Support\Collection;
use Orchestra\Parser\Xml\Facade;

class ExchangeRatesService implements ExchangeRates
{
    private string $link;

    public function setLink(string $link): ExchangeRates
    {
        $this->link = $link;

        return $this;
    }


    public function saveParseData(): Collection
    {
        $xml = Facade::load($this->link);

        $currencies = collect($xml->parse([
            'values' => ['uses' => 'Valute[CharCode,Name,Value,Nominal]'],
        ]));

       return $currencies;
    }
}