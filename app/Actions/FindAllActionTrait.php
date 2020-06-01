<?php

namespace App\Actions;

use App\Models\BaseModel;
use App\Services\Traits\DataProcessingTrait;
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;
use function count;

trait FindAllActionTrait
{

    public function findAll(BaseModel $model, $request, $alias = null)
    {
        $parameters = $this->getParameters($request, $model);

        $keyOrder = $this->getKeyOrder($parameters->order);

        $data = $model::when($parameters->where, function ($query) use ($parameters) {
            $andWhere = $parameters->where['and'];
            $orWhere = $parameters->where['or'];
            $this->createAndWhere($andWhere, $query);
            $this->createOrWhere($orWhere, $query);
        })
            ->with($parameters->populate)
            ->orderBy($keyOrder, $parameters->order[$keyOrder])
            ->paginate($parameters->per_page);

        if (count($data) > 0) {
            return $this->responseFindAll($data);
        } else {
            return $this->responseNotFoundAll($data, $alias, 400);
        }
    }

}
