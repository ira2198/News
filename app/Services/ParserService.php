<?php


namespace App\Services;

use App\Services\Contracts\Parser;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade as FacadesFacade;
use Orchestra\Parser\Xml\Facade;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParseData(): array
    {
        $xml = Facade::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate]',              

            ],
        ]);

        return $data;
        //dd($data);
       
    }
}