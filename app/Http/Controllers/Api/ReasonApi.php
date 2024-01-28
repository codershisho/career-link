<?php

namespace App\Http\Controllers\Api;

use App\Models\Reason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * マスタのupsert
     *
     * @param Request $request
     * @return void
     */
    public function upsert(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();
            $data = [
                ['id' => $data['id'], 'name' => $data['name']]
            ];

            Reason::upsert($data, ['id'], ['name']);

            DB::commit();
            return $this->setMessage("理由マスタの編集しました");
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
