<?php

namespace App\Services\Result;

use App\Http\Resources\ResultPhaseUserResource;
use App\Models\Phase;
use App\Models\PhaseResult;

class SearchService
{
    /**
     * 応募者の各フェーズに対応する評価者の評価情報を検索
     *
     * @param array $params
     * @return void
     */
    public function search($id, array $params)
    {
        $query = Phase::query();
        $query = $query->with([
            'phase_users' => function ($q) use ($id) {
                $q->where('recruit_id', $id);
            },
            'phase_users.user',
            'phase_users.result.assessment'
        ]);

        $data = $query->get();

        return ResultPhaseUserResource::collection($data);
    }
}
