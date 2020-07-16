<?php

namespace App\Models;

class MyContentPublicNotice extends BaseModel
{
    const ALIAS = ['Meu Item de Edital', 'Meus Itens do edital'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setPopulate(['candidate', 'content', 'office', 'categoryContent', 'typeKnowledge']);
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

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function categoryContent()
    {
        return $this->belongsTo(CategoryContent::class);
    }

    public function typeKnowledge()
    {
        return $this->belongsTo(TypeKnowledge::class);
    }
}
