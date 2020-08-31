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

        $publicTenderNotice = new PublicTenderNotice();

        $this->setPopulate(['office' => function ($query) {
            $query->with($this::POPULATE_DEFAULT);
        },
            'publicTenderNotice' => function ($query) use ($publicTenderNotice) {
                $query->with($publicTenderNotice->getPopulate());
            }]);
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
            'publicTenderNotice' => ['required'],
            'office' => ['required'],
        ];
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office');
    }

    public function publicTenderNotice()
    {
        return $this->belongsTo(PublicTenderNotice::class, 'publicTenderNotice');
    }
}
