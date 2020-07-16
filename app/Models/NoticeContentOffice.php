<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeContentOffice extends BaseModel
{
    const ALIAS = ['Item por cargo', 'Itens por cargos'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['content', 'office', 'noticeContent']);
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

    public static function getAliasJoin(){
        return [
            'c.name as contentName',
            'c.id as contentId',
            'ptn.id as public_tender_notice_id',
            'ptn.name as public_tender_name',
            'notice_content_offices.office_id as office_id',
            'c.category_content_id as category_content_id',
            'nc.type_knowledge_id as type_knowledge_id',
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

    public function noticeContent()
    {
        return $this->belongsTo(NoticeContent::class);
    }

}
