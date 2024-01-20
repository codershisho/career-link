<?php

namespace App\Services\Result;

use App\Http\Resources\PhaseResultResource;
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
            'phase_users.assessment'
        ]);

        $data = $query->get();

        return ResultPhaseUserResource::collection($data);
        // return $data;
    }

    /**
     * 応募者のフェーズ毎の結果を検索
     *
     * @param [type] $recruitId
     * @return void
     */
    public function searchPhaseResults($recruitId)
    {
        $query = Phase::query();
        $query = $query->with([
            'phase_result' => function ($q) use ($recruitId) {
                $q->where('recruit_id', $recruitId);
            }
        ]);
        $data = $query->get();

        // return $data;
        return PhaseResultResource::collection($data);
    }
}
