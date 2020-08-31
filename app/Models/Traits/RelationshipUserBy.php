<?php

namespace App\Models\Traits;


trait RelationshipUserBy
{
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'createdBy');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updatedBy');
    }

    public function deletedBy()
    {
        return $this->belongsTo('App\User', 'deletedBy');
    }

}
