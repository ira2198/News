<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface Parser
{

    /**
     * @param string $link
     * @return self
     */
    public function setLink(string $link): self;

    /**
     * @return void
     */
    public function saveParseData();

}