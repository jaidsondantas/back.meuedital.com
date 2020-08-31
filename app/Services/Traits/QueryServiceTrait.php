<?php

namespace App\Services\Traits;

use App\Services\QueryService;
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
        foreach (QueryService::OPERATORS as $key => $o) {
            if ($key == $operator) {
                $finalOperator = $o;
            }
        }
        return $finalOperator;
    }

    public function createAndWhere($andWhere, $query)
    {
        while (current($andWhere)) {
            $operatorAndValue = collect(explode(":", current($andWhere)));
            $operator = $operatorAndValue->first();
            $value = $operatorAndValue->last();
            $operator = $this->toCompareOperator($operator);
            if (!$this->isWhereChild(key($andWhere))) {
                if ($operator == 'in') {
                    $value = explode(',', $value);
                    $query->whereIn(key($andWhere), $value);
                } else {
                    $query->where(key($andWhere), $operator, $value);
                }
            } else {
                $whereChild = collect(explode('.', key($andWhere)));
                $tableName = $whereChild->first();
                $columnName = $whereChild->last();
                $value = explode(',', $value);
                $query->whereHas($tableName, function ($query) use ($columnName, $value, $operator, $whereChild) {
                    if ($whereChild[1] != $columnName) {
                        $query->whereHas($whereChild[1], function ($query) use ($value, $columnName, $operator) {
                            if ($operator == 'in') {
                                $query->whereIn($columnName, $value);
                            } else {
                                $query->where($columnName, $operator, $value);

                            }
                        });
                    } else {
                        if ($operator == 'in') {
                            $query->whereIn($columnName, $value);
                        } else {
                            $query->where($columnName, $operator, $value);

                        }
                    }
                });
            }
            next($andWhere);
        }
        return $query;
    }

    public function createOrWhere($orWhere, $query)
    {
        while (current($orWhere)) {
            if (!$this->isWhereChild(key($orWhere))) {
                $operatorAndValue = collect(explode(":", current($orWhere)));
                $operator = $operatorAndValue->first();
                $value = $operatorAndValue->last();
                $operator = $this->toCompareOperator($operator);
                $query->orWhere(key($orWhere), $operator, $value);
            }
            next($orWhere);
        }
        return $query;
    }

    public function isWhereChild($param)
    {
        $whereChild = explode('.', $param);
        return count($whereChild) > 1;
    }
}
