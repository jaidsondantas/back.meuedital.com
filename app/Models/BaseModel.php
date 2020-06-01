<?php

namespace App\Models;

use App\Models\OthersModels\AliasModel;
use App\Models\Traits\RelationshipUserBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class BaseModel extends Model
{
    private $populate;

    use SoftDeletes;
    use RelationshipUserBy;

    const ROUTE_DEFAULT = [
        [
            "method" => "get",
            "action" => "find",
            "params" => ""
        ],
        [
            "method" => "get",
            "action" => "show",
            "params" => "{id}"
        ],
        [
            "method" => "post",
            "action" => "store",
            "params" => ""
        ],
        [
            "method" => "put",
            "action" => "updateEntity",
            "params" => "{id}"
        ],
        [
            "method" => "delete",
            "action" => "destroy",
            "params" => "{id}"
        ],
        [
            "method" => "delete",
            "action" => "destroyMultiple",
            "params" => ""
        ]
    ];

    protected $dates = ['deleted_at'];

    /**
     * @param array $actions
     * @return array
     */
    public static function getActions(array $actions = [])
    {
        if ($actions) {
            $acceptedActions = [];

            foreach (self::ROUTE_DEFAULT as $keyRoute => $routeDefault) {
                foreach ($routeDefault as $keyRouteDefault => $route) {
                    if ($keyRouteDefault === 'action') {
                        foreach ($actions as $action) {
                            if ($routeDefault['action'] == $action) {
                                array_push($acceptedActions, $routeDefault);
                            }
                        }
                    }
                }

            }
            return $acceptedActions;
        }

        return self::ROUTE_DEFAULT;

    }

    /**
     * @param $alias
     * @param $article
     * @return mixed
     */
    public static function getAliasEntity($alias, $article)
    {
        return new AliasModel($alias, $article);
    }


    public function getStatusAttribute($value)
    {
        return $value == 1;
    }


    /**
     * @return mixed
     */
    public function getPopulate()
    {
        return $this->populate;
    }

    /**
     * @param mixed $populate
     */
    public function setPopulate(array $populate): void
    {
        $this->populate = [
            'createdBy', 'updatedBy', 'deletedBy'
        ];
        $this->populate = array_merge($this->populate, $populate);
    }


}
