@extends('adminlte::page')


@section('title', '| Edit Role')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title pull-left">  Edit Role </h2>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>
                @foreach ($permissions as $permission)

                {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
                <br>
                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }} 
            </div>
        </div>

    </div>
</div>



@endsection