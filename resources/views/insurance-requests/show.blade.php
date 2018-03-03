@extends('adminlte::page')
@push('css')
<link href="{{ asset('css/timeline.css') }}" rel="stylesheet">
@endpush

@section('title', 'Make Requests')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title pull-left">New Insurance Request</h2>
		<div class="clearfix"></div>
	</div>
	{!! Form::model($ins,['method' => 'PATCH','route' => ['insurance-request.update',$ins]])!!}
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('name','Name')!!}
					{!! Form::text('name',$ins->name,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('address','Address')!!}
					{!! Form::text('address',$ins->address,['class' => 'form-control', 'readonly']) !!}
					@if ($errors->has('address'))
					<span class="help-block">
						<strong>{{ $errors->first('address') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('insurance_period_start','Beginning of Insurance Period')!!}
					{!! Form::text('insurance_period_start',$ins->insurance_period_start,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('insurance_period_start'))
					<span class="help-block">
						<strong>{{ $errors->first('insurance_period_start') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('insurance_period_end','End of Insurance Period')!!}
					{!! Form::text('insurance_period_end',$ins->insurance_period_end,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('insurance_period_end'))
					<span class="help-block">
						<strong>{{ $errors->first('insurance_period_end') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('reg_number','Registration No.')!!}
					{!! Form::text('reg_number', $ins->reg_number,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('reg_number'))
					<span class="help-block">
						<strong>{{ $errors->first('reg_number') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('reg_owner','Registration Owner') !!}
					{!! Form::text('reg_owner',$ins->reg_owner,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('reg_owner'))
					<span class="help-block">
						<strong>{{ $errors->first('reg_owner') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('make','Make') !!}
					{!! Form::text('make',$ins->make,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('make'))
					<span class="help-block">
						<strong>{{ $errors->first('make') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('color','Color') !!}
					{!! Form::text('color',$ins->color,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('color'))
					<span class="help-block">
						<strong>{{ $errors->first('color') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('tonnage','Tonnage') !!}
					{!! Form::text('tonnage',$ins->tonnage,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('tonnage'))
					<span class="help-block">
						<strong>{{ $errors->first('tonnage') }}</strong>
					</span>
					@endif
				</div>

			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('cubic_capacity','Cubic Capacity') !!}
					{!! Form::text('cubic_capacity',$ins->cubic_capacity,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('reg_owner'))
					<span class="help-block">
						<strong>{{ $errors->first('cubic_capacity') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group">
					{!! Form::label('year_of_manufacture','Year of Manufacture') !!}
					{!! Form::text('year_of_manufacture',$ins->year_of_manufacture,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('year_of_manufacture'))
					<span class="help-block">
						<strong>{{ $errors->first('year_of_manufacture') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('engine_no','Engine Number') !!}
					{!! Form::text('engine_no',$ins->engine_no,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('engine_no'))
					<span class="help-block">
						<strong>{{ $errors->first('engine_no') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('chasis_no','Chasis Number') !!}
					{!! Form::text('chasis_no',$ins->chasis_no,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('chasis_no'))
					<span class="help-block">
						<strong>{{ $errors->first('chasis_no') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('seating_capacity','Seating Capacity') !!}
					{!! Form::text('seating_capacity',$ins->seating_capacity,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('seating_capacity'))
					<span class="help-block">
						<strong>{{ $errors->first('seating_capacity') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('use','Use') !!}
					{!! Form::text('use',$ins->use,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('use'))
					<span class="help-block">
						<strong>{{ $errors->first('use') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('statutory','Statutory?') !!}
					{!! Form::select('statutory', ['0'=>'No','1' => 'Yes'], $ins->statutory, ['class' => 'form-control','readonly']) !!}
					@if ($errors->has('statutory'))
					<span class="help-block">
						<strong>{{ $errors->first('statutory') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('third_party_property_damage','Third Party Property Damage?') !!}
					{!! Form::select('third_party_property_damage', ['0'=>'No','1' => 'Yes'], $ins->third_party_property_damage, ['class' => 'form-control','readonly']) !!}
					@if ($errors->has('third_party_property_damage'))
					<span class="help-block">
						<strong>{{ $errors->first('third_party_property_damage') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('third_party_property_damage_limit','Third Party Property Damage Limit') !!}
					{!! Form::text('third_party_property_damage_limit',$ins->third_party_property_damage_limit,['class' => 'form-control','readonly']) !!}
					@if ($errors->has('third_party_property_damage_limit'))
					<span class="help-block">
						<strong>{{ $errors->first('third_party_property_damage_limit') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					@if(isset($ins->log_book_url))
					 <a href="{{URL::asset('/'.$ins->log_book_url)}}" class="btn btn-primary"> Download Log Book </a>
					@endif
					@if(isset($ins->id_doc_url))
					 <a href="{{URL::asset('/'.$ins->id_doc_url)}}" class="btn btn-primary"> Download Indentification Document </a>
					@endif
				</div>
			</div>
		</div>


	</div>
	{!! Form::close() !!}
</div>

<div class="container">

    <!-- Page header -->
    <div class="page-header">
        <h2>Request Updates!</h2>
    </div>
    <!-- /Page header -->
</div>
<div class="container">
	<!-- New Update -->
	{!! Form::open(['route' => 'request-updates']) !!}

		{!! Form::hidden('_ins_req',$ins->id) !!}
		{!! Form::hidden('_ins_author', $ins->user_id) !!}

		<div class="form-group">
			{!! Form::label('update','Your Comment') !!}
			{!! Form::textarea('update','',['class' => 'form-control', 'rows'=>3])!!}
		</div>

		@hasrole('Staff')
		<div class="form-group">
			{!! Form::label('status','Request Status') !!}
			{!! Form::select('status', ['Pending'=>'Pending','Under Review' => 'Under Review','Cancelled' => 'Cancelled','Ready for Pickup' => 'Ready for Pickup','Completed' => 'Completed',], $ins->status, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('amount','Amount Customer Should Pay (UGX)') !!}
			{!! Form::text('amount',$ins->amount,['class' => 'form-control']) !!}
			@if ($errors->has('amount'))
			<span class="help-block">
				<strong>{{ $errors->first('amount') }}</strong>
			</span>
			@endif
		</div>
		@endhasrole

		<div class="form-group">
		{!! Form::submit('Update Request', array('class' => 'btn btn-primary pull-right')) !!}

	</div>

	<!-- /New Update -->
</div>
		<div class="container"

    <!-- Timeline -->
    <div class="timeline">

        <!-- Line component -->
        <div class="line text-muted"></div>
				@foreach($ins_updates as $item)

        <!-- Panel -->
        <article class="panel panel-primary">

            <!-- Icon -->
            <div class="panel-heading icon">
                <i class="glyphicon glyphicon-plus"></i>
            </div>
            <!-- /Icon -->

            <!-- Heading -->
            <div class="panel-heading">
                <h2 class="panel-title">New Update</h2>
            </div>
            <!-- /Heading -->

            <!-- Body -->
            <div class="panel-body">
                {{$item->update}}
            </div>
            <!-- /Body -->

            <!-- Footer -->
            <div class="panel-footer">
                <small>{{$item->created_at}}</small>
            </div>
            <!-- /Footer -->

        </article>
        <!-- /Panel -->
				@endforeach


    </div>
    <!-- /Timeline -->

</div>
</div>

@endsection
