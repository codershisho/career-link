<?php

namespace App\Http\Controllers\Api;

use App\Services\Recruit\SearchService;
use Illuminate\Http\Request;

class RecruitApi extends AbstractApi
{
    public function search(Request $request, SearchService $service)
    {
        $data = $service->search($request->all());
        return $this->setResponseOfPage($data, '検索完了');
    }
}
