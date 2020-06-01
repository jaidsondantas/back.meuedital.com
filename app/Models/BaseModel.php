<?php

namespace App\Models;

use App\Models\OthersModels\AliasModel;
use App\Models\Traits\RelationshipUserBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    public $aliasEntity;
    public $aliasEntityPlural;

    use SoftDeletes;
    use RelationshipUserBy;

    const POPULATEALL = [
        'createdBy', 'updatedBy', 'deletedBy'
    ];

    protected $dates = ['deleted_at'];

    /**
     * @return array
     */
    public static function getActionsDefault()
    {
        return [
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

    /**
     * @return mixed
     */
    public function getAliasEntityPlural()
    {
        return $this->aliasEntityPlural;
    }

    public function getStatusAttribute($value)
    {
        return $value == 1;
    }

}
