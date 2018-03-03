  @extends('adminlte::page')
@section('title', 'Change Password')
  @section('content')
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Update Password</h2>
      </div>
      <div class="panel-body">
        <div class="col-md-6 col-md-offset-3">
          {!! Form::open(['route' => 'updatePassword']) !!}
          <div class="form-group">
            {!! Form::label('old','Old Password')!!}
            {!! Form::password('old',['class' => 'form-control']) !!}
            @if ($errors->has('old'))
            <span class="help-block">
              <strong>{{ $errors->first('old') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            {!! Form::label('new','New Password')!!}
            {!! Form::password('new',['class' => 'form-control']) !!}
            @if ($errors->has('new'))
            <span class="help-block">
              <strong>{{ $errors->first('new') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            {!! Form::label('new_confirmation','Confirm New Password')!!}
            {!! Form::password('new_confirmation',['class' => 'form-control']) !!}
            @if ($errors->has('new_confirmation'))
            <span class="help-block">
              <strong>{{ $errors->first('new_cofirmation') }}</strong>
            </span>
            @endif
          </div>

          <div class="form-group">
            {!! Form::submit('Update Password',['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  @endsection
