<?php

namespace App\Services\Result;

use App\Models\Recruit;
use Illuminate\Support\Facades\DB;

class UploadImageService
{
    /**
     * 応募者の画像更新
     *
     * @param array $params
     * @return void
     */
    public function upload($recruitId, array $params)
    {
        try {
            DB::beginTransaction();

            $fileName = request()->file->getClientOriginalName();
            request()->file->storeAs('public/recruits/' . $recruitId, $fileName);
            $filePath = '/storage/recruits/' . $recruitId . '/' . $fileName;

            $m = Recruit::findOrFail($recruitId);
            $m->image = $filePath;
            $m->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
