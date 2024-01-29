<?php

namespace App\Services\Result;

use App\Models\PhaseUser;

class StorePhaseUserService
{
    /**
     * 応募者の各フェーズに対応する評価者の登録
     *
     * @param array $params
     * @return void
     */
    public function store($recruitId, array $params)
    {
        $phaseId = $params['phase_id'];
        $ids = collect($params['ids']);

        if ($ids->isEmpty()) {
            return;
        }

        $ids->each(function ($userId) use ($recruitId, $phaseId) {
            $query = PhaseUser::query();
            $m = $query->where('recruit_id', $recruitId)
                ->where('phase_id', $phaseId)
                ->where('user_id', $userId)
                ->first();

            if (!isset($m)) {
                $m = PhaseUser::create([
                    'recruit_id' => $recruitId,
                    'phase_id' => $phaseId,
                    'user_id' => $userId,
                    'assessment_id' => 1,
                    'reason_id' => 1,
                ]);
            }
        });
    }
}
