<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Task;
use App\Schedule\TaskSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * @var TaskSchedule
     */
    private TaskSchedule $taskSchedule;

    /**
     * Constructor.
     *
     * @param TaskSchedule $taskSchedule
     */
    public function __construct(TaskSchedule $taskSchedule)
    {
        $this->taskSchedule = $taskSchedule;
    }

    /**
     * @return void
     */
    public function index()
    {
        $developers = Developer::orderBy('hourly_capacity','ASC')->get()->toArray();
        $tasks = Task::select('name',DB::raw('duration * difficulty as duration'), DB::raw('1 as difficulty'))->orderBy('duration','ASC')->get()->toArray();
        $planning = $this->taskSchedule->schedule($tasks, $developers);

        dd($planning);
    }
}
