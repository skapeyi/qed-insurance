@extends('adminlte::page')

@section('title', '| Create Permission')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title pull-left">  Add Permission </h2> 
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                {{ Form::open(array('url' => 'permissions')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', '', array('class' => 'form-control')) }}
                    </div><br>
                    @if(!$roles->isEmpty()) //If no roles exist yet
                        <h4>Assign Permission to Roles</h4>

                        @foreach ($roles as $role) 
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                        @endforeach
                    @endif
                    <br>
                     {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection