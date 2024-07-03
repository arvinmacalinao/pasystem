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
        @php
        function displayRadioField($name, $values, $selectedValue) {
            foreach ($values as $value => $label) {
                echo '
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="'.$name.'" id="'.$name.'_'.$value.'" value="'.$value.'" '.($selectedValue == $value ? 'checked' : '').' disabled>
                    <label class="form-check-label" for="'.$name.'_'.$value.'">'.$label.'</label>
                </div>';
            }
        }
    @endphp
    <div class="form-group">       
        <label for="expectedOutcome1_1"><strong>1.1. EXPECTED OUTCOME:</strong> Competent in required job knowledge and skills</label>       
        <div class="mb-3">       
            @php
                displayRadioField('jk_rating_1', [
                    3 => 'Demonstrates competency in the skills and knowledge required',
                    5 => 'Demonstrates significant expertise at his/her job because of his/her in-depth knowledge and skills',
                    1 => 'Has not demonstrated that s/he has the skills and knowledge to fulfill the responsibilities of his/her position',
                    4 => 'Demonstrates a high level of competency in the skills and knowledge required',
                    2 => 'Improvement is needed in certain skills and job knowledge'
                ], $performanceAppraisal->appraisalRating->jk_rating_1 ?? null);
            @endphp
        </div>       
    </div>
    
    <div class="form-group">       
        <label for="expectedOutcome1_2"><strong>1.2. EXPECTED OUTCOME:</strong> Exhibits ability to learn and apply new skills</label>       
        <div class="mb-3">       
            @php
                displayRadioField('jk_rating_2', [
                    3 => 'Learns and applies new skills within the expected time period',
                    5 => 'An exceptionally fast learner and able to quickly put new skills to use',
                    1 => 'It takes him/her too long to learn and apply new skills',
                    4 => 'Learns and applies new skills quickly',
                    2 => 'It sometimes takes him/her too long to learn and apply new skills'
                ], $performanceAppraisal->appraisalRating->jk_rating_2 ?? null);
            @endphp
        </div>       
    </div>
    
    <div class="form-group">       
        <label for="expectedOutcome1_3"><strong>1.3. EXPECTED OUTCOME:</strong> Keeps abreast of current developments</label>       
        <div class="mb-3">       
            @php
                displayRadioField('jk_rating_3', [
                    3 => 'Knowledgeable about current developments in his/her field',
                    5 => 'Reads and researches extensively, staying on top of current developments that might impact her field',
                    1 => 'Fails to keep updated about current developments in his/her field',
                    4 => 'Does an excellent job of keeping himself/herself updated about current developments in his/her field',
                    2 => 'Should be more knowledgeable about current developments in his/ her field'
                ], $performanceAppraisal->appraisalRating->jk_rating_3 ?? null);
            @endphp
        </div>       
    </div>
    
    <div class="form-group">       
        <label for="expectedOutcome1_4"><strong>1.4. EXPECTED OUTCOME:</strong> Requires minimal supervision</label>       
        <div class="mb-3">       
            @php
                displayRadioField('jk_rating_4', [
                    3 => 'Works within the normal scope of supervision',
                    5 => 'Performs extremely well with very little, if any, supervision or assistance needed',
                    1 => 'Needs more supervision and assistance than s/he should',
                    4 => 'Needs a minimal amount of supervision to fulfill his/her responsibilities',
                    2 => 'Needs slightly more supervision than s/he should to fulfill his/her responsibilities'
                ], $performanceAppraisal->appraisalRating->jk_rating_4 ?? null);
            @endphp
        </div>       
    </div>
    
    <div class="form-group">       
        <label for="expectedOutcome1_5"><strong>1.5. EXPECTED OUTCOME:</strong> Displays understanding of how job relates to others & uses resources effectively</label>       
        <div class="mb-3">       
            @php
                displayRadioField('jk_rating_5', [
                    3 => 'Displays a good understanding of how his/her job relates to other jobs & effectively uses the resources and tools available',
                    5 => 'Has an extraordinary understanding of his/her job and the jobs of others & skillfully uses resources to maximum use',
                    1 => 'Does not completely understand how his/her job relates to others & s/he ineffectively uses the resources available',
                    4 => 'Has better than usual understanding of how his/her job relates to other jobs & takes advantage of the resources available',
                    2 => 'Would have better results if s/he understands how his/her job relates to others & has difficulty in effectively using the resources'
                ], $performanceAppraisal->appraisalRating->jk_rating_5 ?? null);
            @endphp
        </div>       
    </div>
    
    <div class="form-group">
        <label for="jk_rating_remarks"><strong>Remarks</strong></label>
        <textarea class="form-control" name="jk_rating_remarks" id="jk_rating_remarks" rows="3" disabled>{{ $performanceAppraisal->appraisalRating->jk_rating_remarks ?? '' }}</textarea>
    </div>
    </div>
@endsection
@section('scripts')
<script>
	
</script>
@endsection
