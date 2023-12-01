<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\EnrolledCourses;

class CourseController extends Controller
{
    

    public function index()
    {
        $courses = Courses::all();
        return view('course.index', compact('courses'));
    }

    
    public function create()
    {
        return view('course.create');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        Courses::create($input);
        return redirect()->route('courses.index');
    }

    
    public function edit(string $id)
    {
        $courses = Courses::find($id);
        return view('course.edit', compact('courses'));
    }

    
    
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $course = Courses::find($id);
        $course->update($input);
        return redirect()->route('courses.index');
    }

    
    public function destroy(string $id)
    {
        $course = Courses::find($id);
        $course->delete();
        return redirect()->route('courses.index');
        
    }

    public function enrollment($id){
        $userid = auth()->user()->id;
        $course = EnrolledCourses::insert([
            'course_id' => $id,
            'user_id' => $userid,
        ]);

        return redirect()->route('enrolled');

    }
    
    public function enrolled(){
        $courses = EnrolledCourses::where('user_id', auth()->user()->id)->with('courses')->get();

        return view('course.enrolled', compact('courses'));

    }

    

    public function deletemycourse($id){
        $course = EnrolledCourses::find($id);
        $course->delete();
        return back();
    }
}
