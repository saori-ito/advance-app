<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Time;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimeFactory extends Factory
{
    /**
     * モデルと対応するファクトリの名前
     *
     * @var string
     */
    protected $model = Time::class;

    /**
     * モデルのデフォルト状態の定義
     *
     * @return array
     */
    public function definition()
    {
        $scheduledDate = $this->faker->dateTimeBetween('-1year', '-1day');
        return [
            'user_id' => User::factory(),
            'date' => $scheduledDate->format('Y-m-d H:i:s'),
            'punch_in' => $scheduledDate->modify('+1hour')->format('Y-m-d H:i:s'),
            'punch_out' => $scheduledDate->modify('+9hour')->format('Y-m-d H:i:s'),
        ];
    }
}
