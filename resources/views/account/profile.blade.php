  @extends('adminlte::page')

@section('title', 'Profile')

  @section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title">Update Profile</h2>
    </div>
    <div class="panel-body">
      {!! Form::open(['route' => 'update-profile']) !!}
      <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$user->name,['class' => 'form-control']) !!}
        @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group">
        {!! Form::label('phone','Telephone') !!}
        {!! Form::text('phone',$user->phone,['class' => 'form-control']) !!}
        @if ($errors->has('phone'))
        <span class="help-block">
          <strong>{{ $errors->first('phone') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group">
        {!! Form::label('address','Address') !!}
        {!! Form::text('address',$user->address,['class' => 'form-control']) !!}
        @if ($errors->has('address'))
        <span class="help-block">
          <strong>{{ $errors->first('address') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group">
        {!! Form::submit('Update Profile',['class'=>'btn btn-primary']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
  @endsection
