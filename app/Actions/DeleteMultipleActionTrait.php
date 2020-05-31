<?php

namespace App\Actions;


trait DeleteMultipleActionTrait
{
    public function deleteMultiple($request, $model, $aliasEntity = 'Entidade')
    {
        $parameters = $this->getParameters($request, $model);

        $ids = explode(',', $parameters->where['and']['id']);
        $model::whereIn('id', $ids)->update(['deleted_by' => auth()->user()->id]);
        $model::destroy($ids);

        return response()->json([
            "message" => "$aliasEntity deletados(as) com sucesso.",
        ], 200);
    }
}
