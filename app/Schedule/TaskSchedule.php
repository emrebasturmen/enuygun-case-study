<?php

namespace App\Schedule;

class TaskSchedule
{
    /**
     * @param $totalDuration
     * @param $totalWeeklyCapacity
     * @return float
     */
    private function getTotalWeeks($totalDuration, $totalWeeklyCapacity): float
    {
        return ceil($totalDuration / $totalWeeklyCapacity);
    }

    /**
     * @param $tasks
     * @return int
     */
    private function getTotalDuration($tasks): int
    {
        $duration = 0;

        foreach ($tasks as $task)
            $duration += ($task['difficulty'] * $task['duration']);

        return $duration;
    }

    /**
     * @param $developers
     * @return int
     */
    private function getTotalWeeklyCapacity($developers): int
    {
        $weeklyCapacity = 0;

        foreach ($developers as $developer)
            $weeklyCapacity += $developer['weekly_capacity'];

        return $weeklyCapacity;
    }

    /**
     * @param array $tasks
     * @param array $developers
     * @return array
     */
    private function getWeeks(array $tasks, array $developers): array
    {
        $weeks = [];

        $totalDuration = $this->getTotalDuration($tasks);
        $totalWeeklyCapacity = $this->getTotalWeeklyCapacity($developers);
        $totalWeeks = $this->getTotalWeeks($totalDuration, $totalWeeklyCapacity);

        for ($i = 1; $i <= $totalWeeks; $i++) {
            $weeks[$i] = [];
        }

        return $weeks;
    }

    /**
     * @param array $all_task
     * @param int $limit
     * @return array
     */
    private function getTask(array &$all_task, int $limit): array
    {
        $assignedTasks = [];
        $totalDuration = 0;
        $residual = $limit;

        foreach ($all_task as $key => $task) {
            if ($residual > 0) {
                $taskDuration = $task['duration'];
                $originalTaskDuration = $taskDuration;
                $originalResidual = $residual;

                if ($residual < $taskDuration) {
                    $taskDuration = $residual;
                    $task['duration'] = $residual;
                }

                $assignedTasks[] = $task;
                $totalDuration += $taskDuration;
                $residual -= $taskDuration;

                if ($originalResidual < $originalTaskDuration)
                    $all_task[$key]['duration'] -= $residual;
                else
                    unset($all_task[$key]);
            }
        }

        return array('totalDuration' => $totalDuration, 'tasks' => $assignedTasks);
    }

    /**
     * @param $tasks
     * @param $developers
     * @return array
     */
    public function schedule(&$tasks, $developers): array
    {
        $weeks = $this->getWeeks($tasks, $developers);

        foreach ($weeks as &$week) {
            foreach ($developers as $developer) {
                $developerName = $developer['name'];
                $taskDetail = $this->getTask($tasks, $developer['weekly_capacity']);

                $week[$developerName]['total_capacity'] = $developer['weekly_capacity'];
                $week[$developerName]['total_duration'] = $taskDetail['total_duration'];
                $week[$developerName]['tasks'] = $taskDetail['tasks'];
            }
        }

        return $weeks;
    }
}
