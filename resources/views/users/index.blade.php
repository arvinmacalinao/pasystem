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
                        <input class="form-control" type="text" placeholder="Search" name="qsearch" id="qsearch" maxlength="255" value="{{ old('search', $search) }}">
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Company</span>
                            <select class="form-control" name="qcomp" id="qcomp">
                                <option value="">-- All --</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}"> {{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Department</span>
                            <select class="form-control" name="qug" id="qug">
                                <option value="">-- All --</option>
                                @foreach($groups as $ugroup)
                                    <option value="{{ $ugroup->id }}"> {{ $ugroup->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-auto me-1">
                        <div class="input-group">
                            <span class="input-group-text">Job Level</span>
                            <select class="form-control" name="qlevel" id="qlevel">
                                <option value="">-- All --</option>
                                @for($i = 1; $i <= 9; $i++)
                                    <option value="{{ $i }}"> Level {{ $i }}</option>
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
           {{-- modal --}}
           <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="newUserModalLabel">New User Created</h5>
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
          <div class="table-responsive">
            <table class="table border mb-0">
                <thead class="fw-semibold text-nowrap">
                    <tr class="align-middle">
                        <th class="bg-body-secondary text-center">#</th>
                        <th class="bg-body-secondary">Name</th>
                        <th class="bg-body-secondary">Company</th>
                        <th class="bg-body-secondary">Department</th>
                        <th class="bg-body-secondary">Position</th>
                        <th class="bg-body-secondary">Date Hired</th>
                        <th class="bg-body-secondary">Status</th>
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
                        <td>{{ $row->company->name ?? '' }}</td>
                        <td>{{ $row->group->name ?? '' }}</td>
                        <td>{{ $row->role->name ?? '' }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->date_hired)->format('M-d-Y') }}</td>
                        <td>{{ $row->status->name ?? '' }}</td>
                        @if($row->u_active == 1)
                        <td  class="project-actions text-right">
                            <a class="btn btn-info btn-sm text-light mb-1" href="{{ route('employee.view', ['id' => $row->id]) }}">
                                <i class="fa fa-folder-open"></i>
                                </i>
                                View
                            </a>
                            <a class="btn btn-success btn-sm text-light mb-1" href="{{ route('employee.edit', ['id' => $row->id]) }}">
                                <i class="fa fa-pencil"></i>
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm row-delete-btn text-light mb-1" href="{{ route('employee.delete', ['id' => $row->id]) }}" data-msg="Delete this item?" data-text="#{{ $row->id }}" title="Delete">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                            @if($row->es_id == 3)
                            @else
                            @if($row->force_rate == false)
                                <a class="btn btn-warning btn-sm text-light mb-1" href="{{ route('employee.force_rate', ['id' => $row->id]) }}"  title="Force Rate">
                                <i class="fa fa-check"></i> To Rate
                                </a>
                            @endif
                            @endif
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

