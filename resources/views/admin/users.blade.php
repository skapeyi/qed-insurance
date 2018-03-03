@extends('adminlte::page')
@section('title', 'All Users')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">All Insurance Requests</h2>
	</div>
	<div class="panel-body">
		<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-hover" id="users-table">
				<thead>
					<tr>
						<th>Date Created</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Telephone</th>
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
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('users.data') !!}',
        columns: [
            { data: 'created_at', name: 'created_at' },
			{ data: 'name', name: 'name'},
            { data: 'email', name: 'email' },
			{ data: 'address', name: 'address' },
            { data: 'phone', name: 'phone' },
			{ data: 'action', name:'action'}

        ]
    });
});
</script>
@endpush
