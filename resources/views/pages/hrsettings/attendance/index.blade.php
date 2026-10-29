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
                    <h4 class="card-title mb-0">Attendance Encoding - {{ $currentYear }}</h4>
                    {{-- <div class="small text-body-secondary">January - July 2023</div> --}}
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
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Appraisal Year</span>
                            <select class="form-control" name="qyear" id="qyear">
                                @foreach($years as $y)
                                    <option value="{{ $y }}" {{ $currentYear == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
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
                        <th class="bg-body-secondary">Employement Status</th>
                        <th class="bg-body-secondary"></th>
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
                        <td>{{ $row->FullName }}</td>
                        <td>{{ $row->company->alias }}</td>
                        <td>{{ $row->group->name }}</td>
                        <td>{{ $row->designation->name }}</td>
                        <td>{{ $row->status->name }}</td>
                        <td  class="project-actions text-right">
                            <a class="btn btn-info btn-sm text-light" href="{{ route('hr.attendance.view', ['id' => $row->id]) }}">
                                <i class="fa fa-folder-open"></i>
                                </i>
                                View
                            </a>
                            @if($row->es_id == 3)
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning btn-sm dropdown-toggle text-light" data-coreui-toggle="dropdown" aria-expanded="false">
                                      Rate
                                    </button>
                                <ul class="dropdown-menu" style="max-width: 350px;">
                                    <li class="dropdown-item no-hover">
                                        {{-- PERIOD 1 --}}
                                        <h6>Rate 1st Semester (Jan - June {{ $currentYear }})</h6>
                                    
                                        @php
                                            $hasBeenRatedP1 = optional($row->has_been_rated)->where('period_id', 1)->first();
                                        @endphp
                                        @if (!$hasBeenRatedP1)
                                            <a class="btn btn-warning btn-sm text-light" href="{{ route('hr.attendance.rate', ['id' => $row->id, 'period' => 1, 'qyear' => $currentYear]) }}">
                                                <i class="fa fa-pencil"></i> Rate
                                            </a>
                                            @else
                                                <small class="text-primary"><i class="fa fa-check-circle"></i> Appraisal Done</small>
                                            @endif
                                        
                                    </li>
                                    <li class="dropdown-item no-hover">
                                        {{-- PERIOD 1 --}}
                                        <h6>Rate 2nd Semester (July - Dec {{ $currentYear }})</h6>
                                    
                                        @php
                                            $hasBeenRatedP2 = optional($row->has_been_rated)->where('period_id', 2)->first();
                                        @endphp
                                        @if (!$hasBeenRatedP2)
                                            <a class="btn btn-warning btn-sm text-light" href="{{ route('hr.attendance.rate', ['id' => $row->id, 'period' => 2, 'qyear' => $currentYear]) }}">
                                                <i class="fa fa-pencil"></i> Rate
                                            </a>
                                            @else
                                                <small class="text-primary"><i class="fa fa-check-circle"></i> Appraisal Done</small>
                                            @endif
                                        
                                    </li>
                                </ul>
                                </div>
                            @else
                                @if(!$row->has_been_rated)
                                    <a class="btn btn-warning btn-sm text-light" href="{{ route('hr.attendance.rate', ['id' => $row->id, 'period' => 3, 'qyear' => $currentYear]) }}">
                                        <i class="fa fa-pencil"></i> Rate
                                    </a>
                                @endif
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
    </div>
@endsection
@section('scripts')
<script>
	
</script>
@endsection
