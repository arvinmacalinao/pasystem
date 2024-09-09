@extends('layouts.app')

@section('content')
<!-- This will display any message upon submission. -->
@if(strlen($msg) > 0)
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
    {{ $msg }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <p class="card-text">Team Details</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">User: <strong>{{ $user->FullName }}</strong></li>
                    <li class="list-group-item">Company: <strong>{{ $user->company->name ?? '' }}</strong></li>
                    <li class="list-group-item">Designation: <strong>{{ $user->designation->name ?? '' }}</strong></li>
                    <li class="list-group-item">Date Hired: <strong>{{ $user->date_hired }}</strong></li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Job Grade: <strong>{{ $user->job_level }}</strong></li>
                    <li class="list-group-item">Location: <strong>{{ $user->location }}</strong></li>
                    <li class="list-group-item">Appraisal Period: <strong>{{ $period_id == 1 ? 'Jan-June' : 'July-Dec' }}</strong></li>
                    <li class="list-group-item">Appraisal Year: <strong>{{ $currentYear }}</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
      <h4 class="card-title">Actual Attendace</h4>
    <!-- Content for Attendance -->
    @if($user->job_level != 10)
    <p>CONSOLIDATED RECORDS OF PUNCTUALITY, UNDERTIME, AND UNSCHEDULED LEAVE</p>
    @else
        <p>CONSOLIDATED RECORDS OF AND UNSCHEDULED LEAVE</p>
    @endif
    <form method="POST" action="{{ route('hr.attendance.store', ['id' => $user->id, 'attendance_id' => $attendance_id]) }}" enctype="multipart/form-data">
        @csrf
    @if($user->job_level != 10)
        {{-- PUNCTUALITY RECORD --}}
        <div class="text-center">
            <div class="card text-white bg-secondary mb-3">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h5 class="card-title">PUNCTUALITY RECORD</h5>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-left border border-secondary">
                  <div class="card-body">
                    <h4 class="card-title"><small>REFERENCE OF SCORING </small></h4>
                    <p class="card-text"><small> Note: LATE is defined as coming to work beyond the 
                        required clock-in time or grace period. <br>
                        For Store-based: No grace period
                        For Office-based: 15 minutes grace period</small>
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><small>RANGE IN TERMS OF FREQUENCY</small></th>
                                <th><small>RATINGS</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>0 Late</small></td>
                                <td><small>5</small></td>
                               
                            </tr>
                            <tr>
                                <td><small>1x Frequency</small></td>
                                <td><small>4</small></td>
                            </tr>
                            <tr>
                                <td><small>2x Frequency</small></td>
                                <td><small>3</small></td>
                            </tr>
                            <tr>
                                <td><small>3x Frequency</small></td>
                                <td><small>2</small></td>
                            </tr>
                            <tr>
                                <td><small>4x Frequency</small></td>
                                <td><small>1</small></td>
                            </tr>
                            <tr>
                                <td><small>5x Frequency or more</small></td>
                                <td><small>0</small></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Dropdown to select the starting month -->
                <div class="form-group">
                    <label for="late_start_month"><strong>Select Starting Month:</strong></label>
                    <select class="form-control" id="late_start_month" name="late_start_month" onchange="updateLateMonths()">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <br>
                <table width="100%" class="table table-bordered border-dark text-center">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Rating</th>
                            <th>Disiplinary Action Records</th>
                        </tr>
                    </thead>
                    <tbody id="lateMonthRows">
                        <!-- Rows will be generated here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
        {{-- UNDERTIME RECORD --}}
        <div class="text-center">
            <div class="card text-white bg-secondary mb-3">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h5 class="card-title">UNDERTIME RECORD</h5>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-left border border-secondary">
                  <div class="card-body">
                    <h4 class="card-title"><small>REFERENCE OF SCORING </small></h4>
                    <p class="card-text"><small>Note: UNDERTIME is defined as leaving work before
                        the required clock-out time, without prior 
                        authorization.</small>
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><small>RANGE IN TERMS OF TOTAL MINUTES</small></th>
                                <th><small>RATINGS</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>0 Undertime</small></td>
                                <td><small>5</small></td>
                               
                            </tr>
                            <tr>
                                <td><small>10 Minutes or less</small></td>
                                <td><small>4</small></td>
                            </tr>
                            <tr>
                                <td><small>11 to 30 Minutes</small></td>
                                <td><small>3</small></td>
                            </tr>
                            <tr>
                                <td><small>31 to 45 Minutes</small></td>
                                <td><small>2</small></td>
                            </tr>
                            <tr>
                                <td><small>46 to 60 Minutes</small></td>
                                <td><small>1</small></td>
                            </tr>
                            <tr>
                                <td><small>61 Minutes or more</small></td>
                                <td><small>0</small></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Dropdown to select the starting month -->
                <div class="form-group">
                    <label for="ut_start_month"><strong>Select Starting Month:</strong></label>
                    <select class="form-control" id="ut_start_month" name="ut_start_month" onchange="updateUTMonths()">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <br>
                <table width="100%" class="table table-bordered border-dark text-center">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Rating</th>
                            <th>Disiplinary Action Records</th>
                        </tr>
                    </thead>
                    <tbody id="utMonthRows">
                        <!-- Rows will be generated here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
        {{-- UNSCHEDULE LEAVE RECORD --}}
        <div class="text-center">
            <div class="card text-white bg-secondary mb-3">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h5 class="card-title">UNSCHEDULE LEAVE RECORD</h5>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-left border border-secondary">
                  <div class="card-body">
                    <h4 class="card-title"><small>REFERENCE OF SCORING </small></h4>
                    <p class="card-text"><small> Note: UNSCHEDULED LEAVE pertains to any absence 
                        that is unplanned or no advanced notice. This 
                        includes LWOP or SL but with exemption of SPL. <br>
                        VL should be filed in advance.</small>
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><small>RANGE IN TERMS OF FREQUENCY</small></th>
                                <th><small>RATINGS</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>0 LWOP of SL</small></td>
                                <td><small>5</small></td>
                               
                            </tr>
                            <tr>
                                <td><small>1x Frequency</small></td>
                                <td><small>4</small></td>
                            </tr>
                            <tr>
                                <td><small>2x Frequency</small></td>
                                <td><small>3</small></td>
                            </tr>
                            <tr>
                                <td><small>3x Frequency</small></td>
                                <td><small>2</small></td>
                            </tr>
                            <tr>
                                <td><small>4x Frequency</small></td>
                                <td><small>1</small></td>
                            </tr>
                            <tr>
                                <td><small>5x Frequency or more</small></td>
                                <td><small>0</small></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="ul_start_month"><strong>Select Starting Month:</strong></label>
                    <select class="form-control" id="ul_start_month" name="ul_start_month" onchange="updateULMonths()">
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <br>
                <table width="100%" class="table table-bordered border-dark text-center">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Rating</th>
                            <th>Disiplinary Action Records</th>
                        </tr>
                    </thead>
                    <tbody id="ulMonthRows">
                        <!-- Rows will be generated here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div> 
    @else
        {{-- UNSCHEDULE LEAVE RECORD --}}
        <div class="text-center">
            <div class="card text-white bg-secondary mb-3">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h5 class="card-title">UNSCHEDULE LEAVE RECORD</h5>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-left border border-secondary">
                  <div class="card-body">
                    <h4 class="card-title"><small>REFERENCE OF SCORING </small></h4>
                    <p class="card-text"><small> Note: UNSCHEDULED LEAVE pertains to any absence 
                        that is unplanned or no advanced notice. This 
                        includes LWOP or SL but with exemption of SPL. <br>
                        VL should be filed in advance.</small>
                    </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><small>RANGE IN TERMS OF FREQUENCY</small></th>
                                <th><small>RATINGS</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><small>0 LWOP of SL</small></td>
                                <td><small>5</small></td>
                               
                            </tr>
                            <tr>
                                <td><small>1x Frequency</small></td>
                                <td><small>4</small></td>
                            </tr>
                            <tr>
                                <td><small>2x Frequency</small></td>
                                <td><small>3</small></td>
                            </tr>
                            <tr>
                                <td><small>3x Frequency</small></td>
                                <td><small>2</small></td>
                            </tr>
                            <tr>
                                <td><small>4x Frequency</small></td>
                                <td><small>1</small></td>
                            </tr>
                            <tr>
                                <td><small>5x Frequency or more</small></td>
                                <td><small>0</small></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Dropdown to select the starting month -->
                <div class="form-group">
                    <label for="ul_start_month"><strong>Select Starting Month:</strong></label>
                    <select class="form-control" id="ul_start_month" name="ul_start_month" onchange="updateULMonths()">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <br>
                <table width="100%" class="table table-bordered border-dark text-center">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Rating</th>
                            <th>Disiplinary Action Records</th>
                        </tr>
                    </thead>
                    <tbody id="ulMonthRows">
                        <!-- Rows will be generated here by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div> 
    @endif
    <br>
    <input type="hidden" id="attend_b_rating_score" name="attend_b_rating_score" value="" />
    <div class="d-grid gap-2">
        <input class="btn btn-info text-light" type="submit" name="form-submit" id="form-submit" value="Save">
    </div>
    </form>
    </div>
</div>
@endsection
@section('scripts')
<!-- Script to update the months -->
<script>
    function updateLateMonths() {
        const startMonth = document.getElementById('late_start_month').value;
        const currentYear = new Date().getFullYear();
        const monthRows = document.getElementById('lateMonthRows');
        monthRows.innerHTML = '';

        for (let i = 0; i < 6; i++) {
            const date = new Date(currentYear, startMonth - 1 + i);
            const month = date.toLocaleString('default', { month: 'long' });
            const year = date.getFullYear();
            const row = document.createElement('tr');

            const monthCell = document.createElement('td');
            monthCell.innerHTML = `<small>${month} ${year}</small>`;
            row.appendChild(monthCell);

            const ratingCell = document.createElement('td');
            ratingCell.innerHTML = `<small><input type="number" min="0" max="5" class="form-control" name="late_rating_${i + 1}" aria-describedby="helpId" placeholder="" required></small>`;
            row.appendChild(ratingCell);

            const remarksCell = document.createElement('td');
            remarksCell.innerHTML = `<small><input type="text" class="form-control" name="da_records_late_${i + 1}" aria-describedby="helpId" placeholder="" required></small>`;
            row.appendChild(remarksCell);

            monthRows.appendChild(row);
        }

        const averageRow = document.createElement('tr');
        averageRow.classList.add('table-secondary');
        averageRow.innerHTML = `
            <td><small>Average = Total / 6 Months</small></td>
            <td><small>___ / 6 =</small></td>
            <td><small><input type="hidden" id="late_rating_score" name="late_rating_score" value="" /></small></td>
        `;
        monthRows.appendChild(averageRow);
    }

    // Initialize the table with the default starting month (January)
    updateLateMonths();
</script>
<script>
    function updateUTMonths() {
        const startMonth = document.getElementById('ut_start_month').value;
        const currentYear = new Date().getFullYear();
        const monthRows = document.getElementById('utMonthRows');
        monthRows.innerHTML = '';

        for (let i = 0; i < 6; i++) {
            const date = new Date(currentYear, startMonth - 1 + i);
            const month = date.toLocaleString('default', { month: 'long' });
            const year = date.getFullYear();
            const row = document.createElement('tr');

            const monthCell = document.createElement('td');
            monthCell.innerHTML = `<small>${month} ${year}</small>`;
            row.appendChild(monthCell);

            const ratingCell = document.createElement('td');
            ratingCell.innerHTML = `<small><input type="number" min="0" max="5" class="form-control" name="ut_rating_${i + 1}" aria-describedby="helpId" placeholder="" required></small>`;
            row.appendChild(ratingCell);

            const remarksCell = document.createElement('td');
            remarksCell.innerHTML = `<small><input type="text" class="form-control" name="da_records_ut_${i + 1}" aria-describedby="helpId" placeholder=""></small>`;
            row.appendChild(remarksCell);

            monthRows.appendChild(row);
        }

        const averageRow = document.createElement('tr');
        averageRow.classList.add('table-secondary');
        averageRow.innerHTML = `
            <td><small>Average = Total / 6 Months</small></td>
            <td><small>___ / 6 =</small></td>
            <td><small><input type="hidden" id="ut_rating_score" name="ut_rating_score" value="" /></small></td>
        `;
        monthRows.appendChild(averageRow);
    }

    // Initialize the table with the default starting month (January)
    updateUTMonths();
</script>
<script>
    function updateULMonths() {
        const startMonth = document.getElementById('ul_start_month').value;
        const currentYear = new Date().getFullYear();
        const monthRows = document.getElementById('ulMonthRows');
        monthRows.innerHTML = '';

        for (let i = 0; i < 6; i++) {
            const date = new Date(currentYear, startMonth - 1 + i);
            const month = date.toLocaleString('default', { month: 'long' });
            const year = date.getFullYear();
            const row = document.createElement('tr');

            const monthCell = document.createElement('td');
            monthCell.innerHTML = `<small>${month} ${year}</small>`;
            row.appendChild(monthCell);

            const ratingCell = document.createElement('td');
            ratingCell.innerHTML = `<small><input type="number" min="0" max="5" class="form-control" name="ul_rating_${i + 1}" aria-describedby="helpId" placeholder="" required></small>`;
            row.appendChild(ratingCell);

            const remarksCell = document.createElement('td');
            remarksCell.innerHTML = `<small><input type="text" class="form-control" name="da_records_ul_${i + 1}" aria-describedby="helpId" placeholder=""></small>`;
            row.appendChild(remarksCell);

            monthRows.appendChild(row);
        }

        const averageRow = document.createElement('tr');
        averageRow.classList.add('table-secondary');
        averageRow.innerHTML = `
            <td><small>Average = Total / 6 Months</small></td>
            <td><small>___ / 6 =</small></td>
            <td><small><input type="hidden" id="ul_rating_score" name="ul_rating_score" value="" /></small></td>
        `;
        monthRows.appendChild(averageRow);
    }

    // Initialize the table with the default starting month (January)
    updateULMonths();
</script>
@endsection