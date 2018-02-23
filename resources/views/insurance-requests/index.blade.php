@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">My Insurance Requests</h2>
	</div>
	<div class="panel-body">
		@if(count($myRequests)< 1)
		<div class="alert alert-info">
			<p>You haven't made any requests yet!</p>
		</div>
		@else
		<div class="table-responsive">
			<table class="table table-bordered table-responsive" id="organization-table">
				<thead>
					<tr>						
						<th>Date Created</th>
						<th>Start period</th>
						<th>End Period</th>
						<th>Registraton No.</th>
						<th>Registration Owner</th>
						<th>Make</th>
						<th>Color</th>
						<th>Actions</th>
					</tr>
				</thead>				
			</table>
		</div>
		@endif
	</div>
</div>
@endsection