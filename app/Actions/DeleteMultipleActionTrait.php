<?php

namespace App\Actions;


use App\Models\OthersModels\AliasModel;

trait DeleteMultipleActionTrait
{
    public function deleteMultiple($request, $model, AliasModel $alias)
    {
        $parameters = $this->getParameters($request, $model);

        $ids = explode(',', $parameters->where['and']['id']);
        $model::whereIn('id', $ids)->update(['deleted_by' => auth()->user()->id]);
        $model::destroy($ids);

        return $this->responseDeleteMultiple($alias);
    }
}
