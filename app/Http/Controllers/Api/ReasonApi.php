<?php

namespace App\Http\Controllers\Api;

use App\Models\Reason;

/**
 * 理由マスタAPI
 */
class ReasonApi extends AbstractApi
{
    /**
     * マスター一覧
     *
     * @return void
     */
    public function index()
    {
        $data = Reason::all();
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
        $data = Reason::find($id);
        return $this->setResponse($data);
    }
}
