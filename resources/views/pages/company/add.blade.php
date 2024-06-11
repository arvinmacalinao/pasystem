@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12"><h1>{{ $title }}</h2></div>
		<div class="col-md-12">
			<form method="post" class="needs-validation" id="company_form" action="{{ route('company.save') }}/{{ $company->id ?? '' }}" novalidate>
				<div class="row">
					<input type="hidden" name="id" id="id" value="{{ $company->id ?? '' }}"/>
					<div class="col-md-12 mb-3">
						<label class="mb-2">Name</label>
						<input type="text" name="name" id="name" class="form-control " required value="{{ $company->name ?? '' }}" placeholder="Enter name"/>
					</div>
					<div class="col-md-12 mb-3">
						<label class="mb-2">Alias</label>
						<input type="text" name="alias" id="alias" class="form-control " required value="{{ $company->alias ?? '' }}" placeholder="Enter alias"/>
					</div>
					<div class="col-md-12 text-end">
						<button type="submit" class="btn btn-success" id="company_form_btn" >Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	

$("#company_form").on('submit', function(e){
	e.preventDefault();
	let url = $(this).attr('action');
	let formData = $(this).serialize();
	$.ajax({
		type:"POST",
		url:url,
		data:formData,
		dataType:'json',
		beforeSend:function(){
			$('#company_form_btn').prop('disabled', true);
		},
		success:function(response){
			// console.log(response);
			if (response.status == true) {
				swal("Success", response.message, "success");
				setTimeout(function(){
					window.location = "{{ route('company.index') }}";
				}, 1500);
			}else{
				console.log(response);
			}
				validation('company_form', response.error);
				$('#company_form_btn').prop('disabled', false);
		},
		error: function(error){
			$('#company_form_btn').prop('disabled', false);
			console.log(error);
		}
	});
});
</script>
@endsection

