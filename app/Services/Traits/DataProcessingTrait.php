<?php

namespace App\Services\Traits;


use App\Actions\Models\ResponseModel;
use App\Models\OthersModels\AliasModel;

trait DataProcessingTrait
{
    public function responseFindAll($data)
    {
        $response = new ResponseModel();

        $response->entity = [
            $data->first()->getTable() => $data->items()
        ];
        $response->currentPage = $data->currentPage();
        $response->perPpage = $data->perPage();
        $response->total = $data->total();

        return response()->json($response, 200);
    }

    public function responseNotFoundAll($data, AliasModel $alias, int $code)
    {
        $response = new ResponseModel();

        $finishVerb = $this->finishVerb($alias->article);
        $response->entity = [];
        $response->message = $alias->name->singular . " não encontrad$finishVerb";
        $response->currentPage = $data->currentPage();
        $response->perPpage = $data->perPage();
        $response->total = $data->total();

        return response()->json($response, $code);
    }

    public function responseNotFoundId(AliasModel $alias, int $code)
    {
        $response = new ResponseModel();

        $finishVerb = $this->finishVerb($alias->article);
        $response->entity = [];
        $response->message = $alias->name->singular . " não encontrad$finishVerb";

        return response()->json($response, $code);
    }

    public function responseFindId($data)
    {
        $response = new ResponseModel();
        $response->entity = [
            $data->first()->getTable() => $data
        ];

        return response()->json($response, 200);
    }

    public function responseDelete($data, $alias)
    {
        $finishVerb = $this->finishVerb($alias->article);

        $response = new ResponseModel();
        $response->entity = $data->getData()->entity;
        $response->message = $alias->name->singular . " foi delet$finishVerb com sucesso.";

        return response()->json($response, 200);
    }

    public function finishVerb($article)
    {
        $finishVerb = '';
        if ($article == 'M') {
            $finishVerb = 'o';
        } else {
            $finishVerb = 'a';
        }
        return $finishVerb;
    }

}
