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
				<a class="btn btn-primary btn-sm" href="{{ route('ugroup.orgchart.index') }}" title="Back"><span class="fa fa-caret-left"></span> Back</a>
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
			<form method="POST" action="{{ route('ugroup.orgchart.store', ['id' => $id]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="ug_id">Department<span class="text-danger">*</span></label>
							<select class="form-control form-control-sm @error('ug_id') is-invalid @enderror select2" name="ug_id" required>
								<option value="" selected disabled>-- Please select --</option>
								@foreach($groups as $group)
									<option value="{{ $group->id }}" {{ old('ug_id', $ugrouporgchart->ug_id) == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
								@endforeach
							</select>
							<div class="invalid-feedback">@error('ug_id') {{ $errors->first('ug_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="c_id">Company<span class="text-danger">*</span></label>
							<select class="form-control form-control-sm select2 @error('c_id') is-invalid @enderror" name="c_id" required>
								<option value="" selected disabled>-- Please select --</option>
								@foreach($companies as $company)
									<option value="{{ $company->id }}" {{ old('c_id', $ugrouporgchart->c_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
								@endforeach
							</select>					
							<div class="invalid-feedback">@error('c_id') {{ $errors->first('c_id') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-12">
						<label class="form-label fw-bold" for="	orgchart_file" >Org Chart</label>
						<input class="form-control form-control-sm  @error('orgchart_file') is-invalid @enderror" type="file" id="orgchart_file" name="orgchart_file">
						<div class="invalid-feedback">@error('orgchart_file') {{ $errors->first('orgchart_file') }} @enderror</div>
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
		$('.select2').select2({
			theme: "classic"
		});
	});
	</script>
@endsection