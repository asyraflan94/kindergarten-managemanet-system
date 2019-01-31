<?php
namespace App\Models;

class Package extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'package';

    public function subjects()
    {
        return $this->belongsToMany('App\Models\Subject', 'package_subject', 'package_id', 'subject_id');
    }

}
