<?php

namespace App\ApiProviders;

use App\Interfaces\ProviderTwoInterface;
use App\Services\TaskService;
use Illuminate\Support\Facades\Http;

class ProviderTwo implements ProviderTwoInterface
{
    const URL = 'http://www.mocky.io/v2/5d47f235330000623fa3ebf7';
    const NAME = 'Provider Two';

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
        $response = $this->fetch()->json();

        foreach ($response as $data) {
            $name = key($data);
            $this->taskService->store([
                'name' => $name,
                'duration' => $data[$name]['estimated_duration'],
                'difficulty' => $data[$name]['level'],
                'provider' => self::NAME
            ]);
        }
    }
}
