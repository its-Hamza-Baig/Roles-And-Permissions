<x-app-layout>

    
<div class="container">
    <form action="{{ route('users.update',['user' => $user->id]) }}" method="POST">
      
      @csrf
      
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{$user->email}}">
        </div>

        <div class="mb-3">
          <select name="role"  class="form-select">
            <option value="">Plz select the role</option>


            @foreach($roles as $role)
                <option value="{{ $role }}">{{ ucfirst($role) }}</option>
            @endforeach


            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $rolename)
                <option selected>{{ $rolename }}</option>
                

                @endforeach
                @endif
          </select>

        </div>
        <button type="submit" class="btn btn-success" style="background:green">Submit</button>
      </form>
</div>

</x-app-layout>