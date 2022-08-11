<?php

namespace App\ApiProviders;

use App\Interfaces\ProviderTwoInterface;
use Illuminate\Support\Facades\Http;

class ProviderTwo implements ProviderTwoInterface
{
    const URL = 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7';
    const NAME = 'Provider Two';


    public function fetch()
    {
        return Http::get(self::URL);
    }

    public function insert()
    {
        $response = $this->fetch()->object();
    }
}
