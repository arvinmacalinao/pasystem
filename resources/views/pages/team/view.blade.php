@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <p class="card-text">Team Details</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Name: <strong>{{ $employee->FullName }}</strong></li>
        <li class="list-group-item">Designation: <strong>{{ $employee->designation->name }}</strong></li>
        <li class="list-group-item">Location: <strong>{{ $employee->location }}</strong></li>
    </ul>
    <div class="card-footer">
        <div class="flex-grow-1">
                <h4>Ratings</h4>
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
                            <td>{{ \Carbon\Carbon::parse($row->evaluation_date)->format('Y') }}</td>
                            <td>{{ $row->period }}</td>
                            <td>
                                <?php
                            $appraisal1Score = App\Models\FinalGrade::firstWhere('appraisal1_id', $row->id);
                            $appraisal2Score = App\Models\FinalGrade::firstWhere('appraisal2_id', $row->id);
                            if ($appraisal1Score) {
                                echo $appraisal1Score->appraisal1_score;
                            } elseif ($appraisal2Score) {
                                echo $appraisal2Score->appraisal2_score;
                            } else {
                                echo 'No Score';
                            }
                            ?>
                            </td>
                            @if (!$row->has_attendance)
                            @else
                            <td  class="project-actions text-right">
                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('download.pdf', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download List"><span class="fa fa-floppy-o"></span> Download</a>
                            </td>
                            @endif
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </div>
    </div>
</div>
@endsection
