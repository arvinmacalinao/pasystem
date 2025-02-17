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
                    <a href="{{ route('employee.offense.add') }}" class="btn btn-sm btn-success text-light">
                        <i class="fa fa-plus"></i>
                        Add {{ $data['page'] }}
                    </a>
                  </div>
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
                        <th class="bg-body-secondary">Name</th>
                        <th class="bg-body-secondary">Company</th>
                        <th class="bg-body-secondary">Department</th>
                        <th class="bg-body-secondary">Type of Offense</th>
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
                        <td>{{ $row->employee_name }}</td>
                        <td>{{ $row->company }}</td>
                        <td>{{ $row->department }}</td>
                        <td>{{ $row->type_of_offense }}</td>
                        <td  class="project-actions text-right">
                            <a class="btn btn-info btn-sm text-light mb-1" href="{{ route('employee.offense.view', ['id' => $row->id]) }}">
                                <i class="fa fa-folder-open"></i>
                                </i>
                                View
                            </a>
                            <a class="btn btn-success btn-sm text-light mb-1" href="{{ route('employee.offense.edit', ['id' => $row->id]) }}">
                                <i class="fa fa-pencil"></i>
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm row-delete-btn text-light mb-1" href="{{ route('employee.offense.delete', ['id' => $row->id]) }}" data-msg="Delete this item?" data-text="#{{ $row->id }}" title="Delete">
                                <i class="fa fa-trash"></i> Delete
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

