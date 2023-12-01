<x-app-layout>

    
    <div class="container">
    
        <h1 style="font-size:30px; margin:20px 0px;">Enrolled Course</h1>
    
        <button style="background: green; color:white; padding:10px 20px; border-radius:10px; margin:20px 0px"><a href="{{ route('courses.create') }}">Add New Course</a></button>
    
        
    <table class="table">
        <thead>
            <th>id</th>
            <th>Course Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course['courses'][0]['name'] }}</td>
                <td>

                    <button style="background: red; padding: 10px 20px; border-radius: 10px; color:white; margin:20px 0px;"><a href="{{ route('courses.deletemycourse',$course->id) }}">Delete</a></button>
                  

                </td>
            </tr>

                
            @endforeach
        </tbody>
    </table>
    
    </div>
    
    </x-app-layout>