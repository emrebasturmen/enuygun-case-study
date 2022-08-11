<?php

namespace App\Interfaces;

interface ScheduleInterface
{
    public function schedule(&$tasks, $developers): array;
}
