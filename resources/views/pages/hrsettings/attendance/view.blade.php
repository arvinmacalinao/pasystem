@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title mb-2">Team Details</h4>
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
    <div class="card-footer">
        <div class="flex-grow-1">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="card-title mb-2">Ratings</h4>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <a class="btn btn-warning btn-sm" href="{{ route('team.offense.record', ['id' => $employee->id]) }}"><span class="fa fa-exclamation-circle"></span> Disiplinary Actions</a>
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
                            <th class="bg-body-secondary">Year</th>
                            <th class="bg-body-secondary">Period</th>
                            <th class="bg-body-secondary">Grade</th>
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
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format('Y') }}</td>
                            <td>{{ $row->period_id }}</td>
                            <td>{{ $row->attend_b_rating_score }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </div>
    </div>
</div>
@endsection
