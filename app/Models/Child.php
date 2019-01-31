<?php
namespace App\Models;

class Child extends \Eloquent
{
    // create custom validation messages ------------------//
    protected $table = 'student';

    public function grades()
    {
        return $this->belongsToMany('App\Models\Grade', 'student_grade', 'student_id', 'grade_id');
    }
}
