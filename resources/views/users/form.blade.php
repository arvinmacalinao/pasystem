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
				<a class="btn btn-primary btn-sm" href="{{ route('employee.index') }}" title="Back"><span class="fa fa-caret-left"></span> Back</a>
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
			<form method="POST" action="{{ route('employee.store', ['id' => $id]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-4">
						<div class="mb-2">
							<label class="form-label fw-bold" for="first_name">First Name<span class="text-danger">*</span></label>
							<input placeholder="First Name" class="form-control form-control-sm @error('first_name') is-invalid @enderror" type="text" maxlength="255" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" style="">
							<div class="invalid-feedback">@error('first_name') {{ $errors->first('first_name') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-2">
							<label class="form-label fw-bold" for="middle_name">Middle Name<span class="text-danger">*</span></label>
							<input placeholder="Middle Name" class="form-control form-control-sm @error('middle_name') is-invalid @enderror" type="text" maxlength="255" name="middle_name" id="middle_name" value="{{ old('middle_name', $user->middle_name) }}" style="">
							<div class="invalid-feedback">@error('middle_name') {{ $errors->first('middle_name') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-2">
							<label class="form-label fw-bold" for="last_name">Last Name<span class="text-danger">*</span></label>
							<input placeholder="Last Name" class="form-control form-control-sm @error('last_name') is-invalid @enderror" type="text" maxlength="255" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" style="">
							<div class="invalid-feedback">@error('last_name') {{ $errors->first('last_name') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-2">
							<label class="form-label fw-bold" for="email">E-mail Address<span class="text-danger">*</span></label>
							<input placeholder="E-mail Address" class="form-control form-control-sm @error('email') is-invalid @enderror" type="text" maxlength="255" name="email" id="email" value="{{ old('email', $user->email) }}" style="">
							<div class="invalid-feedback">@error('email') {{ $errors->first('email') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-3">
						<label class="form-label fw-bold" for="employee_code">Employee Code<span class="text-danger">*</span></label>
							<input placeholder="Employee Code" class="form-control form-control-sm @error('employee_code') is-invalid @enderror" type="text" maxlength="255" name="employee_code" id="employee_code" value="{{ old('employee_code', $user->employee_code) }}" style="">
							<div class="invalid-feedback">@error('employee_code') {{ $errors->first('employee_code') }} @enderror</div>
					</div>
					<div class="col-md-3">
						<div class="mb-2">
							<label class="form-label fw-bold" for="es_id">Employment Status<span class="text-danger">*</span></label>
							<select class="form-control select2 @error('es_id') is-invalid @enderror" name="es_id">
								<option value="" selected disabled>-- Please select --</option>
								@foreach($statuses as $status)
									<option value="{{ $status->id }}" {{ old('es_id', $user->es_id) == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
								@endforeach
							</select>					
							<div class="invalid-feedback">@error('es_id') {{ $errors->first('es_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="mb-2">
							<label class="form-label fw-bold" for="job_level">Job Level<span class="text-danger">*</span></label>
							<select class="form-control select2 @error('job_level') is-invalid @enderror" name="job_level">
								<option value="" selected disabled>-- Please select --</option>
								@for($i = 1; $i <= 10; $i++)
    								<option value="{{ $i }}" {{ old('job_level', $user->job_level) == $i ? 'selected' : '' }}>Level {{ $i }}</option>
								@endfor
							</select>					
							<div class="invalid-feedback">@error('job_level') {{ $errors->first('job_level') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-2">
							<label class="form-label fw-bold" for="c_id">Company<span class="text-danger">*</span></label>
							<select class="form-control select2 @error('c_id') is-invalid @enderror" name="c_id">
								<option value="" selected disabled>-- Please select --</option>
								@foreach($companies as $company)
									<option value="{{ $company->id }}" {{ old('c_id', $user->c_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
								@endforeach
							</select>					
							<div class="invalid-feedback">@error('c_id') {{ $errors->first('c_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-2">
							<label class="form-label fw-bold" for="r_id">Position<span class="text-danger">*</span></label>
							<select class="form-control select2 @error('r_id') is-invalid @enderror" name="r_id">
								<option value="" selected disabled>-- Please select --</option>
								@foreach($roles as $role)
									<option value="{{ $role->id }}" {{ old('r_id', $user->r_id) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
								@endforeach
							</select>					
							<div class="invalid-feedback">@error('r_id') {{ $errors->first('r_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="mb-2">
							<label class="form-label fw-bold" for="ug_id">Department<span class="text-danger">*</span></label>
							<select class="form-control form-control-sm @error('ug_id') is-invalid @enderror select2" name="ug_id">
								<option value="" selected disabled>-- Please select --</option>
								@foreach($groups as $group)
									<option value="{{ $group->id }}" {{ old('ug_id', $user->ug_id) == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
								@endforeach
							</select>
							<div class="invalid-feedback">@error('ug_id') {{ $errors->first('ug_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-3">
						<label class="form-label fw-bold" for="date_hired">Date Hired<span class="text-danger">*</span></label>
						<div class="input-group date" id="">
							<input type="text" class="form-control datehired" id="datehired" name="date_hired" value="{{ old('date_hired', $user->date_hired) }}">
							<span class="input-group-append">
								<span class="input-group-text bg-white d-block">
									<svg class="icon icon-lg">
										<use xlink:href="{{ asset('icons/coreui.svg#cil-calendar') }}"></use>
									</svg>
								</span>
							</span>
						</div>
					</div>
					<div class="col-md-3">
						<label class="form-label fw-bold" for="date_regular">Date Regular (if applicable)</label>
						<div class="input-group date" id="">
							<input type="text" class="form-control dateregular" id="dateregular" name="date_regular" value="{{ old('date_regular', $user->date_regular) }}">
							<span class="input-group-append">
								<span class="input-group-text bg-white d-block">
									<svg class="icon icon-lg">
										<use xlink:href="{{ asset('icons/coreui.svg#cil-calendar') }}"></use>
									</svg>
								</span>
							</span>
						</div>
					</div>
					<div class="col-md-3">
						<label class="form-label fw-bold" for="date_separated">Date Separated (if applicable)</label>
						<div class="input-group date" id="">
							<input type="text" class="form-control dateseparated" id="dateseparated" name="date_separated">
							<span class="input-group-append">
								<span class="input-group-text bg-white d-block">
									<svg class="icon icon-lg">
										<use xlink:href="{{ asset('icons/coreui.svg#cil-calendar') }}"></use>
									</svg>
								</span>
							</span>
						</div>
					</div>
					<div class="col-md-3">
						<label class="form-label fw-bold" for="date_separated">Location</label>
						<input placeholder="Location" class="form-control form-control-sm @error('location') is-invalid @enderror" type="text" maxlength="255" name="location" id="location" value="{{ old('location', $user->location) }}" style="">
						<div class="invalid-feedback">@error('location') {{ $errors->first('location') }} @enderror</div>
					</div>
				</div>
				<hr>
				<h4>Supervisory</h4>
				<div class="row">
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="is_id">Immediate Superior</label>
							<select class="form-control form-control-sm @error('is_id') is-invalid @enderror select2" name="is_id">
								<option value="" selected disabled>-- Please select --</option>
								@foreach($supervisories as $visor)
									<option value="{{ $visor->id }}" {{ old('is_id', $user->is_id) == $visor->id ? 'selected' : '' }}>{{ $visor->FullName . "-" . $visor->company->alias ."/". $visor->role->name }}</option>
								@endforeach
							</select>
							<div class="invalid-feedback">@error('is_id') {{ $errors->first('is_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="fr_id">Final Rater</label>
							<select class="form-control form-control-sm @error('fr_id') is-invalid @enderror select2" name="fr_id">
								<option value="" selected disabled>-- Please select --</option>
								@foreach($supervisories as $visor)
									<option value="{{ $visor->id }}" 0>{{ $visor->FullName . "-" . $visor->company->alias ."/". $visor->role->name }}</option>
								@endforeach
							</select>
							<div class="invalid-feedback">@error('fr_id') {{ $errors->first('fr_id') }} @enderror</div>
						</div>
					</div>
				</div>
                <div class="mb-2">
					<div class="form-check mr-4">
						<input class="form-check-input" type="checkbox" value="1" name="u_enabled" id="u_enabled"{{ (old('u_enabled', optional($user)->u_enabled) == 1) ? ' checked="checked"' : ''}}>
						<label class="form-check-label fw-bold" for="u_enabled">Check to enable account</label>
						<br>
						<input class="form-check-input" type="checkbox" value="1" name="u_active" id="u_active"{{ (old('u_active', optional($user)->u_active) == 1) ? ' checked="checked"' : ''}}>
						<label class="form-check-label fw-bold" for="u_active">Active</label>
					</div>
				</div>
				<hr>
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
			format: "yyyy-mm-dd",
			todayBtn: true,
			todayHighlight: true
		});
		$('.dateseparated').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			todayBtn: true,
			todayHighlight: true
		});
		$('.dateregular').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			todayBtn: true,
			todayHighlight: true
		});

		$('.select2').select2({
			theme: "classic"
		});
	});
	</script>
@endsection