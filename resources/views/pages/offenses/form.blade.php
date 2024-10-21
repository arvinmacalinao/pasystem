@extends('layouts.app')
@section('content')
<div class="card mb-4">
	<div class="card-body">
		<div class="d-flex justify-content-between">
			<div>
			@if($id == 0)
			  <h4 class="card-title mb-0">New {{ $data['page'] }}</h4>
			@else
				<h4 class="card-title mb-0">Edit {{ $data['page'] }}</h4>
			  {{-- <div class="small text-body-secondary">January - July 2023</div> --}}
			@endif
			</div>
			<div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
				<a class="btn btn-primary btn-sm" href="{{ route('employee.offense.add') }}" title="Back"><span class="fa fa-caret-left"></span> Back</a>
			</div>
		  </div>
        <!-- This will display any message upon submission. -->
		@if(strlen($msg) > 0)
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				{{ $msg }}
			</div>
		@endif
        <!-- End -->
		<div class="flex-grow-1">
            <br>
			<form method="POST" action="{{ route('employee.offense.store', ['id' => $id]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="employee_id">Employee<span class="text-danger">*</span></label>
							<select class="form-control select2 @error('employee_id') is-invalid @enderror" name="employee_id" required>
								<option value="" selected disabled>-- Please select --</option>
								@foreach($users as $user)
									<option value="{{ $user->id }}" {{ old('employee_id', $eo->employee_id) == $user->id ? 'selected' : '' }}>{{ $user->FullNameLS }}</option>
									{{-- <option value="{{ $user->id }}" {{ old('employee_id', $eo->employee_id) == $user->id ? 'selected' : '' }}>{{ $user->last_name . ', ' . $user->first_name . ' - ' . $user->company->alias ?? '' . '' }}</option> --}}
								@endforeach
							</select>					
							<div class="invalid-feedback">@error('employee_id') {{ $errors->first('employee_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-6">
						<label class="form-label fw-bold" for="date_committed">Date Offense Committed<span class="text-danger">*</span></label>
						<div class="input-group date" id="">
							@if($eo->date_committed)
								@php
									$date_committed = \Carbon\Carbon::parse($eo->date_committed)->format('m-d-Y');
								@endphp
							@else
								@php
									$date_committed = null;
								@endphp
							@endif
							<input type="text" class="form-control datehired" id="date_committed" name="date_committed" value="{{ old('date_committed', $date_committed) }}" required>
							<span class="input-group-append">
								<span class="input-group-text bg-white d-block">
									<svg class="icon icon-lg">
										<use xlink:href="{{ asset('icons/coreui.svg#cil-calendar') }}"></use>
									</svg>
								</span>
							</span>
						</div>
					</div>
                </div>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="type_of_offense">Type of Offense<span class="text-danger">*</span></label>
							<input placeholder="Type of Offense" class="form-control form-control-sm @error('type_of_offense') is-invalid @enderror" type="text" maxlength="255" name="type_of_offense" id="type_of_offense" value="{{ old('type_of_offense', $eo->type_of_offense) }}" style="">
							<div class="invalid-feedback">@error('type_of_offense') {{ $errors->first('type_of_offense') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="policy_violated">Policy Violated<span class="text-danger">*</span></label>
							<input placeholder="Policy Violated" class="form-control form-control-sm @error('policy_violated') is-invalid @enderror" type="text" maxlength="255" name="policy_violated" id="policy_violated" value="{{ old('policy_violated', $eo->policy_violated) }}" style="">
							<div class="invalid-feedback">@error('policy_violated') {{ $errors->first('policy_violated') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="penalty">Penalty<span class="text-danger">*</span></label>
							<input placeholder="Penalty" class="form-control form-control-sm @error('penalty') is-invalid @enderror" type="text" maxlength="255" name="penalty" id="penalty" value="{{ old('penalty', $eo->penalty) }}" style="">
							<div class="invalid-feedback">@error('penalty') {{ $errors->first('penalty') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="decision_of_case">Decision of Case<span class="text-danger">*</span></label>
							<input placeholder="Decision of Case" class="form-control form-control-sm @error('decision_of_case') is-invalid @enderror" type="text" maxlength="255" name="decision_of_case" id="decision_of_case" value="{{ old('decision_of_case', $eo->decision_of_case) }}" style="">
							<div class="invalid-feedback">@error('decision_of_case') {{ $errors->first('decision_of_case') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-12">
						<label class="form-label fw-bold" for="eo_file" >Employee Offense File Upload</label>
						<input class="form-control @error('eo_file') is-invalid @enderror" type="file" id="eo_file"  accept=".pdf" name="eo_file">
						<div class="invalid-feedback">@error('eo_file') {{ $errors->first('eo_file') }} @enderror</div>
					</div>
				</div>
                @if(Str::contains(Request::url(), 'add') || Str::contains(Request::url(), 'edit'))
				<div class="mb-2 text-end">
					<input class="btn btn-primary" type="submit" name="form-submit" id="form-submit" value="Save">
				</div>
                @endif
			</form>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		$('.datehired').datepicker({
			autoclose: true,
			format: "mm-dd-yyyy",
			todayBtn: true,
			todayHighlight: true
		});
		$('.dateseparated').datepicker({
			autoclose: true,
			format: "mm-dd-yyyy",
			todayBtn: true,
			todayHighlight: true
		});
		$('.dateregular').datepicker({
			autoclose: true,
			format: "mm-dd-yyyy",
			todayBtn: true,
			todayHighlight: true
		});

		$('.select2').select2({
			theme: "classic"
		});
	});
</script>
@endsection