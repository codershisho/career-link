<?php

namespace App\Http\Controllers\Api;

use App\Services\Result\SearchService;
use App\Services\Result\StorePhaseResultService;
use App\Services\Result\StorePhaseUserService;
use App\Services\Result\UpdatePhaseUserService;
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
        $service->store($id, $request->all());
        return response()->json(['message' => '評価者の登録完了']);
    }

    /**
     * 選考担当者の評価情報登録
     *
     * @param [type] $id
     * @param Request $request
     * @param UpdatePhaseUserService $service
     * @return void
     */
    public function storeResultPhaseUser($id, Request $request, UpdatePhaseUserService $service)
    {
        $service->store($id, $request->all());
        return response()->json(['message' => '評価者の登録完了']);
    }

    /**
     * 応募者のフェーズ毎の結果を検索
     *
     * @param [type] $id
     * @param SearchService $service
     * @return void
     */
    public function searchPhaseResults($id, SearchService $service)
    {
        $data = $service->searchPhaseResults($id);
        return $this->setResponse($data);
    }

    /**
     * 応募者のフェーズ毎の結果を登録
     *
     * @param [type] $id
     * @param [type] $service
     * @return void
     */
    public function storePhaseResult($id, Request $request, StorePhaseResultService $service)
    {
        $service->store($id, $request->all());
        return response()->json(['message' => '評価者の登録完了']);
    }
}
