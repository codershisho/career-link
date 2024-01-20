<?php

namespace App\Services\Result;

use App\Models\PhaseUser;

class UpdatePhaseUserService
{
    /**
     * 応募者の各フェーズに対応する評価者の評価登録
     *
     * @param array $params
     * @return void
     */
    public function store($recruitId, array $params)
    {
        $phaseUserId = $params['phase_user_id'];

        PhaseUser::updateOrCreate(
            [
                'id' => $phaseUserId
            ],
            [
                'assessment_id' => $params['assessment_id'],
                'comments' => $params['comment'],
            ]
        );
    }
}
