@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('My profile') }}
            <div class="pull-right">
                {{-- {{ route('user.edit', ['id' => $employee->u_id]) }} --}}
                <a class="btn btn-success btn-sm text-light" href="">
                    <i class="fa fa-pencil">
                    </i>
                    Edit Details
                </a>
                <a class="btn btn-primary btn-sm text-light" href="{{ url()->previous() }}" title="Back"><span class="fa fa-caret-left"></span> Back</a>
            </div> 
            <div class="card-body">
                <div class="flex-grow-1">
                    <form>
                        <h4>Personal Details</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="first_name">First Name</label>
                                    <input placeholder="First Name" class="form-control" type="text" maxlength="255" name="first_name" id="first_name" value="{{ $employee->first_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="middle_name">Middle Name</label>
                                    <input placeholder="Middle Name" class="form-control" type="text" maxlength="255" name="middle_name" id="middle_name" value="{{ $employee->middle_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="last_name">Last Name</label>
                                    <input placeholder="Last Name" class="form-control" type="text" maxlength="255" name="last_name" id="last_name" value="{{ $employee->last_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="email">E-mail Address</label>
                                    <input placeholder="E-mail Address" class="form-control" type="text" maxlength="255" name="email" id="email" value="{{ $employee->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <hr>
                        <h4>Account Details</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="username">Username</label>
                                    <input placeholder="Username" class="form-control" type="text" maxlength="255" name="username" id="username" value="{{ $employee->username }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2 dd">
                                    <label class="form-label fw-bold" for="g_id">User Group</label>
                                    <input placeholder="User Group" class="form-control" type="text" maxlength="255" name="g_id" id="g_id" value="{{ $groups ?? '' }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2 dd">
                                    <label class="form-label fw-bold" for="role_id">Position</label>
                                    <input placeholder="Position" class="form-control" type="text" maxlength="255" name="role_id" id="role_id" value="{{ $roles ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-2"></div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
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
                                    <th class="bg-body-secondary">Immediate Supervisor Grade</th>
                                    <th class="bg-body-secondary">Final Rater Grade</th>
                                    <th class="bg-body-secondary">Final Grade</th>
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
                                    <td>{{ $row->period_id == 1 ? '1st Semester' : '2nd Semester' }}</td>
                                    @if($row->appraisal1_score)
                                    <td><small>score:</small> {{ $row->appraisal1_score ?? ''}} <small>
                                        <a class="btn btn-danger btn-sm row-delete-btn text-light" href="{{ route('employee.reset', ['id' => $row->appraisal1_id]) }}">
                                            <i class="fa fa-refresh" aria-hidden="true"></i> Reset
                                        </a>
                                        <br>rated by: {{$row->appraisal1->evaluator->FullName ?? ''}}</small></td>
                                    @endif
                                    @if($row->appraisal2_score)
                                    <td text-center><small>score:</small> {{ $row->appraisal2_score ?? ''}} <small>
                                        <a class="btn btn-danger btn-sm row-delete-btn text-light" href="{{ route('employee.reset', ['id' => $row->appraisal2_id]) }}">
                                            <i class="fa fa-refresh" aria-hidden="true"></i> Reset
                                        </a>
                                        <br>rated by: {{$row->appraisal2->evaluator->FullName ?? ''}}</small>  
                                    </td>
                                    @else
                                    <td><small>Not yet rated</small></td>
                                    @endif
                                    <td>{{ $row->final_score ?? '-'}}</small></td>
                                    <td  class="project-actions text-right">
                                        
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                </div>
            </div>
        </div> 
    </div>
@endsection
