@extends('adminlte::page')

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
					{!! Form::select('statutory', ['0'=>'No','1' => 'Yes'], null, ['class' => 'form-control','readonly']) !!}
					@if ($errors->has('statutory'))
					<span class="help-block">
						<strong>{{ $errors->first('statutory') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('third_party_property_damage','Third Party Property Damage?') !!}
					{!! Form::select('third_party_property_damage', ['0'=>'No','1' => 'Yes'], null, ['class' => 'form-control','readonly']) !!}
					@if ($errors->has('third_party_property_damage'))
					<span class="help-block">
						<strong>{{ $errors->first('third_party_property_damage') }}</strong>
					</span>
					@endif
				</div>
				<div class="form-group">
					{!! Form::label('third_party_property_damage_limit','Third Party Property Damage Limit') !!}
					{!! Form::text('third_party_property_damage_limit','',['class' => 'form-control','readonly']) !!}
					@if ($errors->has('third_party_property_damage_limit'))
					<span class="help-block">
						<strong>{{ $errors->first('third_party_property_damage_limit') }}</strong>
					</span>
					@endif
				</div>
				
			</div>
		</div>


	</div>

</div>

@endsection
