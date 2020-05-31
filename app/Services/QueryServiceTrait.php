<?php

namespace App\Services;

use App\Services\Models\QueryServiceModel;
use function collect;
use function current;
use function dd;
use function explode;
use function key;
use function next;

trait QueryServiceTrait
{


    public function getKeyOrder($order)
    {
        $keyOrder = null;
        foreach ($order as $key => $o) {
            $keyOrder = $key;
        }
        return $keyOrder;
    }

    public function toCompareOperator($operator)
    {
        $finalOperator = null;
        foreach (QueryServiceModel::OPERATORS as $key => $o) {
            if ($key == $operator) {
                $finalOperator = $o;
            }
        }
        return $finalOperator;
    }

    public function createAndWhere($andWhere, $query){
        while (current($andWhere)) {
            $operatorAndValue = collect(explode(":", current($andWhere)));
            $operator = $operatorAndValue->first();
            $value = $operatorAndValue->last();
            $operator = $this->toCompareOperator($operator);
            $query->where(key($andWhere), $operator, $value);
            next($andWhere);
        }
        return $query;
    }

    public function createOrWhere($orWhere, $query) {
        while (current($orWhere)) {
            $operatorAndValue = collect(explode(":", current($orWhere)));
            $operator = $operatorAndValue->first();
            $value = $operatorAndValue->last();
            $operator = $this->toCompareOperator($operator);
            $query->orWhere(key($orWhere), $operator, $value);
            next($orWhere);
        }
        return $query;
    }
}
