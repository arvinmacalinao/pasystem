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
                    <a href="{{ route('ugroup.add') }}" class="btn btn-sm btn-success text-light">
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
                        <th class="bg-body-secondary">Usergroup Name</th>
                        <th class="bg-body-secondary">Alias</th>
                        <th class="bg-body-secondary">Description</th>
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
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->alias }}</td>
                        <td>{{ $row->description }}</td>
                       
                        <td  class="project-actions text-right">
                            <a class="btn btn-success btn-sm text-light" href="{{ route('ugroup.edit', ['id' => $row->id]) }}">
                                <i class="fa fa-pencil"></i>
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm row-delete-btn text-light" href="{{ route('ugroup.delete', ['id' => $row->id]) }}" data-msg="Delete this item?" data-text="#{{ $row->id }}" title="Delete">
                                <i class="fa fa-trash"></i> Delete
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

