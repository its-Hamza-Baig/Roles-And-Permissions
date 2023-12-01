<x-app-layout>

    <div class="container">
        <h1 style="font-size:30px; margin:20px 0px">Show User</h1>

        <table class="table">
            <thead>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Role</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $role)
                    <td>{{ $role }}</td>
                    @endforeach
                    @endif
                </tr>
            </tbody>
        </table>



    </div>
</x-app-layout>