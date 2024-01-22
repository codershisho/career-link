<?php

namespace App\Services\Recruit;

use App\Http\Resources\RecruitResource;
use App\Models\Recruit;

class SearchService
{
    public function search(array $params)
    {
        $query = Recruit::query();
        $data = $query->paginate(50);

        return RecruitResource::collection($data)->response()->getData(true);
    }
}
