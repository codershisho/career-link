<?php

namespace App\Http\Controllers\Api;

use App\Models\Document;
use Illuminate\Http\Request;

/**
 * ドキュメントAPI
 */
class DocApi extends AbstractApi
{

    public function search($id)
    {
        $data = Document::where('recruit_id', $id)->get();
        return $this->setResponse($data);
    }

    /**
     * ファイルアップロード
     *
     * @return void
     */
    public function upload($id, Request $request)
    {
        Logger($request->all());
        $file_name = request()->file->getClientOriginalName();
        request()->file->storeAs('public/docs/' . $id, $file_name);
        $file_path = '/storage/docs/' . $id . '/' . $file_name;

        $model = Document::where('recruit_id', $id)->where('document_type', $request->type)->first();
        if ($model) {
            $model->file_path = $file_path;
        } else {
            $model = new Document();
            $model->recruit_id = $id;
            $model->document_type = $request->type;
            $model->file_path = $file_path;
        }
        $model->save();
    }
}
