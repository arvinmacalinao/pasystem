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
            <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div>
                    <h4 class="card-title mb-0">{{ $data['page'] }}</h4>
                    {{-- <div class="small text-body-secondary">January - July 2023</div> --}}
                  </div>
                  <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    @php
                        $params = request()->only([
                            'qsearch', 'qcomp', 'qug', 'qlevel', 'qstatus', 'qyear', 'qperiod'
                        ]);
                    @endphp
                                    
                    <a href="{{ route('export.complete_rating', $params) }}" class="btn btn-sm btn-success text-light">
                        <i class="fa fa-floppy-disk"></i>
                        Download Excel
                    </a>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ms-2 mb-2">
                <!-- Search engine section -->
                <form class="row row-cols-lg-auto g-2 align-items-center" method="GET" action="{{ url()->current() }}">
                    @csrf
                    <div class="col-auto">
                        <input class="form-control" type="text" placeholder="Search" name="qsearch" id="qsearch" maxlength="255" value="{{ old('search', $search) }}">
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Company</span>
                            <select class="form-control" name="qcomp" id="qcomp">
                                <option value="">-- All --</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" 
                                        {{ old('qcomp', $comp) == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>                            
                        </div>
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Department</span>
                            <select class="form-control" name="qug" id="qug">
                                <option value="">-- All --</option>
                                @foreach($groups as $ugroup)
                                    <option value="{{ $ugroup->id }}" 
                                        {{ old('qug', $ug) == $ugroup->id ? 'selected' : '' }}>
                                        {{ $ugroup->name }}
                                    </option>
                                @endforeach
                            </select>                            
                        </div>
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Job Level</span>
                            <select class="form-control" name="qlevel" id="qlevel">
                                <option value="">-- All --</option>
                                @for($i = 1; $i <= 9; $i++)
                                    <option value="{{ $i }}" 
                                        {{ old('qlevel', $level) == $i ? 'selected' : '' }}>
                                        Level {{ $i }}
                                    </option>
                                @endfor
                            </select>                            
                        </div>
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Status</span>
                            <select class="form-control" name="qstatus" id="qstatus">
                                <option value="">-- All --</option>
                                <option value="1" {{ old('qstatus', $status) == 1 ? 'selected' : '' }}>Probationary</option>
                                <option value="2" {{ old('qstatus', $status) == 2 ? 'selected' : '' }}>Fixed-term</option>
                                <option value="3" {{ old('qstatus', $status) == 3 ? 'selected' : '' }}>Regular</option>
                                <option value="4" {{ old('qstatus', $status) == 4 ? 'selected' : '' }}>Project-based</option>
                            </select>
                        </div>
                    </div>
                    @php
                        $currentYear = now()->year;
                        $startYear = $currentYear - 5;
                        $endYear = $currentYear + 5;
                    @endphp
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Year</span>
                            <select class="form-control" name="qyear" id="qyear">
                                @for($year = $startYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}"
                                        {{ old('qyear', $currentYear - 1) == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Period</span>
                            <select class="form-control" name="qperiod" id="qperiod">
                                <option value="">-- All --</option>
                                <option value="1" {{ old('qperiod', $period) == 1 ? 'selected' : '' }}>1</option>
                                <option value="2" {{ old('qperiod', $period) == 2 ? 'selected' : '' }}>2</option>
                                <option value="3" {{ old('qperiod', $period) == 3 ? 'selected' : '' }}>3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-auto">
                        <input class="btn btn-primary btn-sm" type="submit" name="search-btn" id="search-btn" value="Search">
                    </div>
                </form>  
                <!-- End of search engine section -->
                </div>
                <div class="col-md-12 ms-2 mb-0">
                    <!-- Pagination section -->
                    <div class="d-flex">
                        @include('subviews.pagination', ['rows' => $rows])
                    </div>
                </div>
            </div>
            <table class="table border mb-0">
                <thead class="fw-semibold text-nowrap">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center">#</th>
                        <th class="bg-body-secondary">Name</th>
                        <th class="bg-body-secondary">Company</th>
                        <th class="bg-body-secondary">Department</th>
                        <th class="bg-body-secondary">Position</th>
                        <th class="bg-body-secondary">Period</th>
                        <th class="bg-body-secondary">Status</th>
                        <th class="bg-body-secondary">Final Score</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $ctr = $rows->firstItem();
                 ?>
                <tbody>
                @foreach ($rows as $row)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td>{{ $row->employee->FullName ?? '' }}</td>
                        <td>{{ $row->employee->company->name ?? '' }}</td>
                        <td>{{ $row->employee->group->name ?? '' }}</td>
                        <td>{{ $row->employee->designation->name ?? '' }}</td>
                        <td>{{ $row->period_id ?? '' }}</td>
                        <td>{{ $row->employee->status->name ?? '' }}</td>
                        <td>{{ $row->final_score ?? '' }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
    </div>
@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		
	});
	</script>
@endsection

