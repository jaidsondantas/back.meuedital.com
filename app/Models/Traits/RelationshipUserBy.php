<?php

namespace App\Models\Traits;


trait RelationshipUserBy
{
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo('App\User', 'deleted_by');
    }

}
