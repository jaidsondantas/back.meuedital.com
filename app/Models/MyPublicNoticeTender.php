<?php

namespace App\Models;

class MyPublicNoticeTender extends BaseModel
{
    const ALIAS = ['Meu Edital', 'Meu Editais'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['office']);
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
        ];
    }
    public function office()
    {
        return $this->belongsTo(Office::class);
    }


}
