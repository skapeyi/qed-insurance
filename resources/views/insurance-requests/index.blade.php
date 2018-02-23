@extends('adminlte::page')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">My Insurance Requests</h2>
	</div>
	<div class="panel-body">
		<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-hover" id="table-1">
				<thead>
					<tr>						
						<th>Date Created</th>
						<th>Name</th>
						<th>Start period</th>
						<th>End period</th>
						<th>Car Make</th>
						<th>Registraton No.</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>				
			</table>
		</div>
		</div>
	
	</div>
</div>
@endsection

@push('js')
<script>
$(function() {
    $('#table-1').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('myrequests.data') !!}',
        columns: [
            { data: 'created_at', name: 'created_at' },
			{ data: 'name', name: 'name'},
            { data: 'insurance_period_start', name: 'insurance_period_start' },
			{ data: 'insurance_period_end', name: 'insurance_period_end' },
            { data: 'make', name: 'make' },
            { data: 'reg_number', name: 'reg_number' },
            { data: 'status', name: 'status' },
			{ data: 'action', name:'action', orderable: false, searchable: false}
			
        ]
    });
});
</script>
@endpush