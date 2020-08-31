<?php

namespace App\Actions;


use App\Models\BaseModel;
use App\Models\OthersModels\AliasModel;

trait DeleteMultipleActionTrait
{
    public function deleteMultiple($request, BaseModel $model, AliasModel $alias)
    {
        $parameters = $this->getParameters($request, $model);

        if (array_key_exists('id', $parameters->where['and'])) {
            $ids = explode(',', $parameters->where['and']['id']);
            $model::whereIn('id', $ids)->update(['deletedBy' => auth()->user()->id]);
            $model::destroy($ids);
        } else {
            $data = $model::when($parameters->where, function ($query) use ($parameters) {
                $andWhere = $parameters->where['and'];
                $orWhere = $parameters->where['or'];
                $this->createAndWhere($andWhere, $query);
                $this->createOrWhere($orWhere, $query);
            })->first();

            if ($data) {
                $data->deletedBy = auth()->user()->id;
                $data->save();
                $model::destroy($data->id);
            }
        }

        return $this->responseDeleteMultiple($alias);
    }
}
