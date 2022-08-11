<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
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
        'difficulty',
        'duration',
        'provider'
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
    public function getNameAttribute(): mixed
    {
        return $this->name;
    }

    /**
     * @param $value
     * @return void
     */
    public function setDifficultyAttribute($value): void
    {
        $this->attributes['difficulty'] = $value;
    }

    /**
     * @return mixed
     */
    public function getDifficultyAttribute(): mixed
    {
        return $this->difficulty;
    }

    /**
     * @param $value
     * @return void
     */
    public function setDurationAttribute($value): void
    {
        $this->attributes['duration'] = $value;
    }

    /**
     * @return mixed
     */
    public function getDurationAttribute(): mixed
    {
        return $this->duration;
    }
}
