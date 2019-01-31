<?php
namespace App\Models;

class Organization extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'organization';

    public function owners()
    {
        return $this->belongsToMany('App\Models\Owner', 'owner_organization', 'owner_id', 'organization_id');
    }

    public function branches()
    {
        return $this->belongsToMany('App\Models\Branch', 'organization_branch', 'organization_id', 'branch_id');
    }
}
