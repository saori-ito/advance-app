<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rest extends Model
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
     *　勤怠を取得
     */
    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    /**
     * 休憩時間
     *
     */
    public function getBreakHourAttribute()

    {
        $breakStart = Carbon::parse($this->break_start);
        $breakEnd = Carbon::parse($this->break_end);
        return $breakStart->diffInHours($breakEnd);
    }

}
