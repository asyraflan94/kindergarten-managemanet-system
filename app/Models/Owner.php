<?php
namespace App\Models;

class Owner extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'owner';

    public function organizations()
    {
        return $this->belongsToMany('App\Models\Organization', 'owner_organization', 'owner_id', 'organization_id');
    }
}
