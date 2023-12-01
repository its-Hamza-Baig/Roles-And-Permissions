<x-app-layout>

    
    <div class="container">
        <h1 style="font-size:30px; margin:20px 0px;">Users Management</h1>

        <button class="btn btn-success"><a href="{{ route('addStudent')  }}" style="text-decoration: none; color: white">create Student</a></button>
    
        @if(!empty($user))
        <h2>No records found</h2>
        @else
        <table class="table mt-5">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $rolename)
                    <label for="" class="badge badge-success" style="background:green;">{{$rolename}}</label>
                    @endforeach
                    @endif
                    
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
    
    </x-app-layout>