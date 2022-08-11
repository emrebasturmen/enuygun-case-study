<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    /**
     * Guarded columns.
     *
     * @var string[]
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Fillable columns.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'hourly_capacity',
        'weekly_capacity'
    ];

    /**
     * @param $value
     * @return void
     */
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = $value;
    }

    /**
     * @return mixed
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    /**
     * @param $value
     * @return void
     */
    public function setHourlyCapacityAttribute($value): void
    {
        $this->attributes['hourly_capacity'] = $value;
    }

    /**
     * @return mixed
     */
    public function getHourly(): mixed
    {
        return $this->hourly_capacity;
    }

    /**
     * @param $value
     * @return void
     */
    public function setWeeklyCapacityAttribute($value): void
    {
        $this->attributes['weekly_capacity'] = $value;
    }

    /**
     * @return mixed
     */
    public function getWeeklyCapacity(): mixed
    {
        return $this->weekly_capacity;
    }
}
