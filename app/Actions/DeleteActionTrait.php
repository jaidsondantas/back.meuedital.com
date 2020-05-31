<?php

namespace App\Actions;


use Illuminate\Support\Facades\Validator;

trait DeleteActionTrait
{
    public function delete($id, $model, $aliasEntity = 'Entidade')
    {
        $updateEntityDelete = $model::find($id);
        $updateEntityDelete->deleted_by = auth()->user()->id;
        $updateEntityDelete->save();
        $entity = $model::destroy($id);

        if ($entity) {
            return response()->json([
                "message" => "$aliasEntity deletado(a) com sucesso.",
                "entity" => $updateEntityDelete
            ], 200);
        }
    }
}
