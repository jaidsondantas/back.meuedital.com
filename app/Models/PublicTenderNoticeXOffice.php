<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicTenderNoticeXOffice extends BaseModel
{
    protected $table = 'public_tender_notice_x_offices';

    const ALIAS = ['Cargos do Edital', 'Cargos dos Editais'];

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

    public function getRules()
    {
        return [
            'public_tender_notice_id' => ['required'],
            'office_id' => ['required'],
        ];
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
