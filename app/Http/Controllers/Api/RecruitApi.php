<?php

namespace App\Http\Controllers\Api;

use App\Services\Recruit\SearchService;
use App\Services\Recruit\ShowService;
use App\Services\Result\UploadImageService;
use Illuminate\Http\Request;

class RecruitApi extends AbstractApi
{
    /**
     * 一覧検索
     *
     * @param Request $request
     * @param SearchService $service
     * @return void
     */
    public function search(Request $request, SearchService $service)
    {
        $data = $service->search($request->all());
        return $this->setResponseOfPage($data, '検索完了');
    }

    /**
     * 応募者詳細検索
     *
     * @param [type] $id
     * @param ShowService $service
     * @return void
     */
    public function show($id, ShowService $service)
    {
        $data = $service->show($id);
        return $this->setResponse($data, '検索完了');
    }

    /**
     * 応募者の画像更新
     *
     * @param [type] $id
     * @param Request $request
     * @return void
     */
    public function uploadImage($id, Request $request, UploadImageService $service)
    {
        $service->upload($id, $request->all());
        return $this->setMessage('応募者の画像アップロード完了');
    }
}
