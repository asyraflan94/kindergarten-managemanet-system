<?php
namespace App\Models;

class Branch extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'branch';

    public function staffs()
    {
        return $this->belongsToMany('App\Models\Staff', 'branch_staff', 'branch_id', 'staff_id');
    }
}
