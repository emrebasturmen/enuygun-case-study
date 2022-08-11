<?php

namespace App\ApiProviders;

use App\Interfaces\ProviderOneInterface;
use Illuminate\Support\Facades\Http;

class ProviderOne implements ProviderOneInterface
{
    const URL = 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa';
    const NAME = 'Provider One';


    public function fetch()
    {
        return Http::get(self::URL);
    }

    public function insert()
    {
        $response = $this->fetch()->object();
    }
}
