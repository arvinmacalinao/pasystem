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
    <div class="card-body text-center">
        <img src="{{ asset('images/job_level.jpg') }}" class="responsive-image" alt="Job Level">
    </div>
</div>

<style>
.responsive-image {
    width: 90%;
    height: auto;
    max-width: 100%;
    display: block;
    margin: 0 auto;
}
</style>

@endsection
