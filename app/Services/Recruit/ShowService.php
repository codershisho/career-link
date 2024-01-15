<?php

namespace App\Services\Recruit;

use App\Http\Resources\RecruitResource;
use App\Models\Recruit;

class ShowService
{
    public function show(int $id)
    {
        $data = Recruit::find($id);
        return new RecruitResource($data);
    }
}
