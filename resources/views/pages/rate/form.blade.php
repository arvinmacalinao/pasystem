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
                    <li class="list-group-item">Company: <strong>{{ $user->role->name }}</strong></li>
                    <li class="list-group-item">Position: <strong>{{ $user->designation->name ?? '' }}</strong></li>
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

    @if($user->job_level >= 1 && $user->job_level <= 3)
        {{-- Rank & File --}}
        @include('pages.rate.subform1')
    @elseif(($user->job_level >= 4 && $user->job_level <= 5))
        {{-- Technical/Professional/Specialist Rank & File Form --}}
        @include('pages.rate.subform2')
    @elseif(($user->job_level >= 6 && $user->job_level <= 7))
        {{-- Supervisors/Senior Supervisors --}}
        @include('pages.rate.subform3')
    @elseif(($user->job_level >= 8 && $user->job_level <= 9))
    {{-- Assistant Managers/Managers --}}
    @include('pages.rate.subform4')
    @elseif(($user->job_level >= 10 && $user->job_level <= 11))
    {{-- Senior Managers and Executives --}}
    @include('pages.rate.subform5')
    @endif
@endsection
@section('scripts')
<script>
     document.querySelector('form').addEventListener('submit', function(event) {
  // Prevent form submission
  event.preventDefault();

  let hasErrors = false;
  const tabs = document.querySelectorAll('.nav-link');
  const tabContents = document.querySelectorAll('.tab-pane');
  
  tabs.forEach(tab => tab.classList.remove('text-danger'));
  tabContents.forEach(content => content.classList.remove('border-danger'));

  // Check each tab for empty required fields
  tabContents.forEach((tabContent, index) => {
    const invalidFields = tabContent.querySelectorAll('input:required:invalid, textarea:required:invalid');
    if (invalidFields.length > 0) {
      hasErrors = true;

      // Highlight the tab with errors
      tabs[index].classList.add('text-danger');

      // Add some indicator to show the field with an error (optional)
      tabContent.classList.add('border-danger');

      // Show the first tab with an error
      if (hasErrors && index === 0) {
        new coreui.Tab(tabs[index]).show();
      }
    }
  });

  // If there are no errors, submit the form
  if (!hasErrors) {
    this.submit();
  } else {
    // Optionally, display a message or focus the first invalid field
    alert('Please fill in all required fields.');
  }
});

</script>
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

@elseif(($user->job_level >= 4 && $user->job_level <= 5))
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

@elseif(($user->job_level >= 6 && $user->job_level <= 7))
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
@elseif(($user->job_level >= 8 && $user->job_level <= 9))
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
@elseif(($user->job_level >= 10 && $user->job_level <= 11))
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