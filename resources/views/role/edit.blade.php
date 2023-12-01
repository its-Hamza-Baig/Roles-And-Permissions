<x-app-layout>
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size: 30px; margin:20px 0px;">Edit Role</h2>
        </div>
        <div class="pull-right" style="font-size: 30px; margin:20px 0px;">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>


<form action="{{ route('roles.update', $role->id)}}" method="post">
    @csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <input type="text"  name="name" value="{{$role->name}}" class="form-control" placeholder="name">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br>
        
            @foreach($permission as $value)
                <label>
                    <input type="checkbox" name="permission[]" value="{{ $value->name }}" class="name"
                           {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                    {{ $value->name }}
                </label>
                <br>
            @endforeach
        </div>
        
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary" style="background: green">Submit</button>
    </div>
</div>
</form>
</div>

</x-app-layout>