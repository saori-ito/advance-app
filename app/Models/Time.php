<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    /**
     * 複数代入不可能な属性
     *
     * @var array
     */
    protected $guarded = [];

    /**
     *　 ユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *　勤怠の休憩を取得
     */
    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    /**
     * 勤務時間
     *
     */
    public function getWorkingHourAttribute()
    {
        $punchIn = Carbon::parse($this->punch_in);
        $punchOut = Carbon::parse($this->punch_out);
        return $punchIn->diffInHours($punchOut);
    }
}
