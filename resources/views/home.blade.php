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
{{-- <div class="card mb-4">
        <div class="card-header">
        {{ __('Organizational Chart') }}
        </div>
        <div class="card-body"><div class="col-md-12 ms-2 mb-0">
            <img src="{{ asset('images/vinochart.png') }}" width="1260" height="720">
        </div>
    </div>
</div> --}}
<div class="row row-cols-1 row-cols-md-3">
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">No. of Appraisal Done today</h5>
        <p class="card-text">{{ $appraisalsToday }}</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Number of Appraisal Done</h5>
        <p class="card-text">{{ $totalfinalgrade }}</p>
      </div>
    </div>
  </div>
<div class="col-md-12 mb-4">
    <div class="card mb-4">
        <div class="card-header">
            @php
                $currentYear = date('Y');
                $currentMonth = date('m');
            @endphp
            @if($currentMonth >= 7 && $currentMonth <= 12)
                <h3>{{ __('1st Semester Ratings') }} - {{ $currentYear }}</h3>
            @else
                <h3>{{ __('2nd Semester Ratings') }} - {{ $currentYear - 1 }}</h3>
            @endif
        </div>
        <div class="card-body"><div class="col-md-12 ms-2 mb-0">
            <div class="table-responsive">
              <table class="table border mb-0">
                  <thead class="fw-semibold text-nowrap">
                      <tr class="align-middle">
                          <th class="bg-body-secondary">#</th>
                          <th class="bg-body-secondary">Company</th>
                          <th class="bg-body-secondary text-center">No. of Employees to Rate</th>
                          <th class="bg-body-secondary text-center">Rating Details</th>
                          <th class="bg-body-secondary text-center">Last Rating Submitted</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($companies as $index => $company)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $company['name'] }}</td>
                              <td class="text-center">{{ $company['totalEmployees'] }}</td>
                              <td class="">
                                <div class="d-flex flex-column">
                                  <div class="fw-semibold"><span class="text-start">{{ $company['ratedEmployees'] }}/{{ $company['totalEmployees'] }}</span><span class="pull-right">{{ round($company['ratingPercentage'], 2) }}%</span></div>
                                </div>
                                <div class="progress progress-thin mt-2">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $company['ratingPercentage'] }}%" aria-valuenow="{{ round($company['ratingPercentage'], 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                              </td>
                              <td class="text-center">{{ $company['lastRating'] }}</td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
    </div>
</div>
@endsection
