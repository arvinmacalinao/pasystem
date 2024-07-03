@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <p class="card-text">Team Details</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">User: <strong>{{ $employee->FullName }}</strong></li>
        <li class="list-group-item">Role: <strong>{{ $employee->role->name }}</strong></li>
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
                            <th class="bg-body-secondary">Semester</th>
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
                            <td>{{ $row->period_id == 1 ? '1st Semester' : '2nd Semester' }}</td>
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
                            <td  class="project-actions text-right">
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
        </div>
    </div>
</div>
@endsection
