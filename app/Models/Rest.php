<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rest extends Model
{
    use HasFactory;

    /**
     *　勤怠を取得
     */
    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    /**
     * 勤務時間
     *
     */
    public function getWorkingHourAttribute()
    {
        $punchIn = Carbon::parse($this->punch_in);
        $punchOut = Carbon::parse($this->punch_out);
        return $punchOut->diffInHours($punchIn);
    }

}
