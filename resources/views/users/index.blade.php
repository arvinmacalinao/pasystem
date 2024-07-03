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
                    <h4 class="card-title mb-0">Employees</h4>
                    {{-- <div class="small text-body-secondary">January - July 2023</div> --}}
                  </div>
                  <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <a href="{{ route('employee.add') }}" class="btn btn-sm btn-success text-light">
                        <i class="fa fa-plus"></i>
                        Add Employee
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
                                <select class="form-control" name="lev" id="lev">
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
                <!-- Button trigger modal -->  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
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
                        <th class="bg-body-secondary"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $ctr = $rows->firstItem();
                 ?>
                <tbody>
                @foreach ($rows as $row)
                    <tr style="background-color: {{ $row->u_active == 1 ? 'white' : 'grey' }};">
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td>{{ $row->FullName }}</td>
                        <td>{{ $row->company->alias }}</td>
                        <td>{{ $row->group->name }}</td>
                        <td>{{ $row->role->name }}</td>
                        @if($row->u_active == 1)
                        <td  class="project-actions text-right">
                            <a class="btn btn-info btn-sm text-light" href="{{ route('employee.view', ['id' => $row->id]) }}">
                                <i class="fa fa-folder-open"></i>
                                </i>
                                View
                            </a>
                            <a class="btn btn-success btn-sm text-light" href="{{ route('employee.edit', ['id' => $row->id]) }}">
                                <i class="fa fa-pencil"></i>
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm row-delete-btn text-light" href="{{ route('employee.delete', ['id' => $row->id]) }}" data-msg="Delete this item?" data-text="#{{ $row->id }}" title="Delete">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                        @else
                        <td>
                            <a class="btn btn-success btn-sm text-light" href="{{ route('employee.active', ['id' => $row->id]) }}">
                                <i class="fa fa-pencil"></i>
                                </i>
                                Mark as Active
                            </a>
                        </td>
                        @endif
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

