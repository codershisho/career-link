<?php

namespace App\Http\Controllers\Api;

use App\Models\Phase;

/**
 * フェーズマスタAPI
 */
class PhaseApi extends AbstractApi
{
    /**
     * マスター一覧
     *
     * @return void
     */
    public function index()
    {
        $data = Phase::all();
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
        $data = Phase::find($id);
        return $this->setResponse($data);
    }
}
