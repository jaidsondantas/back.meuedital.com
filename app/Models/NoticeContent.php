<?php

namespace App\Models;

class NoticeContent extends BaseModel
{
    const ALIAS = ['Item do Edital', 'Itens do edital'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['content', 'typeKnowledge', 'noticeContentOffices', 'publicTenderNotice']);
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
            'public_tender_notice_id' => ['required'],
            'content_id' => ['required'],
            'type_knowledge_id' => ['required'],
        ];
    }

    public function content()
    {
        return $this->belongsTo(Content::class, 'content');
    }

    public function typeKnowledge()
    {
        return $this->belongsTo(TypeKnowledge::class, 'id');
    }

    public function noticeContentOffices()
    {
        return $this->hasMany(NoticeContentOffice::class, 'id');
    }

    public function publicTenderNotice()
    {
        return $this->belongsTo(Content::class, 'content');
    }



}
