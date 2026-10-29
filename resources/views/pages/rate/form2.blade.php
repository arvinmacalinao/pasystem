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
                    <li class="list-group-item">Job Grade: <strong>{{ $user->job_level }} - {{ $user->joblevel->name }}</strong></li>
                    <li class="list-group-item">Location: <strong>{{ $user->location }}</strong></li>
                    @php
                        $startMonth = optional($final_grade->attendance)->start_month;
                        $endMonthRaw = optional($final_grade->attendance)->end_month;

                        // Convert end_month to a valid month using modulo
                        $endMonth = ($endMonthRaw - 1) % 12 + 1;

                        // Get month names
                        $startMonthName = \Carbon\Carbon::create()->month($startMonth)->format('F');
                        $endMonthName = \Carbon\Carbon::create()->month($endMonth)->format('F');
                    @endphp
                    <li class="list-group-item">Appraisal Period: <strong>{{$startMonthName}} - {{$endMonthName}}</strong></li>
                    <li class="list-group-item">Appraisal Year: <strong>{{ $currentYear }}</strong></li>
                    {{-- halt --}}
                    {{-- <li class="list-group-item">Appraisal Year: <strong>{{ $currentYear - 1 }}</strong></li> --}}
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
   document.addEventListener('DOMContentLoaded', function () {
        // Form submission handler
        document.querySelector('form').addEventListener('submit', function(event) {
            // Prevent form submission
            event.preventDefault();

            let hasErrors = false;
            const tabs = document.querySelectorAll('.nav-link');
            const tabContents = document.querySelectorAll('.tab-pane');

            // Clear previous error indicators
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
                console.log("Form is valid, submitting...");
                this.submit();
            } else {
                // Optionally, display a message or focus the first invalid field
                alert('Please fill in all required fields.');
            }
        });
    });
</script>

@endsection