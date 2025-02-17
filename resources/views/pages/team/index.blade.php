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
                    <h4 class="card-title mb-0">My Subordinate</h4>
                    {{-- <div class="small text-body-secondary">January - July 2023</div> --}}
                  </div>
                  {{-- <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <a href="{{ route('employee.add') }}" class="btn btn-sm btn-success text-light">
                        <i class="fa fa-plus"></i>
                        Add Employee
                    </a>
                  </div> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ms-2 mb-2">
                <!-- Search engine section -->
                    <form class="row row-cols-lg-auto g-2 align-items-center" method="POST" action="{{ url()->current() }}">
                        @csrf
                        <div class="col-auto">
                            <input class="form-control" type="text" placeholder="Search" name="search" id="search" maxlength="255" value="">
                            {{-- {{ old('search', $search) }} --}}
                        </div>
                        <div class="col-auto me-1">
                            <div class="input-group">
                                <span class="input-group-text">Company</span>
                                <select class="form-control" name="reg" id="reg">
                                    <option value="">-- All --</option>
                                    @foreach($companies as $company)
									<option value="{{ $company->c_id }}">{{ $company->name }}</option>
								@endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-auto me-1">
                            <div class="input-group">
                                <span class="input-group-text">Department</span>
                                <select class="form-control" name="sec" id="sec">
                                    <option value="">-- All --</option>
                                    @foreach($groups as $ugroup)
									<option value="{{ $ugroup->ug_id }}" >{{ $ugroup->alias }}</option>
								    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-auto me-1">
                            <div class="input-group">
                                <span class="input-group-text">Job Level</span>
                                <select class="form-control" name="sec" id="sec">
                                    <option value="">-- All --</option>
                                    @for($i = 1; $i <= 9; $i++)
                                        <option value="level {{ $i }}">Level {{ $i }}</option>
                                    @endfor
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
        <div class="table-responsive">  
            <table class="table border mb-0">
                <thead class="fw-semibold text-nowrap">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center">#</th>
                        <th width="15%" class="bg-body-secondary">Name</th>
                        <th width="10%"class="bg-body-secondary">Company</th>
                        <th width="10%" class="bg-body-secondary">Department</th>
                        <th width="10%" class="bg-body-secondary">Designation</th>
                        <th width="10%" class="bg-body-secondary">Employment Status</th>
                        <td width="1%" class="bg-body-secondary"></td>
                        <th width="50%" class="bg-body-secondary"></th>
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
                        <td>{{ $row->FullName ?? '' }}</td>
                        <td>{{ $row->company->name ?? '' }}</td>
                        <td>{{ $row->group->name ?? '' }}</td>
                        <td>{{ $row->designation->name ?? '' }}</td>
                        <td>{{ $row->status->name ?? '' }}</td>
                        <td> 
                            @if($row->has_da)
                            <a href="{{ route('employee.offense.view', ['id' => $row->has_da->id]) }}">
                                <i class="fa fa-exclamation-circle text-warning" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Has Disiplinary Action"></i>
                            </a>
                            @else
                            <span></span>
                            @endif
                        </td>
                        <td  class="project-actions text-right">
                            <!-- Optionally, you can add a message or leave it empty -->
                            <a class="btn btn-info btn-sm text-light" href="{{ route('team.view', ['id' => $row->id]) }}">
                                <i class="fa fa-folder-open"></i>
                                </i>
                                View
                            </a>
                            @if($row->es_id == 3)
                                @if($row->is_final_rater)
                                    @if(!$row->immediate_supervisor_rated)
                                            <button type="button" class="btn btn-secondary btn-sm text-light" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Not yet rated by immediate supervisor"><i class="fa fa-pencil"></i> Rate</button>
                                        @else
                                        @if (!$row->has_been_rated)
                                            <a class="btn btn-warning btn-sm text-light" href="{{ route('team.rate', ['id' => $row->id]) }}">
                                                <i class="fa fa-pencil"></i> Rate
                                            </a>
                                            @if ($row->immediate_supervisor_rated)
                                                @if($row->has_attendance)
                                                <a class="btn btn-primary btn-sm text-light" id="" href="{{ route('download.pdf', ['id' => $row->immediate_supervisor_rated->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download List"><span class="fa fa-floppy-o"></span> View Rating of {{ $row->immediate_supervisor_rated->evaluator->first_name ?? '' }}</a>
                                                @endif
                                                <a class="btn btn-success btn-sm text-light" onclick="openModal({{ $row->id }})">
                                                    <i class="fa fa-copy"></i> Copy Rating of {{ $row->immediate_supervisor_rated->evaluator->first_name ?? '' }}
                                                </a>
                                            @endif
                                        @else
                                            <small class="text-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Appraisal Done</small>
                                        @endif
                                    @endif
                                @else
                                        @if (!$row->has_been_rated)
                                            <a class="btn btn-warning btn-sm text-light" href="{{ route('team.rate', ['id' => $row->id]) }}">
                                                <i class="fa fa-pencil"></i> Rate
                                            </a>
                                            @if ($row->immediate_supervisor_rated1)
                                            <a class="btn btn-success btn-sm text-light" onclick="openModal({{ $row->id }})">
                                                <i class="fa fa-copy"></i> Copy Rating of {{ $row->immediate_supervisor_rated->evaluator->first_name ?? '' }}
                                            </a>
                                            @endif
                                        @else
                                            <small class="text-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Appraisal Done</small>
                                        @endif
                                @endif
                            @else         
                                @if($row->forevaluation)
                                    @if($row->is_final_rater1)
                                        @if(!$row->immediate_supervisor_rated1)
                                                <button type="button" class="btn btn-secondary btn-sm text-light" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Not yet rated by immediate supervisor"><i class="fa fa-pencil"></i> Rate</button>
                                            @else
                                            @if (!$row->has_been_rated1)
                                                <a class="btn btn-warning btn-sm text-light" href="{{ route('team.rate', ['id' => $row->id]) }}">
                                                    <i class="fa fa-pencil"></i> Rate
                                                </a>
                                                @if ($row->immediate_supervisor_rated1)
                                                    @if($row->has_attendance)
                                                <a class="btn btn-primary btn-sm text-light" id="" href="{{ route('download.pdf', ['id' => $row->immediate_supervisor_rated1->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download List"><span class="fa fa-floppy-o"></span> View Rating of {{ $row->immediate_supervisor_rated->evaluator->first_name ?? '' }}</a>
                                                    @endif
                                                    <a class="btn btn-success btn-sm text-light" onclick="openModal({{ $row->id }})">
                                                        <i class="fa fa-copy"></i> Copy Rating of {{ $row->immediate_supervisor_rated1->evaluator->first_name ?? '' }}
                                                    </a>
                                                @endif
                                            @else
                                                <small class="text-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Appraisal Done</small>
                                            @endif
                                        @endif
                                    @else
                                            @if (!$row->has_been_rated1)
                                                <a class="btn btn-warning btn-sm text-light" href="{{ route('team.rate', ['id' => $row->id]) }}">
                                                    <i class="fa fa-pencil"></i> Rate
                                                </a>
                                                @if ($row->immediate_supervisor_rated1)
                                                <a class="btn btn-success btn-sm text-light" onclick="openModal({{ $row->id }})">
                                                    <i class="fa fa-copy"></i> Copy Rating of {{ $row->immediate_supervisor_rated1->evaluator->first_name ?? '' }}
                                                </a>
                                                @endif
                                            @else
                                                <small class="text-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Appraisal Done</small>
                                            @endif
                                    @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                </tbody>
                @if ($row->immediate_supervisor_rated1)
                <div class="modal fade" id="copyRatingModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="copyRatingModalLabel-{{ $row->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="copyRatingModalLabel-{{ $row->id }}">Copy Rating Confirmation</h5>
                                <button type="button" class="close" data-coreui-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('team.copy.rating', ['id' => $row->immediate_supervisor_rated1->id]) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="evaluator_recommendation"><strong>EVALUATOR’S RECOMMENDATION / GENERAL ASSESSMENT</strong></label>
                                        <textarea class="form-control" name="evaluator_recommendation" id="evaluator_recommendation" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Copy and Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @elseif($row->immediate_supervisor_rated)
                <div class="modal fade" id="copyRatingModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="copyRatingModalLabel-{{ $row->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="copyRatingModalLabel-{{ $row->id }}">Copy Rating Confirmation</h5>
                                <button type="button" class="close" data-coreui-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('team.copy.rating', ['id' => $row->immediate_supervisor_rated->id]) }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="evaluator_recommendation"><strong>EVALUATOR’S RECOMMENDATION / GENERAL ASSESSMENT</strong></label>
                                        <textarea class="form-control" name="evaluator_recommendation" id="evaluator_recommendation" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Copy and Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function openModal(id) {
        // Use jQuery to open the modal by its ID
        $('#copyRatingModal-' + id).modal('show');
    }
</script>
@endsection
