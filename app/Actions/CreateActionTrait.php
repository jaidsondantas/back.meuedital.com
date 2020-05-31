<?php

namespace App\Actions;


use Illuminate\Support\Facades\Validator;

trait CreateActionTrait
{
    public function create($model, $request, $aliasEntity = 'Entidade', $bodyRequest = null)
    {
        $bodyRequest = $bodyRequest == null ? $request : $bodyRequest;


        $validator = Validator::make($bodyRequest->all(), $model::getRules(), $this->getArrayMessagesValidate());
        if ($validator->fails()) {
            return response()->json(['message' => $validator->getMessageBag()], 400);
        }

        $entity = new $model();
        foreach ($bodyRequest->all() as $key => $r) {
            if ($key != 'populate') {
                $entity->$key = $r;
            }
        }

        $entity->created_by = auth()->user()->id;
        $entity->save();
        $entity = $this->findId($entity->id, $model, $request, $aliasEntity);

        return response()->json([
            "message" => "$aliasEntity criado(a) com sucesso.",
            "entity" => [
                $entity->getOriginalContent()->all()[0]->getTable() => $entity->getData()
            ]
        ], 201);
    }
}
