<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\Courses;

use Illuminate\Http\Request;

class CourseApiController extends Controller
{
    public function fetchCourses(){
        $courses = Courses::all();
        return response()->json(['courses'=>$courses], 200);
    }
}
