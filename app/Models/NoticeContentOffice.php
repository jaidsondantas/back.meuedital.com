<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeContentOffice extends BaseModel
{
    const ALIAS = ['Item por cargo', 'Itens por cargos'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['content', 'office']);
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
            'notice_content_id' => ['required'],
            'office_id' => ['required'],
        ];
    }

    public function content()
    {
        return $this->belongsTo(Content::class, 'notice_content_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
