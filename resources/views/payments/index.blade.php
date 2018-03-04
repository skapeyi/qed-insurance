@extends('adminlte::page')
@section('title', 'Payments')
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
						<th>Internal Ref.</th>
						<th>External Ref</th>
						<th>Phone Number</th>
						<th>Amount</th>
						<th>Status</th>
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
        ajax: '{!! route('payments.data') !!}',
        columns: [
            { data: 'created_at', name: 'created_at' },
						{data: 'internal_ref', name: 'internal_ref'},
			      { data: 'external_ref', name: 'external_ref'},
            { data: 'phone_number', name: 'phone_number' },
			      { data: 'amount', name: 'amount' },
            { data: 'status', name: 'status' }
        ]
    });
});
</script>
@endpush
