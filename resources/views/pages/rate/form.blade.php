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
    <ul class="list-group list-group-flush">
        <li class="list-group-item">User: <strong>{{ $user->FullName }}</strong></li>
        <li class="list-group-item">Role: <strong>{{ $user->role->name }}</strong></li>
        <li class="list-group-item">Location: <strong>{{ $user->location }}</strong></li>
    </ul>
</div>

    @if($user->job_level >= 1 && $user->job_level <= 3)
        {{-- Rank & File --}}
        @include('pages.rate.subform1')
    @elseif(($user->job_level >= 4 && $user->job_level <= 6))
        {{-- Technical/Professional/Specialist Rank & File Form --}}
        @include('pages.rate.subform2')
    @elseif(($user->job_level >= 7 && $user->job_level <= 8))
        {{-- Technical/Professional/Specialist Rank & File Form --}}
        @include('pages.rate.subform3')
    @elseif(($user->job_level == 9))
    {{-- Technical/Professional/Specialist Rank & File Form --}}
    @include('pages.rate.subform4')
    @elseif(($user->job_level == 10))
    {{-- Technical/Professional/Specialist Rank & File Form --}}
    @include('pages.rate.subform5')
    @endif
@endsection
@section('scripts')
@if($user->job_level >= 1 && $user->job_level <= 3)
<script>
    $(document).ready(function() {
        $('#next-to-job').click(function() {
                $('#nav-quality-tab').click();
            });
        $('#prev-to-job').click(function() {
            $('#nav-job-tab').click();
        });
        $('#next-to-quality').click(function() {
                $('#nav-quantity-tab').click();
            });
        $('#prev-to-quantity').click(function() {
            $('#nav-quality-tab').click();
        });
        $('#next-to-quantity').click(function() {
                $('#nav-initiative-tab').click();
        });
        $('#prev-to-initiative').click(function() {
            $('#nav-quantity-tab').click();
        });
        $('#next-to-initiative').click(function() {
                $('#nav-cooperation-tab').click();
        });
        $('#prev-to-cooperation').click(function() {
            $('#nav-initiative-tab').click();
        });
        $('#next-to-cooperation').click(function() {
                $('#nav-communication-tab').click();
        });
        $('#prev-to-communication').click(function() {
            $('#nav-cooperation-tab').click();
        });
        $('#next-to-communication').click(function() {
                $('#nav-compliance-tab').click();
        });
        $('#prev-to-compliance').click(function() {
            $('#nav-communication-tab').click();
        });
        $('#next-to-compliance').click(function() {
                $('#nav-attendance-tab').click();
        });
        $('#next-to-attendance').click(function() {
                $('#nav-attendanceb-tab').click();
        });
        $('#prev-to-attendance').click(function() {
            $('#nav-compliance-tab').click();
        });
        $('#prev-to-attendanceb').click(function() {
            $('#nav-attendance-tab').click();
        });
    });
</script>

@elseif(($user->job_level >= 4 && $user->job_level <= 6))
<script>
    $(document).ready(function() {
        $('#next-to-job').click(function() {
                $('#nav-quality-tab').click();
            });
        $('#prev-to-job').click(function() {
            $('#nav-job-tab').click();
        });
        $('#next-to-quality').click(function() {
                $('#nav-quantity-tab').click();
            });
        $('#prev-to-quantity').click(function() {
            $('#nav-quality-tab').click();
        });
        $('#next-to-quantity').click(function() {
                $('#nav-problem-tab').click();
        });
        $('#prev-to-problem').click(function() {
            $('#nav-quantity-tab').click();
        });
        $('#next-to-problem').click(function() {
                $('#nav-innovation-tab').click();
        });

        $('#prev-to-innovation').click(function() {
            $('#nav-problem-tab').click();
        });
        $('#next-to-innovation').click(function() {
                $('#nav-teamwork-tab').click();
        });
        $('#prev-to-teamwork').click(function() {
            $('#nav-innovation-tab').click();
        });
        $('#next-to-teamwork').click(function() {
                $('#nav-communication-tab').click();
        });
        $('#prev-to-communication').click(function() {
            $('#nav-innovation-tab').click();
        });
        $('#next-to-communication').click(function() {
                $('#nav-communication-tab').click();
        });
        $('#prev-to-communication').click(function() {
            $('#nav-cooperation-tab').click();
        });
        $('#next-to-communication').click(function() {
                $('#nav-compliance-tab').click();
        });
        $('#prev-to-compliance').click(function() {
            $('#nav-communication-tab').click();
        });
        $('#next-to-compliance').click(function() {
                $('#nav-attendance-tab').click();
        });
        $('#next-to-attendance').click(function() {
                $('#nav-attendanceb-tab').click();
        });
        $('#prev-to-attendance').click(function() {
            $('#nav-compliance-tab').click();
        });
        $('#prev-to-attendanceb').click(function() {
            $('#nav-attendance-tab').click();
        });
    });
</script>

