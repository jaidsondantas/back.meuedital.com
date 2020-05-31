<?php

namespace App\Models;

use App\Models\Traits\RelationshipUserBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    use RelationshipUserBy;

    const POPULATEALL = [
        'createdBy', 'updatedBy', 'deletedBy'
    ];

    protected $dates = ['deleted_at'];

    const ALIAS_ENTITY = '';

    const ALIAS_ENTITY_PLURAL = '';


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
}
