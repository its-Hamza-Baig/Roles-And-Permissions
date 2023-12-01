<x-app-layout>

    
    <div class="container">
    
        <h1 style="font-size:30px; margin:20px 0px;">Add New Course</h1>
        
        <div>
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <label for="">Enter course name</label>
                <input type="text" name="name" id="course">
                <button type="submit" style="padding: 10px 20px; background: rgb(27, 138, 27); color: white; border-radius:10px">submit</button>
            </form>
        </div>
    
    
    </div>
    
    </x-app-layout>