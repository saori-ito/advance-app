<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Time;
use App\Models\Rest;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
{
    /**
     * モデルと対応するファクトリの名前
     *
     * @var string
     */
    protected $model = Rest::class;

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
            'time_id' => Time::factory(),
            'date' => $scheduledDate->format('Y-m-d H:i:s'),
            'break_start' => $scheduledDate->modify('+4hour')->format('Y-m-d H:i:s'),
            'break_end' => $scheduledDate->modify('+5hour')->format('Y-m-d H:i:s'),
        ];
    }
}
