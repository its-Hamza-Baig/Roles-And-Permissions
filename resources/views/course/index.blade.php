<x-app-layout>

    
<div class="container">

    <h1 style="font-size:30px; margin:20px 0px;">Course Management</h1>

    @if(auth()->user()->hasRole('Admin'))

    <button style="background: green; color:white; padding:10px 20px; border-radius:10px; margin:20px 0px"><a href="{{ route('courses.create') }}">Add New Course</a></button>
        @endif

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
                <td>{{ $course->name }}</td>
                <td>
                    @if(auth()->user()->hasRole('Admin'))

                    <button><a href="{{ route('courses.edit',$course->id) }}" style="background: rgb(40, 209, 209); padding: 10px 20px; border-radius: 10px; color:white">Edit</a></button>
                        
                    <button style="background: red; padding: 10px 20px; border-radius: 10px; color:white; margin:20px 0px;"><a href="{{ route('courses.destroy',$course->id) }}">Delete</a></button>
                    @endif
                    
                    @if(auth()->user()->hasRole('Student'))

                        <button><a href="{{ route('courses.enrollme',$course->id) }}" style="background: rgb(40, 209, 209); padding: 10px 20px; border-radius: 10px; color:white">Enroll Me</a></button>
                    @endif

                </td>
            </tr>

                
            @endforeach
        </tbody>
    </table>

</div>

</x-app-layout>