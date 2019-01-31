<?php
namespace App\Models;

class Guardian extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'guardian';

    public function students()
    {
        return $this->belongsToMany('App\Models\Student', 'student_guardian', 'student_id', 'parents_id');
    }

}
