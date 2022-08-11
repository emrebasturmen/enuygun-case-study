<?php

namespace Database\Seeders;

use App\Services\DeveloperService;
use Illuminate\Database\Seeder;

class DeveloperTableSeeder extends Seeder
{
    private DeveloperService $developerService;

    public function __construct(DeveloperService $developerService)
    {
        $this->developerService = $developerService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developers = [
            [
                'name' => 'DEV1',
                'hourly_capacity' => 1,
                'weekly_capacity' => 45
            ],
            [
                'name' => 'DEV2',
                'hourly_capacity' => 2,
                'weekly_capacity' => 90
            ],
            [
                'name' => 'DEV3',
                'hourly_capacity' => 3,
                'weekly_capacity' => 135
            ],
            [
                'name' => 'DEV4',
                'hourly_capacity' => 4,
                'weekly_capacity' => 180
            ],
            [
                'name' => 'DEV5',
                'hourly_capacity' => 5,
                'weekly_capacity' => 225
            ],
        ];

        foreach ($developers as $developer) {
            $this->developerService->store($developer);
        }
    }
}
