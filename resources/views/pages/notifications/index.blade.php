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
                        <th class="bg-body-secondary">#</th>
                        <th class="bg-body-secondary">Title</th>
                        <th class="bg-body-secondary">Message</th>
                        <th class="bg-body-secondary"></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $ctr = $rows->firstItem();
                 ?>
                <tbody>
                    @foreach ($rows as $row)
                        <tr @class(['table-danger' => $row->read_at == null])>
                            <td>{{ $ctr++ }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->message }}</td>
                            <td class="project-actions text-left">
                                @if($row->read_at == null)
                                    <a class="btn btn-info btn-sm text-light" href="{{ route('mark-single-as-read', ['notification' => $row]) }}"  title="Mark as read">
                                        <i class="fas fa-check"></i> Mark as Read
                                    </a>
                                @endif
                            </td>
                        </tr>
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

