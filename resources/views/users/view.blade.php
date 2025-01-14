@extends('layouts.app')

@section('content')
@if(strlen($msg) > 0)
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    {{ $msg }}
</div>
@endif
    <div class="card mb-4">
        <div class="card-header">
            <div class="pull-right">
                {{-- {{ route('user.edit', ['id' => $employee->u_id]) }} --}}
                <a class="btn btn-primary btn-sm text-light" href="{{ url()->previous() }}" title="Back"><span class="fa fa-caret-left"></span> Back</a>
            </div> 
            <div class="card-body">
                <div class="flex-grow-1">
                    <form>
                        <h4>User Details</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="first_name">Full Name</label>
                                    <input placeholder="First Name" class="form-control" type="text" maxlength="255" name="first_name" id="first_name" value="{{ $employee->FullName }}" readonly>
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
                        <h4>Account Details
                            <div class="pull-right">
                                <a class="btn btn-danger btn-sm text-light" href="{{ route('employee.resetpassword', ['id' => $employee->id]) }}">
                                    <i class="fa fa-refresh">
                                    </i>
                                    Reset Password
                                </a>
                            </div>
                        </h4>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="username">Username</label>
                                    <input placeholder="Username" class="form-control" type="text" maxlength="255" name="username" id="username" value="{{ $employee->username }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label fw-bold" for="password">Password</label>
                                    <input placeholder="Password" class="form-control" type="password" maxlength="255" name="password" id="password" value="{{ $employee->password }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
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
                                    <th class="bg-body-secondary">Review Period</th>
                                    <th class="bg-body-secondary">Immediate Supervisor Grade</th>
                                    @if($employee->fr_id != null)
                                        <th class="bg-body-secondary">Final Rater Grade</th>
                                    @endif
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
                                    <td>{{ $row->appraisal1->period ?? '' }}</td>
                                    @if($row->appraisal1)
                                    <td class="" style="vertical-align: middle"><small>score:</small> {{ $row->appraisal1_score ?? ''}} <small>
                                        <br>rated by: {{$row->appraisal1->evaluator->FullName ?? ''}}</small>
                                        <a class="btn btn-danger btn-sm row-delete-btn text-light" title="Reset Rating" href="{{ route('employee.reset', ['id' => $row->appraisal1_id]) }}">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                        @if($row->employee->job_level < 10)
                                            @if($row->attendance)
                                                <a class="btn btn-info btn-sm text-light" id="" href="{{ route('employee.download.pdf', ['id' => $row->appraisal1_id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Print Ratings"><span class="fa fa fa-print"></span></a>
                                            @endif
                                        @else
                                                <a class="btn btn-info btn-sm text-light" id="" href="{{ route('employee.download.pdf', ['id' => $row->appraisal1_id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Print Ratings"><span class="fa fa fa-print"></span></a>
                                        @endif
                                        @if($row->appraisal1->pa_file != null)
                                            <a class="btn btn-success btn-sm text-light" id="" href="{{ asset('storage/pa_support/' . $row->appraisal1->pa_file) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Supporting Documents"><span class="fa fa fa-save"></span></a>
                                        @endif
                                    </td>
                                    @else
                                        <td><small>Not yet rated</small></td>
                                    @endif
                                    @if($employee->fr_id !== null)
                                        @if($row->appraisal2_id)
                                        {{-- <td text-center><small>score:</small> {{ $row->appraisal2_score ?? ''}} <small>
                                            <br>rated by: {{$row->appraisal2->evaluator->FullName ?? ''}}</small>  
                                            <a class="btn btn-danger btn-sm row-delete-btn text-light" title="Reset Rating" href="{{ route('employee.reset', ['id' => $row->appraisal2_id]) }}">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm text-light" id="" href="{{ route('employee.download.pdf', ['id' => $row->appraisal2_id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Print Ratings"><span class="fa fa fa-print"></span></a>
                                        </td> --}}
                                        <td class="" style="vertical-align: middle"><small>score:</small> {{ $row->appraisal2_score ?? ''}} <small>
                                            <br>rated by: {{$row->appraisal2->evaluator->FullName ?? ''}}</small>
                                            <a class="btn btn-danger btn-sm row-delete-btn text-light" title="Reset Rating" href="{{ route('employee.reset', ['id' => $row->appraisal2_id]) }}">
                                                <i class="fa fa-refresh" aria-hidden="true"></i>
                                            </a>
                                            @if($row->employee->job_level < 10)
                                                @if($row->attendance)
                                                    <a class="btn btn-info btn-sm text-light" id="" href="{{ route('employee.download.pdf', ['id' => $row->appraisal2_id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Print Ratings"><span class="fa fa fa-print"></span></a>
                                                @endif
                                            @else
                                                    <a class="btn btn-info btn-sm text-light" id="" href="{{ route('employee.download.pdf', ['id' => $row->appraisal2_id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Print Ratings"><span class="fa fa fa-print"></span></a>
                                            @endif
                                            @if($row->appraisal2->pa_file != null)
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ asset('storage/pa_support/' . $row->appraisal2->pa_file) }}" name="download-list-btn" class="print-download-btn pr" target="_blank"
                                                title="Download Supporting Documents"><span class="fa fa fa-save"></span></a>
                                            @endif
                                           
                                        </td>   
                                        @else
                                            <td><small>Not yet rated</small></td>
                                        @endif
                                    @endif
                                    <td>{{ $row->final_score ?? '-'}}</small></td>
                                    @if($employee->fr_id == null)
                                        @if($employee->job_level >= 1 && $employee->job_level <= 3)
                                        {{-- Rank & File --}}
                                        @if($row->appraisal1_id !== null && $row->attendance_id !== null)
                                        <td  class="project-actions text-right">
                                            <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                        </td>
                                        @endif
                                        @elseif(($employee->job_level >= 4 && $employee->job_level <= 5))
                                            {{-- Technical/Professional/Specialist Rank & File Form --}}
                                            @if($row->appraisal1_id !== null && $row->attendance_id !== null)
                                            <td  class="project-actions text-right">
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                            </td>
                                            @endif
                                        @elseif(($employee->job_level >= 6 && $employee->job_level <= 7))
                                            {{-- Technical/Professional/Specialist Rank & File Form --}}
                                            @if($row->appraisal1_id !== null && $row->attendance_id !== null)
                                            <td  class="project-actions text-right">
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                            </td>
                                            @endif
                                        @elseif(($employee->job_level >= 8 && $employee->job_level <= 9))
                                        {{-- Technical/Professional/Specialist Rank & File Form --}}
                                        @if($row->appraisal1_id !== null && $row->attendance_id !== null)
                                        <td  class="project-actions text-right">
                                            <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                        </td>
                                        @endif
                                        @elseif(($employee->job_level >= 10 && $employee->job_level <= 11))
                                        {{-- Technical/Professional/Specialist Rank & File Form --}}
                                            @if($row->appraisal1_id !== null)
                                            <td  class="project-actions text-right">
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                            </td>
                                            @endif
                                        @endif
                                    @else
                                        @if($employee->job_level >= 1 && $employee->job_level <= 3)
                                            {{-- Rank & File --}}
                                            @if($row->appraisal2_id !== null && $row->appraisal1_id !== null && $row->attendance_id !== null)
                                            <td  class="project-actions text-right">
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                            </td>
                                            @endif
                                        @elseif(($employee->job_level >= 4 && $employee->job_level <= 5))
                                            {{-- Technical/Professional/Specialist Rank & File Form --}}
                                            @if($row->appraisal2_id !== null && $row->appraisal1_id !== null && $row->attendance_id !== null)
                                            <td  class="project-actions text-right">
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                            </td>
                                            @endif
                                        @elseif(($employee->job_level >= 6 && $employee->job_level <= 7))
                                            {{-- Technical/Professional/Specialist Rank & File Form --}}
                                            @if($row->appraisal2_id !== null && $row->appraisal1_id !== null && $row->attendance_id !== null)
                                            <td  class="project-actions text-right">
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                            </td>
                                            @endif
                                        @elseif(($employee->job_level >= 8 && $employee->job_level <= 9))
                                        {{-- Technical/Professional/Specialist Rank & File Form --}}
                                        @if($row->appraisal2_id !== null && $row->appraisal1_id !== null && $row->attendance_id !== null)
                                        <td  class="project-actions text-right">
                                            <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                        </td>
                                        @endif
                                        @elseif(($employee->job_level >= 10 && $employee->job_level <= 11))
                                        {{-- Technical/Professional/Specialist Rank & File Form --}}
                                            @if($row->appraisal1_id !== null)
                                            <td  class="project-actions text-right">
                                                <a class="btn btn-success btn-sm text-light" id="" href="{{ route('employee.download.excel', ['id' => $row->id]) }}" name="download-list-btn" class="print-download-btn pr" target="_blank" title="Download Matrix"><span class="fa fa-floppy-o"></span></a>
                                            </td>
                                            @endif
                                        @endif
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                </div>
            </div>
        </div> 
    </div>
    {{-- modal --}}
    <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="newUserModalLabel">Password Successfully Reset</h5>
              <button type="button" class="close close-button" aria-label="Close" id="closeModalButton">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Username: <span id="newUsername">{{ session('new_user_credentials.username') }}</span></p>
              <p>Password: <span id="newPassword">{{ session('new_user_credentials.password') }}</span></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="copyCredentials">Copy to Clipboard</button>
              <button type="button" class="btn btn-secondary close-button" id="manualCloseButton">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
<script>
    @if(session('new_user_credentials'))
        $(document).ready(function() {
            $('#newUserModal').modal('show');
        });
    @endif

    document.getElementById('copyCredentials').addEventListener('click', function() {
        var username = document.getElementById('newUsername').textContent;
        var password = document.getElementById('newPassword').textContent;
        var textToCopy = `Username: ${username}\nPassword: ${password}`;

        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(textToCopy).then(function() {
                alert('Credentials copied to clipboard');
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
                alert('Failed to copy credentials to clipboard.');
            });
        } else {
            var tempInput = document.createElement('textarea');
            tempInput.value = textToCopy;
            document.body.appendChild(tempInput);
            tempInput.select();
            try {
                document.execCommand('copy');
                alert('Credentials copied to clipboard');
            } catch (err) {
                console.error('Could not copy text: ', err);
                alert('Failed to copy credentials to clipboard.');
            }
            document.body.removeChild(tempInput);
        }
    });

document.querySelectorAll('.close-button').forEach(function(button) {
    button.addEventListener('click', function() {
        $('#newUserModal').modal('hide');

        fetch('/clear-session', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                console.log('Session cleared');
            } else {
                console.error('Failed to clear session');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
</script>
@endsection