@elseif(($user->job_level >= 7 && $user->job_level <= 8))
<script>
    $(document).ready(function() {
        $('#next-to-job').click(function() {
                $('#nav-quality-tab').click();
            });
        $('#prev-to-job').click(function() {
            $('#nav-job-tab').click();
        });
        $('#next-to-quality').click(function() {
                $('#nav-quantity-tab').click();
            });
        $('#prev-to-quantity').click(function() {
            $('#nav-quality-tab').click();
        });
        $('#next-to-quantity').click(function() {
                $('#nav-people-tab').click();
        });
        $('#prev-to-people').click(function() {
            $('#nav-quantity-tab').click();
        });
        $('#next-to-people').click(function() {
                $('#nav-problem-tab').click();
        });
        $('#prev-to-problem').click(function() {
            $('#nav-people-tab').click();
        });
        $('#next-to-problem').click(function() {
                $('#nav-judgement-tab').click();
        });
        $('#prev-to-judgement').click(function() {
            $('#nav-problem-tab').click();
        });
        $('#next-to-judgement').click(function() {
                $('#nav-leadership-tab').click();
        });
        $('#prev-to-leadership').click(function() {
            $('#nav-judgement-tab').click();
        });
        $('#next-to-leadership').click(function() {
                $('#nav-innovation-tab').click();
        });
        $('#prev-to-innovation').click(function() {
            $('#nav-leadership-tab').click();
        });
        $('#next-to-innovation').click(function() {
                $('#nav-communication-tab').click();
        });
        $('#prev-to-communication').click(function() {
            $('#nav-innovation-tab').click();
        });
        $('#next-to-communication').click(function() {
                $('#nav-compliance-tab').click();
        });
        $('#prev-to-compliance').click(function() {
            $('#nav-communication-tab').click();
        });
        $('#next-to-compliance').click(function() {
                $('#nav-attendance-tab').click();
        });
        $('#next-to-attendance').click(function() {
                $('#nav-attendanceb-tab').click();
        });
        $('#prev-to-attendance').click(function() {
            $('#nav-compliance-tab').click();
        });
        $('#prev-to-attendanceb').click(function() {
            $('#nav-attendance-tab').click();
        });
    });
</script>
@elseif(($user->job_level == 9))
<script>
    $(document).ready(function() {
        $('#next-to-job').click(function() {
                $('#nav-quality-tab').click();
            });
        $('#prev-to-job').click(function() {
            $('#nav-job-tab').click();
        });
        $('#next-to-quality').click(function() {
                $('#nav-quantity-tab').click();
            });
        $('#prev-to-quantity').click(function() {
            $('#nav-quality-tab').click();
        });
        $('#next-to-quantity').click(function() {
                $('#nav-people-tab').click();
        });
        $('#prev-to-people').click(function() {
            $('#nav-quantity-tab').click();
        });
        $('#next-to-people').click(function() {
                $('#nav-problem-tab').click();
        });
        $('#prev-to-problem').click(function() {
            $('#nav-people-tab').click();
        });
        $('#next-to-problem').click(function() {
                $('#nav-judgement-tab').click();
        });
        $('#prev-to-judgement').click(function() {
            $('#nav-problem-tab').click();
        });
        $('#next-to-judgement').click(function() {
                $('#nav-leadership-tab').click();
        });
        $('#prev-to-leadership').click(function() {
            $('#nav-judgement-tab').click();
        });
        $('#next-to-leadership').click(function() {
                $('#nav-innovation-tab').click();
        });
        $('#prev-to-innovation').click(function() {
            $('#nav-leadership-tab').click();
        });
        $('#next-to-innovation').click(function() {
                $('#nav-communication-tab').click();
        });
        $('#prev-to-communication').click(function() {
            $('#nav-innovation-tab').click();
        });
        $('#next-to-communication').click(function() {
                $('#nav-compliance-tab').click();
        });
        $('#prev-to-compliance').click(function() {
            $('#nav-communication-tab').click();
        });
        $('#next-to-compliance').click(function() {
                $('#nav-attendance-tab').click();
        });
        $('#next-to-attendance').click(function() {
                $('#nav-attendanceb-tab').click();
        });
        $('#prev-to-attendance').click(function() {
            $('#nav-compliance-tab').click();
        });
        $('#prev-to-attendanceb').click(function() {
            $('#nav-attendance-tab').click();
        });
    });
</script>
@elseif(($user->job_level == 10))
<script>
    $(document).ready(function() {
        $('#next-to-management').click(function() {
                $('#nav-people-tab').click();
            });
        $('#prev-to-people').click(function() {
            $('#nav-management-tab').click();
        });
        $('#next-to-people').click(function() {
                $('#nav-problem-tab').click();
        });
        $('#prev-to-problem').click(function() {
            $('#nav-people-tab').click();
        });
        $('#next-to-problem').click(function() {
                $('#nav-judgement-tab').click();
        });
        $('#prev-to-judgement').click(function() {
            $('#nav-problem-tab').click();
        });
        $('#next-to-judgement').click(function() {
                $('#nav-leadership-tab').click();
        });
        $('#prev-to-leadership').click(function() {
            $('#nav-judgement-tab').click();
        });
        $('#next-to-leadership').click(function() {
                $('#nav-innovation-tab').click();
        });
        $('#prev-to-innovation').click(function() {
            $('#nav-leadership-tab').click();
        });
        $('#next-to-innovation').click(function() {
                $('#nav-compliance-tab').click();
        });
        $('#prev-to-compliance').click(function() {
            $('#nav-innovation-tab').click();
        });
        
    });
</script>
@endif

@endsection