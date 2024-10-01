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
@if($user->job_level < 10)
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
            {{ __('Organizational Chart for ' . $company->name) }}
            </div>
                <div class="card-body">
                    @if($company->orgchart_file)
                    <a href="">
                        <img src="{{ $company->c_orgchart() }}" alt="Organizational Chart" class="img-fluid">
                    </a>
                    @else
                        <p>Organizational chart not available.</p>
                    @endif
                </div>
            </div>
    </div>
    @foreach($rows as $ug_id)
        @php
            // Fetch the UserGroup model based on ug_id
            $ugroup = \App\Models\UserGroup::find($ug_id);
        @endphp

        @if($ugroup)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Organizational Chart for ' . $ugroup->name) }}
                    </div>
                    <div class="card-body">
                        @if($ugroup->orgchart_file)
                            <img src="{{ $ugroup->orgchart() }}" alt="Organizational Chart" class="img-fluid">
                        @else
                            <p>Organizational chart not available.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@else
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Organizational Chart for ' . $company->name) }}
            </div>
            <div class="card-body">
                @if($company->orgchart_file)
                    <img src="{{ $company->c_orgchart() }}" alt="Organizational Chart" class="img-fluid">
                @else
                    <p>Organizational chart not available.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Organizational Chart for ' . $ugroup->name) }}
            </div>
            <div class="card-body">
                @if($ugroup->orgchart_file)
                    <img src="{{ $ugroup->orgchart() }}" alt="Organizational Chart" class="img-fluid">
                @else
                    <p>Organizational chart not available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection
