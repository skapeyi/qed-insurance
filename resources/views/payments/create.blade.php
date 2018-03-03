@extends('adminlte::page')

@section('title', 'Make Payment')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">Payments For Request {{$ins->ref_no}}</h2>
	</div>
	<div class="panel-body">
    <div class="col-md-12">
    @if(count($payments) < 1)
      <p> You haven't made any payments for this request. </p>
    @else
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Date</th>
            <th>Payment Reference</th>
            <th>Amount</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach($payments as $item)
            <tr>
              <td>{{ $item->created_at }} </td>
              <td>{{ $item->internal_ref }}</td>
              <td>{{ $item->amount }}</td>
              <td>{{ $item->status }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $payments->links() }}
    @endif
  </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title">Fill Out Form to Complete Payment</h2>
  </div>
  <div class="panel-body">
    {!! Form::open(['route' => 'payments.store','files' => 'true']) !!}
		{!! Form::hidden('ref', $ins->ref_no) !!}
		{!! Form::hidden('req_id', $ins->id) !!}
    <div class="form-group">
      {!! Form::label('tel','Telephone (e.g. 256774123456)')!!}
      {!! Form::text('tel','',['class' => 'form-control']) !!}
      @if ($errors->has('tel'))
      <span class="help-block">
        <strong>{{ $errors->first('tel') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      {!! Form::label('amount','Amount')!!}
      {!! Form::text('amount',$ins->amount,['class' => 'form-control','readonly']) !!}
      @if ($errors->has('amount'))
      <span class="help-block">
        <strong>{{ $errors->first('amount') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      {!! Form::submit('Complete Payment',['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
  </div>
</div>
@endsection
