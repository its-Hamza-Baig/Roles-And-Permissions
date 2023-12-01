<x-app-layout>

<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size: 30px;margin: 20px 0px"> Show Role</h2>
        </div>
        <div class="pull-right" style="margin: 20px 0px">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group text-underline" style="font-size: 20px;">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong style="font-size: 20px">Permissions:</strong>
            @if(!empty($rolePermissions))
            <ul class="list-group">
                @foreach($rolePermissions as $v)
                
                    <li style="list-style: disc; margin-left: 20px">{{ $v->name }}</li>
                    
                    
                
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>
</div>
</x-app-layout>