<?php

namespace App\Http\Controllers\Api;

use App\Services\Result\SearchService;
use App\Services\Result\StorePhaseUserService;
use Illuminate\Http\Request;

class ResultApi extends AbstractApi
{
    /**
     * 結果一覧検索
     *
     * @param Request $request
     * @param SearchService $service
     * @return void
     */
    public function search($id, Request $request, SearchService $service)
    {
        $data = $service->search($id, $request->all());
        return $data;
    }

    /**
     * 選考担当者の登録
     *
     * @param [type] $id
     * @param Request $request
     * @return void
     */
    public function storeUsers($id, Request $request, StorePhaseUserService $service)
    {
        logger($id);
        logger($request->all());

        $service->store($id, $request->all());
        return response()->json(['message' => '評価者の登録完了']);
    }
}
