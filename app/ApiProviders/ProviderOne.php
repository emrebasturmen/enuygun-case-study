<?php

namespace App\ApiProviders;

use App\Interfaces\ProviderOneInterface;
use App\Services\TaskService;
use Illuminate\Support\Facades\Http;

class ProviderOne implements ProviderOneInterface
{
    const URL = 'http://www.mocky.io/v2/5d47f24c330000623fa3ebfa';
    const NAME = 'Provider One';

    private TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function fetch()
    {
        return Http::get(self::URL);
    }

    public function insert()
    {
        $response = $this->fetch()->object();

        foreach ($response as $data)
            $this->taskService->store([
                'name' => $data->id,
                'duration' => $data->sure,
                'difficulty' => $data->zorluk,
                'provider' => self::NAME
            ]);
    }
}
