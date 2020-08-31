<?php

namespace App\Models;

use App\User;
use Illuminate\Validation\Rule;

class Content extends BaseModel
{
    const ALIAS = ['Conteúdo', 'Conteúdos'];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['categoryContent', 'createdBy']);
    }

    /**
     * @return array
     */
    public function getFillable(): array
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getRules($id = 0)
    {
        return [
            'name' => ['required', 'string'],
            'categoryContent' => ['required'],
        ];
    }

    public function categoryContent()
    {
        return $this->belongsTo(CategoryContent::class, 'categoryContent');
    }


}
