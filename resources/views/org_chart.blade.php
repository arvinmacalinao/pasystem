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
@if($user->job_level > 10)
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
            {{ __('Organizational Chart for ' . $company->name) }}
            </div>
                <div class="card-body">
                    @if($company->orgchart_file)
                    <a target="_blank" href="{{ $company->c_orgchart() }}">
                        <img src="{{ $company->c_orgchart() }}" alt="Organizational Chart" class="img-fluid">
                    </a>
                    @else
                        <p>Organizational chart not available.</p>
                    @endif
                </div>
            </div>
    </div>
    @foreach($rows as $ug_id)
        @if($ug_id)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Organizational Chart for ' . $ug_id->usergroups->name ?? '') }}
                    </div>
                    <div class="card-body">
                        @if($ugroup->orgchart_file)
                        <a target="_blank" href="{{ $ugroup->orgchart() }}">
                            <img src="{{ $ugroup->orgchart() }}" alt="Organizational Chart" class="img-fluid">
                        </a>
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
                    <a target="_blank" href="{{ $company->c_orgchart() }}">
                        <img src="{{ $company->c_orgchart() }}" alt="Organizational Chart" class="img-fluid">
                    </a>
                    @else
                    <p>Organizational chart not available.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                {{ __('Organizational Chart for ' . $companyusergrouporgchart->usergroups->name ?? '') }}
            </div>
            <div class="card-body">
                @if($companyusergrouporgchart->orgchart_file)
                        <a target="_blank" href="{{ $companyusergrouporgchart->orgchart() }}">
                            <img src="{{ $companyusergrouporgchart->orgchart() }}" alt="Organizational Chart" class="img-fluid">
                        </a>
                @else
                    <p>Organizational chart not available.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endif
@endsection
