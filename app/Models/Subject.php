<?php
namespace App\Models;

class Subject extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'subject';

    public function packages()
    {
        return $this->belongsToMany('App\Models\Package', 'subject_package');
    }
}
