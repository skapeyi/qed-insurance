@extends('adminlte::page')

@section('title', '| Edit Permission')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class='col-lg-12'>

                    <h1><i class='fa fa-key'></i> Edit permision </h1>
                    <br>
                    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

                    <div class="form-group">
                        {{ Form::label('name', 'Permission Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>
                    <br>
                    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection