<?php


namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface ExchangeRates
{

    /**
     * @param string $link
     * @return self
     */
    public function setLink(string $link): self;

    /**
     * @return void
     */
    public function saveParseData(): Collection;

}