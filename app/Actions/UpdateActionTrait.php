<?php

namespace App\Actions;


use Illuminate\Support\Facades\Validator;

trait UpdateActionTrait
{
    public function update($id, $model, $request, $aliasEntity = 'Entidade', $bodyRequest = null)
    {
        $bodyRequest = $bodyRequest == null ? $request : $bodyRequest;

        $entity = $model::find($id);

        if (isset($entity)) {
            foreach ($bodyRequest->all() as $key => $r) {
                if ($key != 'populate') {
                    $entity->$key = $r;
                }
            }
        }

        $validator = Validator::make($entity->getAttributes(), $model::getRules($id), $this->getArrayMessagesValidate());
        if ($validator->fails()) {
            return response()->json(['message' => $validator->getMessageBag()], 400);
        }

        $entity->updated_by = $request->user()->id;
        $entity->save();
        $entity = $this->findId($entity->id, $model, $request, $aliasEntity);

        return response()->json([
            "message" => "$aliasEntity atualizado(a) com sucesso.",
            "entity" => $entity->getData()
        ], 201);
    }
}
