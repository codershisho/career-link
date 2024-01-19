<?php

namespace App\Http\Controllers\Api;

use App\Models\Assessment;

/**
 * 評価マスタAPI
 */
class AssessmentApi extends AbstractApi
{
    /**
     * マスター一覧
     *
     * @return void
     */
    public function index()
    {
        $data = Assessment::all();
        return $this->setResponse($data);
    }

    /**
     * マスター1件
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $data = Assessment::find($id);
        return $this->setResponse($data);
    }
}
