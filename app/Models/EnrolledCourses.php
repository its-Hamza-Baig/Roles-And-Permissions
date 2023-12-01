<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledCourses extends Model
{
    use HasFactory;
    protected $fillable =[
        'course_id',
        'user_id',
    ];

    public function courses(){
        return $this->hasMany(Courses::class, 'id', 'course_id');
    }
}
