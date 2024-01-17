<?php

namespace App\Services\Schedule;

use App\Http\Resources\ScheduleResource;
use App\Models\Phase;
use App\Models\Schedule;

class SearchService
{
    /**
     * 応募者IDに紐づく各フェーズのスケジュール検索
     *
     * @param [type] $id
     * @param array $params
     * @return void
     */
    public function search($id, array $params)
    {
        $query = Phase::query();
        $query->with(['schedule' => function ($query) use ($id) {
            // 該当する応募者のみ
            $query->where('recruit_id', $id);
        }]);

        $data = $query->get();

        return ScheduleResource::collection($data);
    }
}
