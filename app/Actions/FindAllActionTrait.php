<?php

namespace App\Actions;

use App\Services\DataProcessingService;
use function count;
use function response;

trait FindAllActionTrait
{
    public function findAll($model, $request, $aliasEntity = '')
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
            $data = DataProcessingService::responseFindAll($data);
            return response()->json([
                $data
            ], 200
            );
        } else {
            return response()->json([$aliasEntity . ' Não encontrada'], 404);
        }
    }

}
