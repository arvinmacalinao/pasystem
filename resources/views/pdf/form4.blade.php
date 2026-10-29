<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Performance Appraisal Form</title>
	@vite('resources/sass/app.scss')
	<link href="{{ asset('pdf/dtr.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body  onload="window.print()">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table style="border:1px solid;" width="100%" class="text-center" id="dtr-table">
					<thead>
						<tr>
							<td width="10" style="border:1px solid;"><img src="{{ asset('logo/ctilogo.png') }}" alt=""></td>
							<td class="text-center"><h3>PERFORMANCE APPRAISAL FORM</h3>
							<h5>(Assistant Managers/Managers)</h5></td>
						</tr>
					</thead>
				</table>
				<table>
					<br>
					<tr>
						<td class="text-left"><h5><strong>NAME OF EMPLOYEE:</strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->name  }}</h5></td>
						<td class="text-left"><h5><strong>NAME OF EVALUATOR: <br></strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->evaluator->FullName ?? '' }}</h5></td>
					</tr>
					<tr>
						<td class="text-end"><h5><strong>POSITION TITLE:</strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->designation  }}</h5></td>
						<td class="text-end"><h5><strong>POSITION TITLE: <br></strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->evaluator->designation->name ?? ''  }}</h5></td>
					</tr>
					<tr>
						<td class="text-end"><h5><strong>REVIEW PERIOD:</strong></h5></td>
						@php
						$currentMonth = date('m');
        				$currentYear = date('Y');

        				if ($currentMonth >= 7 && $currentMonth <= 12) {
        				    $year = $currentYear; // Current year for Period 1 (January-June)
        				} else {
        				    $year = $currentYear - 1 ; // Previous year for Period 2 (July-December)
        				}
						@endphp
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->period }} - {{ $year }}</h5></td>
						<td class="text-end"><h5><strong>DATE EVALUATED:<br></strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ date('M-d-y', strtotime($appraisal->evaluation_date)) }}</h5></td>
					</tr>
				</table>
				<p><strong>Instructions: </strong>Please read the degree of each factor carefully.   Determine which description fits the employee’s performance. Check the corresponding space provided.  Do not be influenced by any single, isolated incident.   Rate each factor independently.  It is essential that you use the factors as defined and not as you may personally interpret them.</p>
				{{-- I --}}
				<table width="100%" class="table table-bordered border-dark text-center" id="dtr-table">
					<thead>
						<th class="table-secondary table-bordered border-dark text-center" colspan="4" class=text-center><strong>ON-THE-JOB PERFORMANCE</strong></th>
					</thead>
					<tbody>
					
					{{-- I --}}
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" width="1%" colspan="2" class=""><h5><strong>I. JOB KNOWLEDGE (10%)</strong></h5></td>
							<td class="text-left text-wrap" colspan="2"><p align="left" class="text-wrap">THE EXTENT OF TECHNICAL PROFICIENCY AND DEGREE OF UNDERSTANDING OF THE TASKS ASSIGNED. EMPLOYEE IS EXPECTED TO UNDERSTAND THE NATURE AND DETAILS OF THE TASKS BY APPLYING HIS/HER COMPETENCIES TO THE JOB.</p></td>
						</tr>
						{{-- 1.1 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.1.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Competent in required job knowledge and skills</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>DEMONSTRATES</strong> competency in the skills and knowledge required</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Demonstrates <strong>SIGNIFICANT EXPERTISE</strong> at his/her job because of his/her in-depth knowledge and skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>HAS NOT DEMONSTRATED</strong> that s/he has the skills and knowledge to fulfill the responsibilities of his/her position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Demonstrates a <strong>HIGH LEVEL OF COMPETENCY</strong> in the skills and knowledge required</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>IMPROVEMENT</strong> is needed in certain skills and job knowledge</td>
						</tr>
						{{-- 1.2 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.2.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Exhibits ability to learn and apply new skills</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Learns and applies new skills within the <strong>EXPECTED TIME PERIOD</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">An <strong>EXCEPTIONALLY FAST LEARNER</strong> and able to quickly put new skills to use</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - It takes him/her <strong>TOO LONG TO LEARN</strong> and apply new skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Learns and applies new skills <strong>QUICKLY</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - It <strong>SOMETIMES TAKES HIM/HER TOO LONG</strong> to learn and apply new skills</td>
						</tr>
						{{-- 1.3 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.3.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Keeps abreast of current developments</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>KNOWLEDGEABLE</strong> about current developments in his/her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Reads and researches <strong>EXTENSIVELY</strong>, staying on top of current developments that might impact her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>FAILS TO KEEP UPDATED</strong> about current developments in his/her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does an <strong>EXCELLENT JOB</strong> of keeping himself/herself updated about current developments in his/her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>SHOULD BE MORE KNOWLEDGEABLE</strong> about current developments in his/her field</td>
						</tr>
						{{-- 1.4 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.4.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Requires minimal supervision</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works within the <strong>NORMAL SCOPE OF SUPERVISION</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Performs <strong>EXTREMELY WELL</strong> with very little, if any, supervision or assistance needed</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>NEEDS MORE SUPERVISION</strong> and assistance than s/he should</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Needs a <strong>MINIMAL AMOUNT OF SUPERVISION</strong> to fulfill his/her responsibilities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Needs <strong>SLIGHTLY MORE SUPERVISION</strong> than s/he should to fulfill his/her responsibilities</td>
						</tr>
						{{-- 1.5 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.5.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Displays understanding of how job relates to others & uses resources effectively</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Displays a <strong>GOOD UNDERSTANDING</strong> of how his/her job relates to other jobs & effectively uses the resources and tools available</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Has an <strong>EXTRAORDINARY UNDERSTANDING</strong> of his/her job and the jobs of others & skillfully uses resources to maximum use</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT COMPLETELY UNDERSTAND</strong> how his/her job relates to others & s/he ineffectively uses the resources available</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>HAS BETTER THAN USUAL UNDERSTANDING</strong> of how his/her job relates to other jobs & takes advantage of the resources available</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>WOULD HAVE BETTER RESULTS</strong> if s/he understands how his/her job relates to others & has difficulty in effectively using the resources</td>
						</tr>
						<tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR <br>THIS AREA:</strong> {{ $ratings->jk_rating_remarks }}</td>
						</tr>	
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark"><strong>AVERAGE RATING FOR THIS AREA:     TOTAL = <u>{{ $ratings->jk_rating_score*5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->jk_rating_score }}</u></strong></td>
						</tr>					
					</tbody>
				</table>

				{{-- II --}}
				<table width="100%" class="table table-bordered border-dark text-center" id="dtr-table">
					<tbody>
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" width="1%" colspan="2" class=""><h5><strong>II. QUALITY OF WORK (10%)</strong></h5></td>
							<td class="text-left text-wrap" colspan="2"><p align="left" class="text-wrap">REFERS TO THE ACCURACY AND THOROUGHNESS OF WORK OUTPUT AND DEPENDABILITY OF RESULTS REGARDLESS OF AMOUNT OF WORK DONE. THE ABILITY TO DO TASKS RIGHT AT THE FIRST TIME.</p></td>
						</tr>
						<tr>
							<td class="text-start" colspan="3"><strong>2.1.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Demonstrates accuracy and thoroughness</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - Work <strong>DOES NOT REFLECT ADEQUATE</strong> attention to accuracy and completeness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">The work s/he produces <strong>MEETS STANDARDS</strong> for accuracy and completeness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Sometimes the work s/he produces is <strong>LESS ACCURATE AND LESS THOROUGH</strong> than his/her position requires</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">The quality of work s/he produces far <strong>EXCEEDS EXPECTATIONS</strong> for accuracy & thoroughness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">The work s/he produces is <strong>USUALLY HIGHLY ACCURATE</strong> and thorough</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>2.2.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Displays commitment to excellence</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - Displays a <strong>LACK OF COMMITMENT</strong> to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>REGULARLY DISPLAYS</strong> his/her commitment to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>COULD DISPLAY MORE COMMITMENT</strong> to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">A <strong>ROLE MODEL</strong> because of his/her dedication and commitment to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Displays a <strong>STRONG DEDICATION AND COMMITMENT</strong> to excellence</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>2.3.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Looks for ways to improve and promote quality</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT ACTIVELY LOOK</strong> for ways to improve quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>LOOKS FOR WAYS</strong> to improve quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>NEEDS TO MORE ACTIVELY LOOK</strong> for ways to improve quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>LEADS THE ORGANIZATION IN LOOKING FOR WAYS</strong> to improve quality and promote quality awareness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>WORKS HARD</strong> to improve quality in his/her own work and promotes quality awareness throughout the organization</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>2.4.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Applies feedback to improve performance</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - The feedback he/she receives about his/her performance is <strong>NOT BEING APPLIED</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>APPLIES THE FEEDBACK</strong> he/she receives to improve his/her performance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>DOESN’T ALWAYS APPLY</strong> the feedback he/she receives to improve performance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>PROACTIVE ABOUT SEEKING FEEDBACK</strong> and using it to improve her performance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>OFTEN ASKS FOR FEEDBACK</strong> and uses it to improve his/her performance</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>2.5.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Monitors own work to ensure quality</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - Does an <strong>UNACCEPTABLE JOB</strong> of monitoring his/her work to ensure quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Monitors his/her work to <strong>MEET QUALITY STANDARDS</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - There are <strong>SOME QUALITY PROBLEMS</strong> because he/she does not adequately monitor his/her work</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Has designed <strong>HIGHLY EFFECTIVE METHODS</strong> for monitoring his/her work to achieve & maintain the highest quality standards</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>CONSISTENTLY AND CAREFULLY MONITORS</strong> his/her work to ensure its quality</td>
						</tr>
						<tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR <br>THIS AREA:</strong> {{ $ratings->quality_rating_remarks }}</td>
						</tr>	
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark"><strong>AVERAGE RATING FOR THIS AREA:     TOTAL = <u>{{ $ratings->quality_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->quality_rating_score }}</u></strong></td>
						</tr>					
					</tbody>
				</table>

				{{-- III --}}
				<table width="100%" class="table table-bordered border-dark text-center" id="dtr-table">
					<tbody>
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" width="1%" colspan="2" class=""><h5><strong>III. QUANTITY OF WORK (10%)</strong></h5></td>
							<td class="text-left text-wrap" colspan="2"><p align="left" class="text-wrap">THE ABILITY TO DELIVER GIVEN VOLUME OF OUTPUT IN A GIVEN TIME AND THE ABILITY TO PRODUCE REQUIRED QUALITY OF OUTPUT WITHIN REASONABLE TIME.</p></td>
						</tr>
						<tr>
							<td class="text-start" colspan="3"><strong>3.1.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Meets productivity standards</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>NOT ALWAYS AS PRODUCTIVE</strong> as expected for his/her job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - Produces <strong>LESS WORK THAN EXPECTED</strong> for his/her job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>USUALLY</strong> produces <strong>MORE WORK</strong> than expected</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Regularly produces a <strong>NORMAL AMOUNT OF WORK</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>REGULARLY EXCEEDS</strong> the amount of work normally expected for this job</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.2.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Completes work in timely manner</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - It <strong>SOMETIMES TAKES HIM/HER LONGER</strong> than satisfactory to complete work and s/he too often misses deadlines</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>WORK IS NOT GETTING DONE</strong> within acceptable time frames</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>OFTEN COMPLETES</strong> his/her work ahead of schedule</td>
						</tr>
						
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Completes his/her work in a <strong>TIMELY MANNER</strong> and <strong>MEETS MOST DEADLINES</strong></td>
						</tr>
						
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>ROUTINELY COMPLETES WORK AHEAD OF TIME</strong>, always meeting his/her deadlines</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.3.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Strives to increase productivity</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>COULD DO MORE TO DEMONSTRATE</strong> his/her commitment to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT DISPLAY MUCH</strong> commitment to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Demonstrates a <strong>STRONG COMMITMENT</strong> to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>DEMONSTRATES</strong> a commitment to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>SETS A GOOD EXAMPLE</strong> to others in his/her dedication to increasing productivity</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.4.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Works quickly</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>WORKS MORE SLOWLY</strong> than the position requires</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - The pace at which s/he works is <strong>NOT ADEQUATE FOR THIS JOB</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works at a <strong>FASTER PACE THAN NORMALLY</strong> expected for the position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>WORKS AT THE PACE EXPECTED</strong> for the position</td>
						</tr>
						
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works at an <strong>EXCEPTIONALLY FAST PACE</strong></td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.5.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Achieves established goals</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>DOES NOT ALWAYS ACHIEVE</strong> his/her established goals</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>TOO OFTEN FAILS</strong> to achieve established goals</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>STRIVES HARD</strong> in the achievement of established goals</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>ACHIEVES</strong> most of his/her established goals</td>
						</tr>	
						
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>CONSISTENTLY PUSHES</strong> himself/herself to achieve and surpass his/her established goals</td>
						</tr>
						<tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->quantity_rating_remarks }}
							</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->quantity_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->quantity_rating_score }}</u></strong>
							</td>
						</tr>						
					</tbody>
				</table>
				
				{{-- IV --}}
				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<!-- PEOPLE-MANAGEMENT -->
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" colspan="2">
								<h5><strong>IV.  PEOPLE MANAGEMENT (10%)</strong></h5>
							</td>
							<td class="" colspan="2">
								<p class="text-start text-wrap">THE DEGREE OF BEING CONCERN TO THE DEVELOPMENT OF SUBORDINATES THROUGH GUIDANCE, COACHING AND TRAINING AND PURSUES ACTION TOWARDS THIS GOAL.</p>
							</td>
						</tr>
				
						<!-- 4.1 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>4.1. EXPECTED OUTCOME: Provides direction and gains compliance</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides clear direction and <strong>HAS LITTLE PROBLEM GAINING COMPLIANCE FROM OTHERS</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - Provides <strong>UNCLEAR DIRECTION</strong> and <strong>HAS DIFFICULTY GAINING COMPLIANCE FROM OTHERS</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>EXCELS AT PROVIDING CLEAR DIRECTION</strong> to others as well as gaining their compliance quickly</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides clear direction and is <strong>USUALLY ABLE TO GAIN COMPLIANCE FROM OTHERS</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>SOMETIMES DOES NOT PROVIDE CLEAR DIRECTION</strong> and gain compliance from others</td>
						</tr>
				
						<!-- 4.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>4.2. EXPECTED OUTCOME: Includes subordinates in planning</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>MAKES SURE</strong> that his/her subordinates are an important part of all planning</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>PROBLEMS OCCUR</strong> because s/he <strong>DOES NOT SUFFICIENTLY INCLUDE</strong> his/her subordinates in planning</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">I<strong>MPLEMENTS PLANNING PROCESSES</strong> that maximize the participation of his/her subordinates to get the best results</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>INCLUDES SUBORDINATES</strong> in most planning</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>NEEDS TO MORE FULLY INCLUDE</strong> his/her subordinates in planning</td>
						</tr>
				
						<!-- 4.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>4.3. EXPECTED OUTCOME: Takes responsibility for subordinates’ activities</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>DOES NOT HESITATE TO TAKE APPROPRIATE RESPONSIBILITY</strong> for his/her subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>FAILS TO ASSUME</strong> appropriate responsibility for subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>MAINTAINS FULL RESPONSIBILITY</strong> for his/her subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>TAKES RESPONSIBILITY</strong> for his/her subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>ASSUMES INSUFFICIENT RESPONSIBILITY</strong> for subordinates’ activities
							</td>
						</tr>
				
						<!-- 4.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>4.4. EXPECTED OUTCOME: Makes self available to subordinates</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>MAKES EVERY EFFORT</strong> to make himself/ herself accessible to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT MAKE HIMSELF/HERSELF ACCESSIBLE</strong> enough to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>SETS A HIGH PRIORITY</strong> on ensuring that s/he is <strong>ALWAYS AVAILABLE</strong> to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>MAKES HIMSELF/HERSELF AVAILABLE</strong> to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - There <strong>HAVE BEEN TIMES</strong> when s/he <strong>DID NOT MAKE HIMSELF/HERSELF AVAILABLE ENOUGH</strong> to subordinates</td>
						</tr>
				
						<!-- 4.5 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>4.5. EXPECTED OUTCOME: Provides regular performance feedback and develops subordinates’ skills and encourages growth</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides <strong>CONSISTENT, VALUABLE PERFORMANCE FEEDBACK</strong> & dedicates considerable effort to develop his/ her subordinates’ skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - Provides <strong>INADEQUATE PERFORMANCE</strong> feedback & <strong>DOES NOT MAKE EFFORTS</strong> to develop the skills of his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>WORKS CLOSELY, PROVIDING PERCEPTIVE AND CONSISTENT FEEDBACK</strong> & has a record for developing the skills of his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides <strong>REGULAR PERFORMANCE FEEDBACK</strong> & works with his/her subordinates to develop their skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Is <strong>INCONSISTENT ABOUT PROVIDING PERFORMANCE FEEDBACK</strong> & spends minimal time developing his/her subordinate’ skills</td>
						</tr>
				
						<!-- Remarks and Average -->
						<tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->pm_rating_remarks }}</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->pm_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->pm_rating_score }}</u></strong>
							</td>
						</tr>
					</tbody>
				</table>

				{{-- V --}}
				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<!-- PROBLEM-SOLVING -->
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" colspan="2">
								<h5><strong>V. PROBLEM-SOLVING (10%)</strong></h5>
							</td>
							<td class="" colspan="2">
								<p class="text-start text-wrap">CAPABILITY IN RECOGNIZING PROBLEM AREAS ENCOUNTERED IN WORK AS WELL AS THE ABILITY TO ESTABLISH APPROPRIATE MEASURES TO RESOLVE THESE PROBLEMS. THE ABILITY TO ANALYZE COMPLEX SITUATIONS AND EMPLOY THE BEST SOLUTION AT HAND.</p>
							</td>
						</tr>
				
						<!-- 5.1 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.1. EXPECTED OUTCOME: Identifies problems in a timely manner</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Identifies most problem situations <strong>WITHIN APPROPRIATE TIME FRAMES</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - Identifies problems in a <strong>LESS THAN TIMELY MANNER</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>SOMETIMES LATE</strong> in identifying that problem situations exist</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>IMMEDIATELY IDENTIFIES</strong> the existence and nature of problems</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Identifies <strong>THE EXISTENCE OF PROBLEMS QUICKLY</strong></td>
						</tr>
				
						<!-- 5.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.2. EXPECTED OUTCOME: Gathers and analyzes information skillfully</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Information gathering and analysis <strong>MEET THE REQUIREMENTS</strong> of his/her position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT DEMONSTRATE THE INFORMATION</strong> gathering and analysis skills needed for his/her position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Information gathering and analysis are <strong>NOT ALWAYS THOROUGH ENOUGH</strong> for his/her position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>EXTREMELY SKILLED</strong> at gathering and analyzing complex information from multiple sources</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>SKILLED AT GATHERING</strong> and analyzing information from multiple sources</td>
						</tr>
				
						<!-- 5.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.3. EXPECTED OUTCOME: Develops alternative solutions</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Most of the time, s/he develops <strong>SEVERAL ALTERNATIVE SOLUTIONS</strong> to problems
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT DEVELOP ADEQUATE ALTERNATIVE</strong> solutions as part of the problem-solving process
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>WOULD BE BETTER AT PROBLEM-SOLVING</strong> if s/he better developed alternative solutions
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>ROUTINELY RESEARCHES ALL OPTIONS</strong>, developing the best alternative solutions
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Addresses problem-solving situations by <strong>ANALYZING OPTIONS AND DEVELOPING SEVERAL ALTERNATIVE SOLUTIONS</strong>
							</td>
						</tr>
				
						<!-- 5.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.5. EXPECTED OUTCOME: Resolves problems in early stages</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>USUALLY RESOLVES OR MINIMIZES</strong> most problems <strong>BEFORE THEY GROW</strong> into larger issues</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>FREQUENTLY, PROBLEMS BECOME LARGER ISSUES</strong> because s/he fails to anticipate and resolve them earlier</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>COULD DO MORE TO ANTICIPATE</strong> and resolve problems before they grow into larger issues</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Using his/her foresight and analytical skills, s/he <strong>QUICKLY RESOLVES PROBLEMS IN THEIR EARLIEST STAGES</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Resolves or minimizes problems by <strong>ADDRESSING THEM IN THEIR EARLY STAGES</strong></td>
						</tr>

						<!-- 5.5 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.5. EXPECTED OUTCOME: Works well in group problem solving situations</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>PARTICIPATES WELL</strong> in group problem solving situations</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>NEEDS TO PARTICIPATE MORE ACTIVELY</strong> in group problem solving situations</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Participation in group problem solving situations <strong>NEEDS TO IMPROVE</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">In group problem solving situations, s/he is <strong>A KEY MEMBER, LISTENING TO ALL PERSPECTIVES</strong> and helping the team come to resolution</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">In group situations, s/he <strong>CONTRIBUTES ACTIVELY TO HELP SOLVE PROBLEMS</strong></td>
						</tr>
						
				
						<!-- Remarks and Average -->
						<tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->ps_rating_remarks }}</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->ps_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->ps_rating_score }}</u></strong>
							</td>
						</tr>
					</tbody>
				</table>
				
				{{-- VI --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section VI. JUDGMENT -->
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>JUDGMENT & DECISION-MAKING (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">THE ABILITY TO GIVE OUT OPINION CONSIDERING ALL ANGLES OF THE SITUATION AND TO ARRIVE AT A DECISION THAT IS WELL-THOUGHT OF MINIMIZING PREJUDICES TO THE COMPANY.</p>
				            </td>
				        </tr>
					
				        <!-- 6.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.1. EXPECTED OUTCOME: Displays willingness to make decisions</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Hesitates in making some decisions on his/her own, <strong>OFTEN REQUIRING MORE ASSISTANCE</strong> than appropriate </td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>CONFIDENTLY MAKES DECISIONS</strong> in all areas of his/her job</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Makes confident decisions in most areas of his/her job</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Frequently, s/he <strong>HAS DIFFICULTY MAKING INDEPENDENT DECISIONS</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>DOES NOT HESITATE TO MAKE DECISIONS</strong> on very challenging matters and has confidence in his/her decision making abilities</td>
				        </tr>
					
				        <!-- 6.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.2. EXPECTED OUTCOME: Exhibits sound and accurate judgment</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Has <strong>TOO OFTEN MADE DECISIONS</strong> that subsequently <strong>RESULTED IN PROBLEMS</strong> because they were not well thought out</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Decisions are <strong>ON TARGET</strong> and reflect his/her reliable, sound judgment skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Decisions are <strong>GENERALLY ACCURATE</strong> and sound</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>LACK OF JUDGMENT</strong> has often resulted in problem situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>SOUND JUDGMENT RESULTS</strong> in decisions that are <strong>CONSISTENTLY ON TARGET</strong> for even the most complicated issues</td>
				        </tr>
					
				        <!-- 6.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.3. EXPECTED OUTCOME: Supports and explains reasoning for decisions</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>SOMETIMES HAS DIFFICULTY</strong> supporting and explaining his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Can <strong>CLEARLY EXPLAIN</strong> the reasoning and provide <strong>GOOD SUPPORT</strong> for his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Can <strong>USUALLY SUPPORT AND EXPLAIN</strong> the reasoning for his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Presents <strong>INADEQUATE SUPPORT</strong> and reasoning for his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>SKILLFULLY PRESENTS</strong> the supporting information and reasoning behind his/her decisions</td>
				        </tr>
					
				        <!-- 6.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.4. EXPECTED OUTCOME: Includes appropriate people in decision making process</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Decision making is <strong>FREQUENTLY LESS THAN EFFECTIVE</strong> because s/he does not include the appropriate people</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>VERIFIES</strong> that the <strong>APPROPRIATE PEOPLE ARE INCLUDED</strong> in the decision- making process</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">In most matters, s/he <strong>INCLUDES THE APPROPRIATE PEOPLE</strong> in the decision- making process</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>EXCLUDES APPROPRIATE PEOPLE</strong> from the decision- making process too often</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>ALWAYS ENSURES</strong> that the appropriate people are included in the decision- making process</td>
				        </tr>
					
				        <!-- 6.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.5. EXPECTED OUTCOME: Makes timely decisions</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>TAKES LONGER</strong> than acceptable to reach a decision</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Can <strong>USUALLY MAKE DECISIONS</strong> even under tight time frames</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Decisions are made in a <strong>TIMELY MANNER</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Takes an <strong>UNACCEPTABLE LENGTH OF TIME</strong> to make decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>CAN BE RELIED UPON TO MAKE DECISIONS</strong> even under the tightest time frames</td>
				        </tr>
					
				        <!-- Remarks and Score -->
				        <tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->judgment_rating_remarks }}
							</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->judgment_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->judgment_rating_score }}</u></strong>
							</td>
						</tr>
				    </tbody>
				</table>

				{{-- VII --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section VII. Leadership -->
						<thead>
							<th class="table-secondary table-bordered border-dark text-center" colspan="4" class=text-center><strong>ON-THE-JOB BEHAVIOR</strong></th>
						</thead>
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>VII. LEADERSHIP (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">ABILITY TO INSPIRE PEERS AND SECURE THEIR COOPERATION TOWARDS A COMMON GOAL.</p>
				            </td>
				        </tr>
					
				        <!-- 7.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>7.1. EXPECTED OUTCOME: Exhibits confidence in self and others</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>WOULD BE A STRONGER LEADER</strong> if s/he exhibited greater confidence in himself/herself as well as in others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>FAILS TO EXHIBIT</strong> the kind of confidence in himself/herself and others that is needed to successfully perform his/her job</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Communicates not only <strong>A STRONG CONFIDENCE</strong> in himself/herself but also a confidence in others that encourages them to perform to their best</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Exhibits an <strong>APPROPRIATE LEVEL OF CONFIDENCE</strong> in himself/herself as well as in others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Exhibits a <strong>HIGH DEGREE OF CONFIDENCE</strong> in himself/herself as well as in others</td>
				        </tr>
					
				        <!-- 7.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>7.2. EXPECTED OUTCOME: Inspires respect and trust</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>UPON OCCASION</strong>, his/her actions have <strong>RESULTED IN A LACK OF RESPECT</strong> and trust from others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Because of his/her actions, <strong>S/HE HAS NOT INSPIRED THE RESPECT</strong> and trust of others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has <strong>EARNED THE RESPECT AND TRUST OF OTHERS</strong> through his/her uncompromising integrity and openness</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Inspires the respect and trust of others through <strong>HIS/HER ACTIONS</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Inspires the respect and trust of others through <strong>HIS/HER OPENNESS AND INTEGRITY</strong></td>
				        </tr>
					
				        <!-- 7.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>7.3. EXPECTED OUTCOME: Reacts well under pressure</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>SOMETIMES REACTS POORLY</strong> in pressure situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>HAS REACTED POORLY</strong> in pressure situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>PROVIDES LEADERSHIP</strong> even when challenged with highly stressful or crisis situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>REACTS WELL</strong> in pressure situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>TOLERATES A GREAT</strong> deal of pressure</td>
				        </tr>
					
				        <!-- 7.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>7.4. EXPECTED OUTCOME: Shows courage to take action</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Has <strong>SHOWN RELUCTANCE</strong> to assume a leadership role when action was needed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>OFTEN HESITATES OR LACKS CONVICTION</strong> when action is needed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When action is needed, s/he is a <strong>NATURAL LEADER</strong> due to his/her <strong>COURAGE AND DECISIVENESS</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When action is needed, s/he shows the <strong>ABILITY TO ASSUME A LEADERSHIP ROLE</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>QUICKLY ASSUMES A STRONG LEADERSHIP</strong> role when action is needed</td>
				        </tr>
					
				        <!-- 7.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>7.5. EXPECTED OUTCOME: Motivates others to perform well</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>HAS NOT ADEQUATELY MOTIVATED</strong> others to perform better</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>HAS NOT DEMONSTRATED</strong> the ability to motivate others to perform better</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>A POWERFUL INFLUENCE UPON OTHERS</strong>, motivating them to perform their best</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>INFLUENCES OTHERS</strong> to perform better</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>EXCELS AT MOTIVATING OTHERS</strong> to perform better</td>
				        </tr>
					
				        <!-- Remarks and Score -->
				        <tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->leadership_rating_remarks }}
							</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->leadership_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->leadership_rating_score }}</u></strong>
							</td>
						</tr>
				    </tbody>
				</table>

				{{-- VIII --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section VIII. Innovation -->
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>VIII. INNOVATION (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">DEGREE OF CREATIVITY MANIFESTED AND ABILITY TO COME UP WITH NEW IDEAS WHICH COULD FACILITATE WORK PROCESS.</p>
				            </td>
				        </tr>

				        <!-- 8.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>8.1. EXPECTED OUTCOME: Displays original thinking and creativity</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>DISPLAYS CREATIVITY</strong> and original thinking in his/her work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>NEEDS TO DISPLAY MORE CREATIVITY</strong> and original thinking to meet the minimum expectations for his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>HAS NOT DISPLAYED ENOUGH CREATIVITY</strong> or original thinking in his/her work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>DISPLAYS BRILLIANCE IN HIS/HER CREATIVITY</strong> and original thinking</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>OFTEN DISPLAYS CREATIVITY</strong> and original thinking <strong>BEYOND THE EXPECTATIONS</strong> for his/her position</td>
				        </tr>
					
				        <!-- 8.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>8.3. EXPECTED OUTCOME: Meets challenges with resourcefulness</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>USUALLY RESOURCEFUL</strong> when faced with unexpected challenges</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>NOT ALWAYS RESOURCEFUL</strong> enough when faced with unexpected challenges</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>DOES NOT SHOW THE NECESSARY RESOURCEFULNESS</strong> when faced with unexpected challenges</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When faced with unexpected challenges, s/he is <strong>EXTREMELY RESOURCEFUL</strong> </td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When faced with unexpected challenges, s/he is <strong>VERY RESOURCEFUL</strong></td>
				        </tr>
					
				        <!-- 8.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>8.3. EXPECTED OUTCOME: Generates suggestions for improving work</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Contributes <strong>USABLE SUGGESTIONS</strong> for improving work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - It <strong>WOULD BE PREFERABLE</strong> if s/he <strong>OFFERED MORE USABLE</strong> suggestions on how to improve work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>RARELY CONTRIBUTES</strong> usable suggestions for improving work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">On a <strong>CONSISTENT BASIS</strong>, s/he contributes <strong>HIGHLY INGENIOUS AND VALUABLE SUGGESTIONS</strong> for improving work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>GENERATES MANY USABLE</strong> and ingenious suggestions for improving work</td>
				        </tr>
					
				        <!-- 8.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>8.4. EXPECTED OUTCOME: Develops innovative approaches and ideas</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has <strong>DEVELOPED INNOVATIVE APPROACHES</strong> and ideas</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Has <strong>NOT DEVELOPED MANY INNOVATIVE APPROACHES</strong> or ideas</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Approaches and ideas have <strong>NOT BEEN INNOVATED ENOUGH</strong> for his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has <strong>PRODUCED INNOVATIVE APPROACHES</strong> and ideas that are <strong>FAR ABOVE THE EXPECTATIONS</strong> for his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has developed some <strong>HIGHLY INNOVATIVE APPROACHES</strong> and ideas</td>
				        </tr>
					
				        <!-- Remarks and Average -->
				        <tr>
				            <td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->inno_rating_remarks }}</td>
				        </tr>
				        <tr>
				            <td colspan="4" class="text-start table-secondary table-bordered border-dark">
				                <strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->inno_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->inno_rating_score }}</u></strong>
				            </td>
				        </tr>
				    </tbody>
				</table>

				{{-- IX --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section IX. Communications -->
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>IX. COMMUNICATIONS (5%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">ABILITY TO RECEIVE AND CONVEY VERBAL AND WRITTEN COMMUNICATION EFFECTIVELY IN A PRECISE AND CONCISE MANNER. EXHIBITS OPENNESS AND SUPPORT TO ALL CHANNELS OF COMMUNICATION.</p>
				            </td>
				        </tr>
					
				        <!-- 9.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>9.1. EXPECTED OUTCOME: Expresses ideas and thoughts verbally</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Displays <strong>EFFECTIVE</strong> verbal communications skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Displays <strong>SUPERIOR VERBAL SKILLS</strong>, communicating clearly, concisely, and in meaningful ways</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>NEEDS TO IMPROVE</strong> his/her verbal communications skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>DOES NOT DISPLAY</strong> the verbal communications skills required</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Displays <strong>VERY GOOD VERBAL SKILLS</strong>, communicating clearly and concisely</td>
				        </tr>
					
				        <!-- 9.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>9.2. EXPECTED OUTCOME: Expresses ideas and thoughts in written form</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Written communications skills <strong>MEET THE REQUIREMENTS</strong> of his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Demonstrates <strong>OUTSTANDING</strong> written communications skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>REQUIRES MORE ASSISTANCE</strong> than desirable to produce written communications that meet the job’s requirements</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Written communications <strong>FALL SHORT</strong> of the quality needed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Demonstrates <strong>EXCELLENT</strong> written communications skills</td>
				        </tr>
					
				        <!-- 9.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>9.3. EXPECTED OUTCOME: Exhibits good listening and comprehension</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>LISTENS AND COMPREHENDS</strong> well</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Listens <strong>CAREFULLY</strong>, asks <strong>PERCEPTIVE</strong> questions, and <strong>QUICKLY COMPREHENDS</strong> new or highly complex matters</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>DOES NOT ALWAYS EXHIBIT</strong> good listening and comprehension skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>DOES NOT EXHIBIT</strong> the listening and comprehension skills <strong>NECESSARY FOR SATISFACTORY</strong> performance of his/her job</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>EXHIBITS GOOD LISTENING</strong> skills and comprehends complex matters well</td>
				        </tr>
					
				        <!-- 9.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>9.4. EXPECTED OUTCOME: Keeps others adequately informed</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Keeps others <strong>ADEQUATELY INFORMED</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>EXTREMELY THOROUGH AND PROACTIVE</strong> about keeping others well informed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Unless reminded, s/he <strong>SOMETIMES FAILS TO KEEP</strong> others adequately informed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>FREQUENTLY FAILS</strong> to keep others adequately informed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>CAREFUL TO KEEP OTHERS INFORMED</strong> in a timely manner</td>
				        </tr>
					
				        <!-- 9.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>9.5. EXPECTED OUTCOME: Selects and uses appropriate communication methods</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>SELECTS APPROPRIATE</strong> methods of communication</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Implements <strong>HIGHLY EFFECTIVE</strong> and often innovative communication methods</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>OCCASIONALLY SELECTS INAPPROPRIATE METHODS</strong> of communication</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>TOO OFTEN</strong> he/she <strong>DOES NOT SELECT OR USE APPROPRIATE</strong> communication methods</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When communicating, s/he is <strong>VERY GOOD AT SELECTING</strong> and using the most effective methods</td>
				        </tr>
					
				        <!-- Remarks and Score -->
				        <tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->comms_rating_remarks }}
							</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->comms_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->comms_rating_score }}</u></strong>
							</td>
						</tr>
				    </tbody>
				</table>

				{{-- X --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section X. Compliance -->
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>X. COMPLIANCE (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">Disposition and effort exerted to observe and comply with company standards, policies, procedures, protocol, work ethics, among others in order to promote order, safety, security, harmony, and to avoid accidents, wastages, losses/damages of company resources/properties, injuries of personnel, among others.</p>
				            </td>
				        </tr>
					
				        <!-- 10.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.1 EXPECTED OUTCOME:</strong> Adheres to Company rules and regulations. Conforms to established policies and procedures.</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>HARDLY COMPLY</strong>, interrogate</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Requires <strong>FREQUENT REMINDER</strong></td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Manifests <strong>SENSITIVITY TO COMPLIANCE</strong> ‘walk-his-talk’ and ‘walk on extra mile’</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>REPRIMANDED FOR SOME VIOLATION</strong>/noncompliance to policies and procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>CONSISTENTLY COMPLY</strong> with company policies and procedures</td>
				        </tr>
					
				        <!-- 10.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.2 EXPECTED OUTCOME:</strong> Observes safety and security procedures</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>ROUTINELY OBSERVES</strong> safety and security procedures</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>A LEADER IN CAREFULLY OBSERVING</strong> and monitoring proper safety and security procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>FAILS TO OBSERVE</strong> proper safety and security procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>CAREFUL ABOUT OBSERVING</strong> safety and security procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>UPON OCCASION, HAS NOT OBSERVED</strong> proper safety and security procedures</td>
				        </tr>
					
				        <!-- 10.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.3 EXPECTED OUTCOME:</strong> Determines appropriate action beyond guidelines</td>
				        </tr> 
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When faced with situations not covered by normal guidelines, he/she <strong>USUALLY ARRIVES AT AN APPROPRIATE ACTION</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Even under very unusual conditions not covered by the normal guidelines, he/she <strong>QUICKLY SIZES UP THE SITUATION</strong> and determines the appropriate action</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - When a situation arises that is not covered by the normal guidelines, he/she <strong>HAS DIFFICULTY DETERMINING </strong>an appropriate action</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>HAS LITTLE DIFFICULTY ARRIVING AT THE MOST APPROPRIATE ACTION</strong> when faced with situations not covered by normal guidelines</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>HAS HAD SOME DIFFICULTY DETERMINING</strong> an appropriate action when faced with a situation outside the normal guidelines</td>
				        </tr>
					
				        <!-- 10.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.4 EXPECTED OUTCOME:</strong> Uses equipment and materials properly</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>PROPERLY</strong> uses equipment and materials</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Pays <strong>EXCEPTIONAL ATTENTION</strong> to ensure proper use of equipment and materials</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Although s/he has been properly trained, he/she has <strong>CREATED UNSAFE SITUATIONS BY MISUSING EQUIPMENT</strong> and materials</td>
				        </tr>
						 <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>TAKES CAREFUL PRECAUTIONS</strong> when using equipment and materials</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - There have been times when s/he <strong>HAD TO BE WARNED ABOUT THE IMPROPER USE OF EQUIPMENT</strong> and materials</td>
				        </tr>
					
				        <!-- 10.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.5 EXPECTED OUTCOME:</strong> Observes proper deportment and decorum – social traits such as disposition, tact, appearance, behavior, and conduct</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Could be <strong>EXPECTED TO PRESENT A BUSINESS-LIKE ATTITUDE</strong> with constant reminders</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Showed <strong>MISDEMEANOR</strong></td>
				        </tr>
				        
				        
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>ROLE MODEL</strong> in terms of grooming and basic corporate ethics</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Demonstrated <strong>TACT AND DILIGENCE</strong></td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>FAILS TO ADHERE</strong> to standards</td>
				        </tr>

						<!-- 10.6 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.6 EXPECTED OUTCOME:</strong> Observes proper interpersonal skills – the ability to work harmoniously with others towards the achievement of goals.</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>NORMALLY TACTFUL, USUALLY</strong> obtains cooperation and respect of others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Occasionally able to get the respect and cooperation of others. <strong>NEEDS TO IMPROVE</strong> relationship with co-workers</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>STRONG FORCE</strong> for office morale. <strong>ALWAYS</strong> obtains cooperation and respect of others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>GETS OUT OF HIS/HER</strong> way to cooperate</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>DISLIKES TO COOPERATE</strong>, cannot work harmoniously with others</td>
				        </tr>

						<!-- 10.7 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.7 EXPECTED OUTCOME:</strong> Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned 
								tasks.</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Has <strong>VERY LOW</strong> regard for work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Possesses <strong>GREAT INTEREST</strong> in work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Displays <strong>LITTLE INTEREST</strong>. Not conscious of doing a good job.</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>EXCEPTIONALLY ENTHUSIASTIC</strong> about work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Shows <strong>MODERATE INTEREST</strong> in work</td>
				        </tr>
					
				        <!-- Average Score -->
				        <tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->comp_rating_remarks }}
							</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->comp_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->comp_rating_score }}</u></strong>
							</td>
						</tr>
				    </tbody>
				</table>

				{{-- XI.A --}}
					<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<!-- Section XI.A Attendance & Punctuality -->
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" colspan="2">
								<h5><strong>XI.A Attendance & Punctuality (2%)</strong></h5>
							</td>
							<td colspan="2">
								<p class="text-start text-wrap">REGULARITY IN ATTENDANCE, PUNCTUALITY IN REPORTING FOR WORK, AND EFFECTIVE MANAGEMENT OF TIME.</p>
							</td>
						</tr>
				
						<!-- 11A.1 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>11A.1 EXPECTED OUTCOME:</strong> Schedules time off in advance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 3) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Before he/she takes time off, s/he <strong>GIVES ADVANCE NOTICE</strong> whenever possible</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>ALWAYS WORKS OUT A MUTUALLY AGREEABLE TIME OFF</strong> schedule with superior and coworkers</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">1 - There have been too many occasions when s/he has <strong>TAKEN TIME OFF WITHOUT PROVIDING ADEQUATE NOTICE</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>USUALLY WORKS OUT TIME OFF</strong> arrangements in advance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>NEEDS TO GIVE MORE ADVANCE NOTICE</strong> before s/he takes time off</td>
						</tr>
				
						<!-- 11A.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>11A.2 EXPECTED OUTCOME:</strong> Begins working on time</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 3) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>USUALLY</strong> begins work on time</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>CONSISTENTLY READY FOR WORK</strong> at the scheduled times</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>BEGINS WORK LATE MORE FREQUENTLY</strong> than acceptable</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>RARELY</strong> begins work late</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>OCCASIONALLY</strong> begins work late</td>
						</tr>
				
						<!-- 11A.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>11A.3 EXPECTED OUTCOME:</strong> Ensures work responsibilities are covered when absent</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 3) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When late or absent, s/he <strong>GENERALLY MAKES SURE</strong> that his/her responsibilities are covered</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When out of the office, s/he <strong>MAKES A SPECIAL EFFORT</strong> to ensure that his/her commitments are met and problems resolved</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When late or absent, <strong>PROBLEMS HAVE OCCURRED</strong> because s/he failed to confirm that his/her responsibilities were adequately covered</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When out of the office, s/he <strong>CONFIRMS THAT HIS/HER RESPONSIBILITIES AND COMMITMENTS ARE MANAGED</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When late or absent, s/he <strong>HAS NOT ALWAYS CONFIRMED</strong> that his/her responsibilities are covered</td>
						</tr>
				
						<!-- 11A.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>11A.4 EXPECTED OUTCOME:</strong> Arrives at meetings and appointments on time</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 3) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>NORMALLY ON TIME</strong> for meetings and appointments</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>SETS A GOOD EXAMPLE</strong> for others by always arriving promptly for meetings and appointments</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Inconveniences others by <strong>BEING LATE FOR MEETINGS</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3"><strong>PROMPT FOR MEETINGS</strong> and appointments</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Inconveniences others by <strong>OFTEN BEING LATE FOR MEETINGS</strong></td>
						</tr>

						<!-- Average Score -->
				        <tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->attend_rating_remarks }}
							</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->attend_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->attend_rating_score }}</u></strong>
							</td>
						</tr>	
					</tbody>
				</table>

				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<tr>
							<td class="text-start table-secondary table-bordered border-dark" colspan="4">
								<h5><strong>EVALUATOR’S RECOMMENDATION / GENERAL ASSESSMENT</strong></h5>
							</td>
						</tr>
						<!-- Evaluator's Recommendation / General Assessment -->
						<tr>
							<td class="text-start" colspan="4" height="100px">
								{{ $ratings->evaluator_recommendation }}
							</td>
						</tr>
						<tr>
							<td width="20%" class="text-start" colspan="" style="border-top">
								Signature Over Printed Name
							</td>
							<td style="border-top: hidden; border-left: hidden">

							</td>
						</tr>
						<tr>
							<td class="text-start" colspan="4" style="border-top: hidden">Date:_______________________________</td>
						</tr>
						<tr>
							<td class="text-start table-secondary table-bordered border-dark" colspan="4">
								<h5><strong>EMPLOYEE’S COMMENTS</strong></h5>
							</td>
						</tr>
						<!-- Evaluator's Recommendation / General Assessment -->
						<tr>
							<td colspan="4" height="100px">
								
							</td>
						</tr>
						<tr>
							<td width="20%" class="text-start" colspan="" style="border-top">
								Signature Over Printed Name
							</td>
							<td style="border-top: hidden; border-left: hidden">

							</td>
						</tr>
						<tr>
							<td class="text-start" colspan="4" style="border-top: hidden">Date:_______________________________</td>
						</tr>
					</tbody>
				</table>
				@if($attendance)
				<table>
					<table width="100%" class="table table-bordered border-dark text-center">
						<tbody>
							<tr>
								<td class="text-left table-secondary table-bordered border-dark" colspan="2">
									<h5><strong>XI.B ACTUAL RECORDS OF HRD (3%)</strong></h5>
								</td>
								<td colspan="3">
									<p class="text-start text-wrap">CONSOLIDATED RECORDS OF PUNCTUALITY, UNDERTIME, AND UNSCHEDULED LEAVE</p>
								</td>
							</tr>
						</tbody>
				</table>
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <tr>
				            <td class="table-secondary table-bordered border-dark" colspan="5"><strong>UNSCHEDULE LEAVE RECORD</strong></td>
				        </tr>
				        <tr>
				            <td class="text-center" colspan="2" width="31%">
				                REFERENCE OF SCORING <br>
				                <i>Note: UNSCHEDULED LEAVE pertains to any absence that is unplanned or no advanced notice. This includes LWOP or SL but with exemption of SPL.</i> <br>
				                <i>VL should be filed in advance.</i>
				            </td>
				            <td class="text-center align-middle" width="23%"><strong>ACTUAL UNSCHEDULED LEAVE SUMMARY</strong></td>
				            <td class="text-center align-middle" width="23%"><strong>ACTUAL RATING</strong></td>
				            <td class="text-center align-middle" width="23%"><strong>UNSCHEDULED LEAVE DISCIPLINARY ACTION RECORDS</strong></td>
				        </tr>
				        <tr>
				            <td><strong>RANGE IN TERMS OF FREQUENCY</strong></td>
				            <td width="5%"><strong>Rating</strong></td>
				            <td style="border-top: hidden"></td>
				            <td style="border-top: hidden"></td>
				            <td style="border-top: hidden"></td>
				        </tr>
						@php
						    $numMonths = $attendance->end_month - $attendance->start_month + 1;
						@endphp
						@for ($i = 0; $i < 6; $i++)
						<tr>
							<td class="text-start">{{ $i }}x Frequency</td>
            				<td>{{ 5 - $i }}</td>
							<td>
								@if (isset($attendance->{'late_rating_' . ($i + 1)}))
								    @php
								        try {
								            // Get the current year, assuming we're using the current year as a reference
								            $currentMonth = date('m');
        									$currentYear = date('Y');
																			
        									if ($currentMonth >= 7 && $currentMonth <= 12) {
        									    $currentYear = $currentYear; // Current year for Period 1 (January-June)
        									} else {
        									    $currentYear = $currentYear - 1 ; // Previous year for Period 2 (July-December)
        									}
										
								            // Convert `start_month` to a date using the current year
								            #halt
								            // $startMonth = \Carbon\Carbon::createFromDate($currentYear, $attendance->start_month, 1);
								            $startMonth = \Carbon\Carbon::createFromDate($currentYear, $attendance->start_month, 1);
										
								            // Add the offset and format the month and year
								            $monthYear = $startMonth->addMonths($i)->format('F Y');
								        } catch (\Exception $e) {
								            // Fallback if the format is invalid
								            $monthYear = 'Invalid Date';
								        }
								    @endphp
								    {{ $monthYear }}
								@endif
							</td>
							<td>{{ $attendance->{'ul_rating_' . ($i + 1)} }}</td>
							<td>{{ $attendance->{'da_records_ul_' . ($i + 1)} }}</td>
						</tr>
						@endfor
				        <tr>
				            <td colspan="2"></td>
				            <td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ {{$numMonths}} MOS.</strong></td>
				            <td class="table-secondary table-bordered border-dark" style="width: 20%"><strong><u>{{ $attendance->ul_rating_score * $numMonths }}</u> ÷ </strong> {{ $numMonths }} <strong> = <u>{{ $attendance->ul_rating_score }}</u></strong></td>
				            <td class="table-secondary table-bordered border-dark"></td>
				        </tr>
				    </tbody>
				</table>
			@endif
		</div>
		<br>
	</div>
</body>
</html>