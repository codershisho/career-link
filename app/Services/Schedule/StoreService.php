<?php

namespace App\Services\Schedule;

use App\Models\Schedule;
use Illuminate\Support\Facades\DB;

class StoreService
{
    public function store($id, array $params)
    {
        try {
            DB::beginTransaction();

            $m = new Schedule();
            $m->fill($params);
            $m->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return $m;
    }
}
