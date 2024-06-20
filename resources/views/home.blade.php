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
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">
          <div class="table-responsive">
              <table class="table border mb-0">
                  <thead class="fw-semibold text-nowrap">
                      <tr class="align-middle">
                          <th class="bg-body-secondary">#</th>
                          <th class="bg-body-secondary">Company</th>
                          <th class="bg-body-secondary text-center">No. of Employees</th>
                          <th class="bg-body-secondary">Ratings Done</th>
                          <th class="bg-body-secondary text-center">Last Rating Submitted</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($companies as $index => $company)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $company['name'] }}</td>
                              <td class="text-center">{{ $company['totalEmployees'] }}</td>
                              <td>
                                <div class="d-flex justify-content-between align-items-baseline">
                                  <div class="fw-semibold">{{ round($company['ratingPercentage']) }}%</div>
                              </div>
                              <div class="progress progress-thin">
                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{ $company['ratingPercentage'] }}%" aria-valuenow="{{ round($company['ratingPercentage']) }}" aria-valuemin="0" aria-valuemax="100"></div>
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
@endsection
