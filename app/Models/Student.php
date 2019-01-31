<?php
namespace App\Models;

class Student extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'student';

    public function guardians()
    {
        return $this->belongsToMany('App\Models\Guardian', 'student_guardian', 'student_id', 'parents_id');
    }

}
