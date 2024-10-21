@extends('layouts.app')
@section('content')
<div class="card mb-4">
	<div class="card-body">
		<div class="d-flex justify-content-between">
			<div>
				<h4 class="card-title mb-0">View {{ $data['page'] }} Details</h4>
			</div>
			<div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
				<a class="btn btn-primary btn-sm" href="{{ url()->previous() }}" title="Back"><span class="fa fa-caret-left"></span> Back</a>
			</div>
		</div>

		<!-- This will display any message -->
		@if(strlen($msg) > 0)
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				{{ $msg }}
			</div>
		@endif

		<div class="flex-grow-1">
			<br>
			<div class="row">
				<div class="col-md-4">
					<div class="mb-2">
						<label class="form-label fw-bold">Employee</label>
						<p class="form-control-plaintext">{{ $eo->employee_name }}</p>
					</div>
				</div>
				<div class="col-md-4">
					<label class="form-label fw-bold">Date Offense Committed</label>
					<p class="form-control-plaintext">{{ \Carbon\Carbon::parse($eo->date_committed)->format('m-d-Y') ?? 'N/A' }}</p>
				</div>
				<div class="col-md-4">
					
				</div>
				<div class="col-md-4">
					<div class="mb-2">
						<label class="form-label fw-bold">Company</label>
						<p class="form-control-plaintext">{{ $eo->company }}</p>
					</div>
				</div>
				<div class="col-md-4">
					<label class="form-label fw-bold">Department</label>
					<p class="form-control-plaintext">{{ $eo->department ?? 'N/A' }}</p>
				</div>
				<div class="col-md-4">
					<label class="form-label fw-bold">Designation</label>
					<p class="form-control-plaintext">{{ $eo->position ?? 'N/A' }}</p>
				</div>
			</div>
			
			<hr>
			<div class="row">
				<div class="col-md-6">
					<div class="mb-2">
						<label class="form-label fw-bold">Type of Offense</label>
						<p class="form-control-plaintext">{{ $eo->type_of_offense ?? 'N/A' }}</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-2">
						<label class="form-label fw-bold">Policy Violated</label>
						<p class="form-control-plaintext">{{ $eo->policy_violated ?? 'N/A' }}</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-2">
						<label class="form-label fw-bold">Penalty</label>
						<p class="form-control-plaintext">{{ $eo->penalty ?? 'N/A' }}</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-2">
						<label class="form-label fw-bold">Decision of Case</label>
						<p class="form-control-plaintext">{{ $eo->decision_of_case ?? 'N/A' }}</p>
					</div>
				</div>
				<div class="col-md-12">
					<label class="form-label fw-bold">Employee Offense File</label>
					@if ($eo->eo_file)
						<a class="btn btn-success btn-sm text-light mb-1" href="{{ asset('storage/eo_docs/' . $eo->eo_file) }}" target="_blank">
							<span class="fa fa-floppy-o"> </span> Download File
						</a>
					@else
						<p class="form-control-plaintext">No file uploaded</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
