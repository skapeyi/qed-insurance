@extends('adminlte::page')
@section('title', 'User Details')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">User Details</h2>
        </div>
        <div class="panel-body">
            {!! Form::model($user,['method' => 'PATCH','route' => 'admin.users.update']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('name','Name')!!}
                        {!! Form::text('name',$user->name,['class' => 'form-control','readonly']) !!}
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('email','Email')!!}
                        {!! Form::text('name',$user->email,['class' => 'form-control','readonly']) !!}
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
				    </div>

                    <div class="form-group">
                        {!! Form::label('phone','Telephone')!!}
                        {!! Form::text('phone',$user->telephone,['class' => 'form-control','readonly']) !!}
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
				    </div>
                    <div class="form-group">
                        {!! Form::label('address','Address')!!}
                        {!! Form::text('address',$user->address,['class' => 'form-control','readonly']) !!}
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
				    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
