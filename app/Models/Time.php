<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    /**
     *　勤怠の休憩を取得
     */
    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    /**
     * 休憩時間
     *
     */
    public function getBreakHourAttribute()
    {
        $breakIn = Carbon::parse($this->break_start);
        $breakOut = Carbon::parse($this->break_end);
        return $breakOut->diffInHours($breakIn);
    }
}
