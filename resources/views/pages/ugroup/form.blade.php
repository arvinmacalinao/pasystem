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
				<a class="btn btn-primary btn-sm" href="{{ route('ugroup.index') }}" title="Back"><span class="fa fa-caret-left"></span> Back</a>
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
			<form method="POST" action="{{ route('ugroup.store', ['id' => $id]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="name">Name<span class="text-danger">*</span></label>
							<input placeholder="Name" class="form-control form-control-sm @error('name') is-invalid @enderror" type="text" maxlength="255" name="name" id="name" value="{{ old('name', $ugroup->name) }}" style="">
							<div class="invalid-feedback">@error('name') {{ $errors->first('name') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-2">
							<label class="form-label fw-bold" for="alias">Alias<span class="text-danger">*</span></label>
							<input placeholder="Alias" class="form-control form-control-sm @error('alias') is-invalid @enderror" type="text" maxlength="255" name="alias" id="alias" value="{{ old('alias', $ugroup->alias) }}" style="">
							<div class="invalid-feedback">@error('alias') {{ $errors->first('alias') }} @enderror</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-2">
							<label for="description"><strong>Description</strong></label>
							<textarea class="form-control" name="description" id="description" rows="3">{{ old('name', $ugroup->name) }}</textarea>
						</div>
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
	
	</script>
@endsection