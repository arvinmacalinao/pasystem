@extends('layouts.app')

@section('content')
<!-- This will display any message upon submission. -->
@if(strlen($msg) > 0)
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    {{ $msg }}
</div>
@endif
<!-- End -->
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Job Level') }}
        </div>
        <div class="card-body">
            <img src="{{ asset('images/job_level.jpg') }}" width="1260" height="720">
      </div>
    </div>
@endsection
