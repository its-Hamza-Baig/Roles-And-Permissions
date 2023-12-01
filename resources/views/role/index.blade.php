<x-app-layout>

<div class="container">

    <h1 style="font-size:30px; margin:20px 0px;">Role Management</h1>

    <button class="btn btn-success"><a href="{{ route('roles.create') }}" style="text-decoration: none; color: white;">Create Role</a></button>

    <table class="table mt-5 table-bordered">
        <thead>
            <th>Id</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <button class="btn btn-info"><a href="{{ route('roles.show', $role->id) }}" style="text-decoration: none;">Show</a></button>
                    <button class="btn btn-success"><a href="{{ route('roles.edit',$role->id) }}" style="text-decoration: none;">Edit</a></button>
                    
                        <button class="btn btn-danger"><a href="{{ route('roles.destroy', $role->id) }}" style="text-decoration: none;">Delete</a></button>
                  
                </td>
            </tr>  
            @endforeach 
        </tbody>
    </table>
</div>
</x-app-layout>