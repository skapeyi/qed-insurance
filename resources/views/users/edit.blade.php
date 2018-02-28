@extends('adminlte::page')
@section('title', '| Edit User')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class='col-md-12'>

                    <h1><i class='fa fa-user-plus'></i> Edit User </h1>
                    <hr>

                    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('class' => 'form-control','readonly')) }}
                    </div>

                    <h5><b>Give Role</b></h5>

                    <div class='form-group'>
                        @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                        @endforeach
                    </div>

                    <div class="form-group">
                        {{ Form::label('active', 'Activate Account') }}<br>
                        {{ Form::select('active', array(1 => 'Active',0 => 'In-Active'),$user->active,['class' => 'form-control']) }}
                    </div>

                  

                    {{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection