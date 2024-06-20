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
        <p class="card-text">Employee Details</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">User: <strong>{{ $user->FullName }}</strong></li>
        <li class="list-group-item">Role: <strong>{{ $user->role->name }}</strong></li>
        <li class="list-group-item">Location: <strong>{{ $user->location }}</strong></li>
    </ul>
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
                <table class="table border border-secondary text-center">
                    <thead>
                        <tr>
                            <th><small>Month 2024</small></th>
                            <th width="30%"><small>Actual Rating</small></th>
                            <th width="30%"><small>Tardiness Disciplinary Action Records</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Get the current month and year
                            $currentMonth = date('m');
                            $currentYear = date('Y');
            
                            // Determine the starting month based on the current period
                            $startMonth = ($currentMonth <= 6) ? 1 : 7;
            
                            // Generate rows for each month
                            for ($i = $startMonth; $i <= $startMonth + 5; $i++) {
                                // Calculate the month and year
                                $month = date('M', mktime(0, 0, 0, $i, 1));
                                $year = ($i <= 6) ? $currentYear : $currentYear - 1;
            
                                echo '<tr>';
                                echo '<td><small>' . $month . ' ' . $year . '</small></td>';
                                echo '<td><small><input type="number"  min="0" max="5" class="form-control" name="late_rating_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder="" required></small></td>';
                                echo '<td><small><input type="text" class="form-control" name="da_records_late_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder=""></small></td>';
                                echo '</tr>';
                            }
                        ?>
                        <tr class="table-secondary">
                            <td><small>Average = Total / 6 Months</small></td>
                            <td><small>___ / 6 =</small></td>
                            <td><small><input type="hidden" id="late_rating_score" name="late_rating_score" value="" /></small></td>
                        </tr>
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
                <table class="table border border-secondary text-center">
                    <thead>
                        <tr>
                            <th><small>Month 2024</small></th>
                            <th width="30%"><small>Actual Rating</small></th>
                            <th width="30%"><small>Undertime Disciplinary Action Records</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Get the current month and year
                            $currentMonth = date('m');
                            $currentYear = date('Y');
            
                            // Determine the starting month based on the current period
                            $startMonth = ($currentMonth <= 6) ? 1 : 7;
            
                            // Generate rows for each month
                            for ($i = $startMonth; $i <= $startMonth + 5; $i++) {
                                // Calculate the month and year
                                $month = date('M', mktime(0, 0, 0, $i, 1));
                                $year = ($i <= 6) ? $currentYear : $currentYear - 1;
            
                                echo '<tr>';
                                echo '<td><small>' . $month . ' ' . $year . '</small></td>';
                                echo '<td><small><input type="number"  min="0" max="5" class="form-control" name="ut_rating_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder="" required></small></td>';
                                echo '<td><small><input type="text" class="form-control" name="da_records_ut_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder=""></small></td>';
                                echo '</tr>';
                            }
                        ?>
                        <tr class="table-secondary">
                            <td><small>Average = Total / 6 Months</small></td>
                            <td><small>___ / 6 =</small></td>
                            <td><small><input type="hidden" id="ut_rating_score" name="ut_rating_score" value="" /></small></td>
                        </tr>
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
                <table class="table border border-secondary text-center">
                    <thead>
                        <tr>
                            <th><small>Month 2024</small></th>
                            <th width="30%"><small>Actual Rating</small></th>
                            <th width="30%"><small>Unscheduled Leave Disciplinary Action Records</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Get the current month and year
                            $currentMonth = date('m');
                            $currentYear = date('Y');
            
                            // Determine the starting month based on the current period
                            $startMonth = ($currentMonth <= 6) ? 1 : 7;
            
                            // Generate rows for each month
                            for ($i = $startMonth; $i <= $startMonth + 5; $i++) {
                                // Calculate the month and year
                                $month = date('M', mktime(0, 0, 0, $i, 1));
                                $year = ($i <= 6) ? $currentYear : $currentYear - 1;
            
                                echo '<tr>';
                                echo '<td><small>' . $month . ' ' . $year . '</small></td>';
                                echo '<td><small><input type="number" min="0" max="5" class="form-control" name="ul_rating_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder="" required></small></td>';
                                echo '<td><small><input type="text" class="form-control" name="da_records_ul_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder=""></small></td>';
                                echo '</tr>';
                            }
                        ?>
                        <tr class="table-secondary">
                            <td><small>Average = Total / 6 Months</small></td>
                            <td><small>___ / 6 =</small></td>
                            <td><small><input type="hidden" id="ul  _rating_score" name="ul_rating_score" value="" /></small></td>
                        </tr>
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
                <table class="table border border-secondary text-center">
                    <thead>
                        <tr>
                            <th><small>Month 2024</small></th>
                            <th width="30%"><small>Actual Rating</small></th>
                            <th width="30%"><small>Unscheduled Leave Disciplinary Action Records</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Get the current month and year
                            $currentMonth = date('m');
                            $currentYear = date('Y');
            
                            // Determine the starting month based on the current period
                            $startMonth = ($currentMonth <= 6) ? 1 : 7;
            
                            // Generate rows for each month
                            for ($i = $startMonth; $i <= $startMonth + 5; $i++) {
                                // Calculate the month and year
                                $month = date('M', mktime(0, 0, 0, $i, 1));
                                $year = ($i <= 6) ? $currentYear : $currentYear - 1;
            
                                echo '<tr>';
                                echo '<td><small>' . $month . ' ' . $year . '</small></td>';
                                echo '<td><small><input type="number" min="0" max="5" class="form-control" name="ul_rating_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder="" required></small></td>';
                                echo '<td><small><input type="text" class="form-control" name="da_records_ul_' . ($i - $startMonth + 1) . '" aria-describedby="helpId" placeholder=""></small></td>';
                                echo '</tr>';
                            }
                        ?>
                        <tr class="table-secondary">
                            <td><small>Average = Total / 6 Months</small></td>
                            <td><small>___ / 6 =</small></td>
                            <td><small></small></td>
                        </tr>
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
<script>
   
</script>
@endsection