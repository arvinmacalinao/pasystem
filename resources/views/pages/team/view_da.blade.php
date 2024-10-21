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
                    <h4 class="card-title mb-2">Record of Disiplinary Action</h4>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}" title=""><span class="fa fa-caret-left"></span> Back</a>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name: <strong>{{ $employee->FullName }}</strong></li>
            <li class="list-group-item">Designation: <strong>{{ $employee->designation->name }}</strong></li>
            <li class="list-group-item">Location: <strong>{{ $employee->location }}</strong></li>
        </ul>
            <div class="row">
                <div class="col-md-12 ms-2 mb-2">
                <!-- Search engine section -->
                    <form class="row row-cols-lg-auto g-2 align-items-center" method="POST" action="{{ url()->current() }}">
                        @csrf
                        <div class="col-auto">
                            <input class="form-control" type="text" placeholder="Search" name="search" id="search" maxlength="255" value="">
                            {{-- {{ old('search', $search) }} --}}
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
                        <th width="15%" class="bg-body-secondary">Date Commited</th>
                        <th class="bg-body-secondary">Type of Offense</th>
                        <th class="bg-body-secondary">Policy Violated</th>
                        <th class="bg-body-secondary">Penalty</th>
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
                        <td>{{ $row->date_committed }}</td>
                        <td>{{ $row->type_of_offense }}</td>
                        <td>{{ $row->policy_violated }}</td>
                        <td>{{ $row->penalty }}</td>
                        <td  class="project-actions text-right">
                            <a class="btn btn-info btn-sm text-light mb-1" href="{{ route('employee.offense.view', ['id' => $row->id]) }}">
                                <i class="fa fa-folder-open"></i>
                                </i>
                                View
                            </a>
                            <a class="btn btn-success btn-sm text-light mb-1" href="{{ $row->eo_file ? asset('storage/eo_docs/' . $row->eo_file) : '#' }}" target="_blank" title="Download" 
                                {{ $row->eo_file ? '' : 'disabled' }}>
                                <span class="fa fa-floppy-o"> </span> Download
                            </a>                            
                        </td>
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

