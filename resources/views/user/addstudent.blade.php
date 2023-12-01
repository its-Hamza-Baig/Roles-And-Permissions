<x-app-layout>

    
    <div class="container">
        <form action="{{ route('student.store') }}" method="post">
          @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm-password" id="confirm-password">
              </div>
    
            <div class="mb-3">
              <select name="role"  class="form-select">
                <option value="">Plz select the role</option>
    
                @foreach($roles as $role)
                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                @endforeach
              </select>
    
            </div>
            <button type="submit" class="btn btn-success" style="background:green">Submit</button>
          </form>
    </div>
    
    </x-app-layout>