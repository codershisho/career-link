<?php

namespace App\Http\Controllers\Api;

use App\Models\Schedule;

/**
 * カレンダーAPI
 */
class Calendar extends AbstractApi
{
    public function search()
    {
        $query = Schedule::query();
        $query->with(['recruit', 'phase']);

        $schedules = $query->get();

        logger($schedules);

        $data = $schedules->map(function ($schedule) {
            $phaseName = $schedule->phase->name;
            $recruitName = $schedule->recruit->name;
            $title = "【{$phaseName}】{$recruitName}";
            return [
                'id' => $schedule['id'],
                'start' => $schedule['start_datetime'],
                'end' => $schedule['end_datetime'],
                'title' => $title,
                'backgroundColor' => '#3F51B5',
                'borderColor' => '#3F51B5',
                'textColor' => 'white',
            ];
        });
        return $this->setResponse($data);
    }
}
