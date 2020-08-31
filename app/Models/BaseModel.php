<?php

namespace App\Models;

use App\Models\OthersModels\AliasModel;
use App\Models\Traits\RelationshipUserBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;

class BaseModel extends Model
{
    private $populate;

    use SoftDeletes;
    use RelationshipUserBy;

    const POPULATE_DEFAULT = [
            'createdBy', 'updatedBy', 'deletedBy'
        ];



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

    protected $dates = ['deletedAt'];

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

    public function getAttribute($key)
    {

        if (array_key_exists($key, $this->relations)
            || method_exists($this, $key)
        )
        {
            return parent::getAttribute($key);
        }
        else
        {
            return parent::getAttribute(camel_case($key));
        }
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute(camel_case($key), $value);
    }

    public static $snakeAttributes = false;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'createdAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';

    const DELETED_AT = 'deletedAt';



}
