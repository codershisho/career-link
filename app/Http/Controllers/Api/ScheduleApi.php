<?php

namespace App\Http\Controllers\Api;

use App\Services\Schedule\SearchService;
use App\Services\Schedule\StoreService;
use Illuminate\Http\Request;

/**
 * 応募者毎のスケジュールAPI
 */
class ScheduleApi extends AbstractApi
{
    /**
     * 応募者IDに紐づくスケジュール検索
     *
     * @param [type] $id
     * @param Request $request
     * @param SearchService $service
     * @return void
     */
    public function search($id, Request $request, SearchService $service)
    {
        $data = $service->search($id, $request->all());
        return $this->setResponse($data);
    }

    /**
     * 応募者IDに紐づくスケジュール登録
     *
     * @param [type] $id
     * @param Request $request
     * @param StoreService $service
     * @return void
     */
    public function store($id, Request $request, StoreService $service)
    {
        $data = $service->store($id, $request->all());
        return $this->setResponse($data, 'スケジュール登録完了');
    }
}
