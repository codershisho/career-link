<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    /**
     * 編集
     *
     * @return void
     */
    public function upsert(Request $request)
    {
        logger($request->all());

        try {
            DB::beginTransaction();

            // 画像は後続で更新
            $data = $request->all();
            $upsert = [
                ['id' => $data['id'], 'email' => 'a@example.com', "password" => 'hogehoge', 'name' => $data['name'], 'is_checker' => $data['is_checker']]
            ];
            User::upsert($upsert, ['id'], ['name', 'is_checker']);

            // 画像がある場合は更新
            if (request()->hasFile('image') && request()->file('image')->isValid()) {
                $fileName = request()->image->getClientOriginalName();
                request()->image->storeAs('public/users/', $fileName);
                $filePath = '/storage/users/' . $fileName;

                $user = User::find($data['id']);
                $user->image = $filePath;
                $user->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
