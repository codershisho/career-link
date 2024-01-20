<?php

namespace App\Services\Result;

use App\Models\PhaseResult;

class StorePhaseResultService
{
    /**
     * 応募者のフェーズ毎の結果を検索
     *
     * @param [type] $recruitId
     * @param array $params
     * @return void
     */
    public function store($recruitId, array $params)
    {
        $phaseResultId = $params['phase_result_id'];

        PhaseResult::updateOrCreate(
            [
                'id' => $phaseResultId
            ],
            [
                'recruit_id' => $recruitId,
                'phase_id' => $params['phase_id'],
                'assessment_id' => $params['assessment_id'],
                'result_flg' => $params['result_flg'],
                'review_comment' => $params['review_comment'],
                'memo' => $params['memo'],
            ]
        );
    }
}
