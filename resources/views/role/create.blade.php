<x-app-layout>
    
<div class="container">
  <div style="margin:20px 0px"></div>
  <form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label class="col-form-label"><h3>Enter Role</h3></label>
        </div>
        <div class="col-auto">
          <input type="text" id="name" name="name" class="form-control">
        </div>

        <h3 style="font-size:30px;">Permisions</h3>
        @foreach ($permissions as $permission)
            
        <div class="form-check">
          <label class="form-check-label">
          <input class="form-check-input name" type="checkbox" name="permission[]" value="{{$permission->name}}">
            {{ $permission->name }}
          </label>
          </div>
          @endforeach



        <div class="col-auto">
            <button class="btn btn-success">submit</button>
        </div>
    </div>
  </form>

    
</div>

</x-app-layout>