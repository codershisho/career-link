<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

/**
 * ユーザーAPI
 */
class UserApi extends AbstractApi
{
    /**
     * マスター一覧
     *
     * @return void
     */
    public function index()
    {
        $data = User::all();
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
        $data = User::find($id);
        return $this->setResponse($data);
    }
}
