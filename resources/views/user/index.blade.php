<x-app-layout>

    
<div class="container">

    <h1 style="font-size:30px; margin:20px 0px;">Users Management</h1>

    <button class="btn btn-success"><a href="{{ route('users.create')  }}" style="text-decoration: none; color: white">create user</a></button>

    <table class="table mt-5">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="280px">Action</th>
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
            <td>
                <button class="btn btn-info"><a href="{{ route('users.show',$user->id) }}" style="text-decoration: none; color: white">Show</a></button>
                <button class="btn btn-success"><a href="{{ route('users.edit',$user->id) }}" style="text-decoration: none; color: white">Edit</a></button>
                
                    <button class="btn btn-danger" style="margin: 10px 0px"><a href="{{ route('users.destroy',$user->id) }}" style="text-decoration: none; color: white">Delete</a></button>
                
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-app-layout>