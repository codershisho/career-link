<?php

namespace App\Services\Schedule;

use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class StoreService
{
    public function store($recruitId, array $params)
    {
        Schedule::updateOrCreate(
            [
                'id' => $params['schedule_id']
            ],
            [
                'recruit_id' => $recruitId,
                'id' => $params['schedule_id'],
                'phase_id' => $params['phase_id'],
                'start_datetime' => $params['start_datetime'],
                'end_datetime' => $params['end_datetime'],
                'description' => $params['description'],
            ]
        );
    }
}
