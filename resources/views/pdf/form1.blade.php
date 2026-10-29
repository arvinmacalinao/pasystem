<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Performance Appraisal Form</title>
    @vite('resources/sass/app.scss')
	<link href="{{ asset('pdf/dtr.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="window.print()">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<table style="border:1px solid;" width="100%" class="text-center" id="dtr-table">
					<thead>
						<tr>
							<td width="10" style="border:1px solid;"><img src="{{ asset('logo/ctilogo.png') }}" alt=""></td>
							<td class="text-center"><h3>PERFORMANCE APPRAISAL FORM</h3>
							<h5>(Rank & File)</h5></td>
						</tr>
					</thead>
				</table>
				<table>
					<br>
					<tr>
						<td class="text-left"><h5><strong>NAME OF EMPLOYEE:</strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->name  }}</h5></td>
						<td class="text-left"><h5><strong>NAME OF EVALUATOR: <br></strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->evaluator->FullName ?? ''  }}</h5></td>
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
							<td class="text-left table-secondary table-bordered border-dark" width="1%" colspan="2" class=""><h5><strong>I. JOB KNOWLEDGE (20%)</strong></h5></td>
							<td class="text-left text-wrap" colspan="2"><p align="left" class="text-wrap">THE EXTENT OF TECHNICAL PROFICIENCY AND DEGREE OF UNDERSTANDING OF THE TASKS ASSIGNED. EMPLOYEE IS EXPECTED TO UNDERSTAND THE NATURE AND DETAILS OF THE TASKS BY APPLYING HIS/HER COMPETENCIES TO THE JOB.</p></td>
						</tr>
						{{-- 1.1 --}}
						<tr>
							<td class="text-start" colspan="4"><strong>1.1.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Competent in required job knowledge and skills</strong></td>
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
							<td class="text-start" colspan="4"><strong>1.2.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Exhibits ability to learn and apply new skills</strong></td>
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
							<td class="text-start" colspan="4"><strong>1.3.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Keeps abreast of current developments</strong></td>
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
							<td class="text-start" colspan="4"><strong>1.4.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Requires minimal supervision</strong></td>
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
							<td class="text-start" colspan="4"><strong>1.5.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Displays understanding of how job relates to others & uses resources effectively</strong></td>
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
							<td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR <br>THIS AREA:</strong></td>
							<td colspan="2"><p align="left" class="text-wrap">{{ $ratings->jk_rating_remarks }}</p></td>
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
							<td class="text-left table-secondary table-bordered border-dark" width="1%" 
							colspan="2" class=""><h5><strong>II. QUALITY OF WORK (20%)</strong></h5></td>
							<td class="text-left text-wrap" colspan="2"><p align="left" class="text-wrap">REFERS TO THE ACCURACY AND THOROUGHNESS OF WORK OUTPUT AND DEPENDABILITY OF RESULTS REGARDLESS OF AMOUNT OF WORK DONE. THE ABILITY TO DO TASKS RIGHT AT THE FIRST TIME.</p></td>
						</tr>
						<tr>
							<td class="text-start" colspan="4"><strong>2.1.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Demonstrates accuracy and thoroughness</strong></td>
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
							<td class="text-start" colspan="3">The work s/he produces <strong>MEETS STANDARDS</strong>1 -  for accuracy and completeness</td>
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
							<td class="text-start" colspan="4"><strong>2.2.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Displays commitment to excellence</strong></td>
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
							<td class="text-start" colspan="3">Displays <strong>A STRONG DEDICATION AND COMMITMENT</strong> to excellence</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="4"><strong>2.3.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Looks for ways to improve and promote quality</strong></td>
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
							<td class="text-start" colspan="4"><strong>2.4.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Applies feedback to improve performance</strong></td>
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
							<td class="text-start" colspan="4"><strong>2.5.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Monitors own work to ensure quality</strong></td>
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
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong>
							</td>
							<td colspan="2"><p align="left" class="text-wrap">{{ $ratings->quality_rating_remarks }}</p>
							</td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark"><strong>AVERAGE RATING FOR THIS AREA:     TOTAL = <u>{{ $ratings->quality_rating_score*5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->quality_rating_score }}</u></strong></td>
						</tr>			
					</tbody>
				</table>

				{{-- III --}}
				<table width="100%" class="table table-bordered border-dark text-center" id="dtr-table">
					<tbody>
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" width="1%" colspan="2" class=""><h5><strong>III. QUANTITY OF WORK (15%)</strong></h5></td>
							<td class="text-left text-wrap" colspan="2"><p align="left" class="text-wrap">THE ABILITY TO DELIVER GIVEN VOLUME OF OUTPUT IN A GIVEN TIME AND THE ABILITY TO PRODUCE REQUIRED QUALITY OF OUTPUT WITHIN REASONABLE TIME.</p></td>
						</tr>
						<tr>
							<td class="text-start" colspan="4"><strong>3.1.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Meets productivity standards</strong></td>
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
							<td class="text-start" colspan="4"><strong>3.2.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Completes work in timely manner</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - 1 - It <strong>SOMETIMES TAKES HIM/HER LONGER</strong> than satisfactory to complete work and s/he too often misses deadlines</td>
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
							<td class="text-start" colspan="4"><strong>3.3.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Strives to increase productivity</strong></td>
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
							<td class="text-start" colspan="4"><strong>3.4.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Works quickly</strong></td>
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
							<td class="text-start" colspan="4"><strong>3.5.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Achieves established goals</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>DOES NOT ALWAYS</strong> achieve his/her established goals</td>
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
								<strong>REMARKS FOR THIS AREA:</strong>
							</td>
							<td colspan="2"><p align="left" class="text-wrap">{{ $ratings->quantity_rating_remarks }}</p></td>
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
					<thead>
						<tr>
							<th class="table-secondary table-bordered border-dark text-center" colspan="4"><strong>ON-THE-JOB BEHAVIOR</strong></th>
						</tr>
					</thead>
					<tbody>
						<!-- Section IV. Initiative -->
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" colspan="2">
								<h5><strong>IV. Initiative (5%)</strong></h5>
							</td>
							<td class="" colspan="2">
								<p class="text-start text-wrap">ABILITY TO SEEK AND APPLY BETTER MEANS TO ACHIEVE OBJECTIVES, TO GENERATE IMAGINATIVE SOLUTIONS TO ENCOUNTERED WORK PROBLEMS, AND TO IMPOSE SELF TO DO JOB RESPONSIBILITIES EVEN WITHOUT BEING TOLD.</p>
							</td>
						</tr>
				
						<!-- 4.1 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>4.1. EXPECTED OUTCOME: Volunteers readily</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>QUICK TO VOLUNTEER</strong> whenever others need help</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>VOLUNTEERS</strong> to help others</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Without being asked, s/he <strong>VOLUNTEERS IMMEDIATELY</strong> when s/he sees help is needed</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>HAS TO BE REMINDED</strong> that his/her assistance would be helpful</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>OCCASIONALLY VOLUNTEERS</strong> to help but not to the extent expected</td>
						</tr>
				
						<!-- 4.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>4.2. EXPECTED OUTCOME: Undertakes self-development activities</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">On his/her own initiative, s/he <strong>FREQUENTLY UNDERTAKES</strong> self-development activities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>UNDERTAKES</strong> self-development activities on his/her own initiative</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>CONSTANTLY EXPANDING</strong> his/her capabilities and skills on his/her own initiative</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT UNDERTAKE</strong> self-development activities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>NEEDS TO BE ENCOURAGED</strong> to take on self-development activities</td>
						</tr>
				
						<!-- 4.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>4.3. EXPECTED OUTCOME: Seeks increased responsibilities</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>OFTEN SEEKS OUT</strong> additional responsibilities beyond the normal scope of his/her job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>OCCASIONALLY SEEKS</strong> increased responsibilities beyond the normal scope of his/her job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">When it comes to seeking increased responsibilities, s/he <strong>DOES NOT PLACE LIMITS</strong> on the <strong>SCOPE OF HIS/HER POSITION</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>RESISTS TAKING ON</strong> additional responsibilities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>SELDOM LOOKS</strong> for increased responsibilities</td>
						</tr>
				
						<!-- 4.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>4.4. EXPECTED OUTCOME: Takes independent actions and calculated risks</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>TAKES INDEPENDENT ACTIONS</strong> and <strong>APPROPRIATE</strong>, calculated risks</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Exercises a <strong>REASONABLE DEGREE OF RISK TAKING</strong> in the performance of his/her work</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">A <strong>TOTAL SELF-STARTER</strong>, taking independent actions and well-calculated risks</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>DOES NOT TAKE CALCULATED RISKS</strong> or independent actions appropriate to his/her job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>RARELY TAKES</strong> independent actions or calculated risks</td>
						</tr>
				
						<!-- 4.5 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>4.5. EXPECTED OUTCOME: Looks for and takes advantage of opportunities</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>RESOURCEFUL</strong> at taking advantage of opportunities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>LOOKS FOR</strong> and takes advantage of opportunities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>ALWAYS ALERT</strong> to opportunities and makes the most of them</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">1 - <strong>OVERLOOKS</strong> many opportunities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->initiative_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - <strong>SOMETIMES OVERLOOKS</strong> opportunities</td>
						</tr>
				
						<!-- Remarks and Average -->
						<tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR THIS AREA:</strong></td>
							<td colspan="2"><p align="left" class="text-wrap">{{ $ratings->initiative_rating_remarks }}</p></td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->initiative_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->initiative_rating_score }}</u></strong>
							</td>
						</tr>
					</tbody>
				</table>

				{{-- V --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section V. Cooperation -->
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>V. Cooperation (%5)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">ABILITY TO PROVIDE SUPPORT AND COORDINATION WITH CO-WORKERS, THE EXERCISE OF PROPER INTERACTION SKILLS AND BEHAVIOR, INCLUDING BEING CONSIDERATE OF THE NEEDS AND FEELINGS OF OTHERS IN ORDER TO MEET COMPANY OBJECTIVES.</p>
				            </td>
				        </tr>
					
				        <!-- 5.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>5.1. EXPECTED OUTCOME: Establishes and maintains effective relations</strong></td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>USUALLY ESTABLISHES</strong> and maintains good working relationships</td>
				        </tr>
						 <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>SOMETIMES S/HE INCURS DIFFICULTIES</strong> in establishing and maintaining good relationships</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">His/her efforts to establish and maintain <strong>STRONG WORKING RELATIONSHIPS ARE OUTSTANDING</strong></td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>PARTICULARLY SUCCESSFUL</strong> at establishing and maintaining good relationships</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Working relationships are <strong>FREQUENTLY UNSATISFACTORY</strong></td>
				        </tr>
				       
					
				        <!-- 5.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>5.2. EXPECTED OUTCOME: Exhibits tact and consideration</strong></td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>EXHIBITS</strong> tact and consideration in his/her relations with others</td>
				        </tr>
						 <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - There <strong>HAVE BEEN A NUMBER OF OCCASIONS</strong> when s/he exhibited a <strong>LACK OF TACT OR CONSIDERATION</strong> for others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>CONSISTENTLY TACTFUL</strong> and considerate in his/her relations with others</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Exhibits a <strong>HIGH DEGREE OF TACT</strong> and consideration in his/her relations with others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>TOO OFTEN</strong> s/he has exhibited a lack of tact or consideration to others</td>
				        </tr>
				       
					
				        <!-- 5.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>5.3. EXPECTED OUTCOME: Displays positive outlook and pleasant manner</strong></td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Outlook is <strong>GENERALLY POSITIVE</strong> and his/her manner is pleasant</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>WOULD BE EASIER TO WORK WITH</strong> if s/he projected a more positive outlook and pleasant manner</td>
				        </tr>
						 <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>DISPLAYS AN UPBEAT</strong>, positive outlook and pleasant manner under even the most trying circumstances</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>REGULARLY DISPLAYS</strong> a positive outlook and pleasant manner</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Can be <strong>DIFFICULT TO WORK</strong> with because s/he displays negative and rude behavior</td>
				        </tr>
				        <!-- 5.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>5.4. EXPECTED OUTCOME: Offers assistance and support to co-workers</strong></td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>ASSISTS AND SUPPORTS</strong> his/her co-workers</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->coop_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - It <strong>WOULD BE PREFERABLE IF S/HE OFFERED MORE</strong> assistance and support to his/her co-workers</td>
				        </tr>
						 <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>ALWAYS THE FIRST TO OFFER</strong> his/her assistance to his/her co-workers</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>OFTEN EXTENDS</strong> himself/herself <strong>MORE THAN REQUIRED TO ASSIST AND SUPPORT HER CO-WORKERS</TD></strong>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>RARELY OFFERS</strong> support or assistance to his/her co-workers</td>
				        </tr>
				        
					
				        <!-- 5.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>5.5. EXPECTED OUTCOME: Works cooperatively in group situations</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>WORKS EXCEPTIONALLY</strong> well with others in group situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - <strong>NOT ALWAYS SUCCESSFUL</strong> when working in group situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>PLAYS A HIGHLY PROACTIVE</strong>, participative role when working in group situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>DEMONSTRATES AND PROMOTES COOPERATION</strong> when working in group situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->coop_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - Has been <strong>GENERALLY UNCOOPERATIVE</strong> when working in group situations</td>
				        </tr>
					
				        <!-- Remarks and Average -->
				        <tr>
				            <td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR THIS AREA:</strong> {{ $ratings->coop_rating_remarks }}</td>
				        </tr>
				        <tr>
				            <td colspan="4" class="text-start table-secondary table-bordered border-dark">
				                <strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->coop_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->coop_rating_score }}</u></strong>
				            </td>
				        </tr>
				    </tbody>
				</table>
				
				{{-- VI --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section VI. Communications -->
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>VI. Communications (5%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">ABILITY TO RECEIVE AND CONVEY VERBAL AND WRITTEN COMMUNICATION EFFECTIVELY IN A PRECISE AND CONCISE MANNER. EXHIBITS OPENNESS AND SUPPORT TO ALL CHANNELS OF COMMUNICATION.</p>
				            </td>
				        </tr>
					
				        <!-- 6.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>6.1. EXPECTED OUTCOME: Expresses ideas and thoughts verbally</strong></td>
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
					
				        <!-- 6.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>6.2. EXPECTED OUTCOME: Expresses ideas and thoughts in written form</strong></td>
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
					
				        <!-- 6.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>6.3. EXPECTED OUTCOME: Exhibits good listening and comprehension</strong></td>
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
				            <td class="text-start" colspan="3"><strong>DOES NOT ALWAYS EXHIBIT</strong> good listening and comprehension skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>DOES NOT EXHIBIT</strong> the listening and comprehension skills <strong>NECESSARY FOR SATISFACTORY</strong> performance of his/her job</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3"><strong>EXHIBITS GOOD LISTENING</strong> skills and comprehends complex matters well</td>
				        </tr>
					
				        <!-- 6.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>6.4. EXPECTED OUTCOME: Keeps others adequately informed</strong></td>
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
					
				        <!-- 6.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>6.5. EXPECTED OUTCOME: Selects and uses appropriate communication methods</strong></td>
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
								<strong>REMARKS FOR THIS AREA:</strong> 
							</td>
							<td colspan="2"><p align="left" class="text-wrap">{{ $ratings->comms_rating_remarks }}</p></td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->comms_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->comms_rating_score }}</u></strong>
							</td>
						</tr>
				    </tbody>
				</table>

				{{-- VII --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section VII. Compliance -->
				        <tr>
				            <td class="text-left table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>VII. Compliance</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">Disposition and effort exerted to observe and comply with company standards, policies, procedures, protocol, work ethics, among others in order to promote order, safety, security, harmony, and to avoid accidents, wastages, losses/damages of company resources/properties, injuries of personnel, among others.</p>
				            </td>
				        </tr>
					
				        <!-- 7.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>7.1 EXPECTED OUTCOME:</strong> Adheres to Company rules and regulations. Conforms to established policies and procedures.</td>
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
					
				        <!-- 7.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>7.2 EXPECTED OUTCOME:</strong> Observes safety and security procedures</td>
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
					
				        <!-- 7.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>7.3 EXPECTED OUTCOME:</strong> Determines appropriate action beyond guidelines</td>
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
				            <td class="text-start" colspan="3">1 - When a situation arises that is not covered by the normal guidelines, he/she <strong>HAS DIFFICULTY DETERMINING</strong> an appropriate action</td>
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
					
				        <!-- 7.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>7.4 EXPECTED OUTCOME:</strong> Uses equipment and materials properly</td>
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
				            <td class="text-start" colspan="3">2 - There have been times when s/he <strong>HAD TO BE WARNED ABOUT THE IMPROPER USE</strong> of equipment and materials</td>
				        </tr>
					
				        <!-- 7.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>7.5 EXPECTED OUTCOME:</strong> Observes proper deportment and decorum – social traits such as disposition, tact, appearance, behavior, and conduct</td>
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
				        
						<!-- 7.6 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>7.6 EXPECTED OUTCOME:</strong> Observes proper interpersonal skills – the ability to work harmoniously with others towards the achievement of goals.</td>
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
				            <td class="text-start" colspan="3"><strong>GETS OUT OF HIS/HER WAY</strong> to cooperate</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">1 - <strong>DISLIKES TO COOPERATE</strong>, cannot work harmoniously with others</td>
				        </tr>

						<!-- 7.7 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="4"><strong>7.7 EXPECTED OUTCOME:</strong> Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned 
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
								<strong>REMARKS FOR THIS AREA:</strong>
							</td>
							<td colspan="2"><p align="left" class="text-wrap">{{ $ratings->comp_rating_remarks }}</p></td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->comp_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->comp_rating_score }}</u></strong>
							</td>
						</tr>
				    </tbody>
				</table>

				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<!-- Section VIII.A Attendance & Punctuality -->
						<tr>
							<td class="text-left table-secondary table-bordered border-dark" colspan="2">
								<h5><strong>VIII.A Attendance & Punctuality</strong></h5>
							</td>
							<td colspan="2">
								<p class="text-start text-wrap">REGULARITY IN ATTENDANCE, PUNCTUALITY IN REPORTING FOR WORK, AND EFFECTIVE MANAGEMENT OF TIME.</p>
							</td>
						</tr>
				
						<!-- 8A.1 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>8A.1 EXPECTED OUTCOME:</strong> Schedules time off in advance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
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
				
						<!-- 8A.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>8A.2 EXPECTED OUTCOME:</strong> Begins working on time</td>
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
				
						<!-- 8A.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>8A.3 EXPECTED OUTCOME:</strong> Ensures work responsibilities are covered when absent</td>
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
							<td class="text-start" colspan="3">1 - When late or absent, <strong>PROBLEMS HAVE OCCURRED</strong> because s/he failed to confirm that his/her responsibilities were adequately covered</td>
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
							<td class="text-start" colspan="3">2 - When late or absent, s/he <strong>HAS NOT ALWAYS CONFIRMED</strong> that his/her responsibilities are covered</td>
						</tr>
				
						<!-- 8A.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>8A.4 EXPECTED OUTCOME:</strong> Arrives at meetings and appointments on time</td>
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
							<td class="text-start" colspan="3">1 - Inconveniences others by <strong>BEING LATE FOR MEETINGS</strong></td>
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
							<td class="text-start" colspan="3">2 - Inconveniences others by <strong>OFTEN BEING LATE FOR MEETINGS</strong></td>
						</tr>

						<!-- Average Score -->
				        <tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark">
								<strong>REMARKS FOR THIS AREA:</strong>
							</td>
							<td colspan="2"><p align="left" class="text-wrap">{{ $ratings->attend_rating_remarks }}</p></td>
						</tr>
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark">
								<strong>AVERAGE RATING FOR THIS AREA: TOTAL = <u>{{ $ratings->attend_rating_score * 5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->attend_rating_score }}</u></strong>
							</td>
						</tr>	
					</tbody>
				</table>
				<table width="100%" class="table table-bordered border-dark text-center page-break">
					<tbody>
						<!-- Section VIII.A Attendance & Punctuality -->
						<tr>
							<td class="text-start table-secondary table-bordered border-dark" colspan="4">
								<h5><strong>EVALUATOR’S RECOMMENDATION / GENERAL ASSESSMENT</strong></h5>
							</td>
						</tr>
						<!-- Evaluator's Recommendation / General Assessment -->
						<tr>
							<td class=""colspan="4" height="100px">
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
									<h5><strong>VIII.B ACTUAL RECORDS OF HRD</strong></h5>
								</td>
								<td colspan="3">
									<p class="text-start text-wrap">CONSOLIDATED RECORDS OF PUNCTUALITY, UNDERTIME, AND UNSCHEDULED LEAVE</p>
								</td>
							</tr>
						</tbody>
				</table>
				{{-- punctuality --}}
				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<tr>
							<td class="table-secondary table-bordered border-dark" colspan="5"><strong>PUNCTUALITY RECORD</strong></td>
						</tr>
						<tr>
							<td class="text-center" colspan="2" width="31%">
								REFERENCE OF SCORING <br>
								<i>Note: LATE is defined as coming to work beyond the 
									required clock-in time or grace period.</i> <br>
									<i>For Store-based: No grace period
										For Office-based: 15 minutes grace period</i>
							</td>
							<td class="text-center align-middle"   width="23%"><strong>ACTUAL
								TARDINESS SUMMARY</strong></td>
							<td class="text-center align-middle"   width="23%"><strong>ACTUAL RATING</strong></td>
							<td class="text-center align-middle"  width="23%"><strong>TARDINESS
								DISCIPLINARY ACTION RECORDS</strong></td>
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
							<td>{{ $attendance->{'late_rating_' . ($i + 1)} }}</td>
							<td>{{ $attendance->{'da_records_late_' . ($i + 1)} }}</td>
						</tr>
						@endfor
						{{-- <tr>
				            <td class="text-start">0 Late</td>
				            <td>5</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 0) }}</td>
				            <td>{{ $attendance->late_rating_1 }}</td>
				            <td>{{ $attendance->da_records_late_1 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">1x Frequency</td>
				            <td>4</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 1) }}</td>
				            <td>{{ $attendance->late_rating_2 }}</td>
				            <td>{{ $attendance->da_records_late_2 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">2x Frequency</td>
				            <td>3</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 2) }}</td>
				            <td>{{ $attendance->late_rating_3 }}</td>
				            <td>{{ $attendance->da_records_late_3 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">3x Frequency</td>
				            <td>2</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 3) }}</td>
				            <td>{{ $attendance->late_rating_4 }}</td>
				            <td>{{ $attendance->da_records_late_4 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">4x Frequency</td>
				            <td>1</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 4) }}</td>
				            <td>{{ $attendance->late_rating_5 }}</td>
				            <td>{{ $attendance->da_records_late_5 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">5x Frequency or more</td>
				            <td>0</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 5) }}</td>
				            <td>{{ $attendance->late_rating_6 }}</td>
				            <td>{{ $attendance->da_records_late_6 }}</td>
				        </tr> --}}
						<tr>
							<td colspan="2"></td>
							<td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ {{$numMonths}} MOS.</strong></td>
							<td class="table-secondary table-bordered border-dark"><strong><u>{{ $attendance->late_rating_score * $numMonths }}</u> ÷ </strong> {{ $numMonths }} <strong> = <u>{{ $attendance->late_rating_score }}</u></strong></td>
							<td class="table-secondary table-bordered border-dark"></td>
						</tr>
					</tbody>
				</table>
				{{-- undertime --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <tr>
				            <td class="table-secondary table-bordered border-dark" colspan="5"><strong>UNDERTIME RECORD</strong></td>
				        </tr>
				        <tr>
				            <td class="text-center" colspan="2" width="31%">
				                REFERENCE OF SCORING <br>
				                <i>Note: UNDERTIME is defined as leaving work before the required clock-out time, without prior authorization.</i>
				            </td>
				            <td class="text-center align-middle" width="23%"><strong>ACTUAL UNDERTIME SUMMARY</strong></td>
				            <td class="text-center align-middle" width="23%"><strong>ACTUAL RATING</strong></td>
				            <td class="text-center align-middle" width="23%"><strong>UNDERTIME DISCIPLINARY ACTION RECORDS</strong></td>
				        </tr>
				        <tr>
				            <td><strong>RANGE IN TERMS OF FREQUENCY</strong></td>
				            <td width="5%"><strong>Rating</strong></td>
				            <td style="border-top: hidden"></td>
				            <td style="border-top: hidden"></td>
				            <td style="border-top: hidden"></td>
				        </tr>
						@php
						$frequencyData = [
							'0 Undertime' => 5,
							'10 Minutes or less' => 4,
							'11 to 30 Minutes' => 3,
							'31 to 45 Minutes' => 2,
							'46 to 60 Minutes' => 1,
							'61 Minutes or more' => 0,
						];
						@endphp

						@for ($i = 0; $i < 6; $i++)
							<tr>
								<!-- Static values for the frequency and rating columns -->
								<td class="text-start">{{ array_keys($frequencyData)[$i] }}</td>
								<td>{{ $frequencyData[array_keys($frequencyData)[$i]] }}</td>
							
								<!-- Dynamic values for the remaining columns -->
								<td>
									@if (isset($attendance->{'ut_rating_' . ($i + 1)}))
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
								<td>{{ $attendance->{'ut_rating_' . ($i + 1)} }}</td>
								<td>{{ $attendance->{'da_records_ut_' . ($i + 1)} }}</td>
							</tr>
						@endfor
				        {{-- <tr>
				            <td class="text-start">0 Undertime</td>
				            <td>5</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 0) }}</td>
				            <td>{{ $attendance->ut_rating_1 }}</td>
				            <td>{{ $attendance->da_records_late_1 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">10 Minutes or less</td>
				            <td>4</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 1) }}</td>
				            <td>{{ $attendance->ut_rating_2 }}</td>
				            <td>{{ $attendance->da_records_late_2 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">11 to 30 Minutes</td>
				            <td>3</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 2) }}</td>
				            <td>{{ $attendance->ut_rating_3 }}</td>
				            <td>{{ $attendance->da_records_late_3 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">31 to 45 Minutes</td>
				            <td>2</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 3) }}</td>
				            <td>{{ $attendance->ut_rating_4 }}</td>
				            <td>{{ $attendance->da_records_late_4 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">46 to 60 Minutes</td>
				            <td>1</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 4) }}</td>
				            <td>{{ $attendance->ut_rating_5 }}</td>
				            <td>{{ $attendance->da_records_late_5 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">61 Minutes or more</td>
				            <td>0</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 5) }}</td>
				            <td>{{ $attendance->ut_rating_6 }}</td>
				            <td>{{ $attendance->da_records_late_6 }}</td>
				        </tr> --}}
				        <tr>
				            <td colspan="2"></td>
				            <td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ {{$numMonths}} MOS.</strong></td>
				            <td class="table-secondary table-bordered border-dark"><strong><u>{{ $attendance->ut_rating_score * $numMonths }}</u> ÷ </strong> {{ $numMonths }} <strong> = <u>{{ $attendance->ut_rating_score }}</u></strong></td>
				            <td class="table-secondary table-bordered border-dark"></td>
				        </tr>
				    </tbody>
				</table>
				{{-- unscheduled leave --}}
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
						@for ($i = 0; $i < 6; $i++)
						<tr>
							<td class="text-start">{{ $i }}x Frequency</td>
            				<td>{{ 5 - $i }}</td>
							<td>
								@if (isset($attendance->{'ul_rating_' . ($i + 1)}))
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
				        {{-- <tr>
				            <td class="text-start">0 LWOP or SL</td>
				            <td>5</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 0) }}</td>
				            <td>{{ $attendance->ut_rating_1 }}</td>
				            <td>{{ $attendance->da_records_late_1 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">1x Frequency</td>
				            <td>4</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 1) }}</td>
				            <td>{{ $attendance->ut_rating_2 }}</td>
				            <td>{{ $attendance->da_records_late_2 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">2x Frequency</td>
				            <td>3</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 2) }}</td>
				            <td>{{ $attendance->ut_rating_3 }}</td>
				            <td>{{ $attendance->da_records_late_3 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">3x Frequency</td>
				            <td>2</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 3) }}</td>
				            <td>{{ $attendance->ut_rating_4 }}</td>
				            <td>{{ $attendance->da_records_late_4 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">4x Frequency</td>
				            <td>1</td>
				            <td>{{ getMonthYear($attendance->ut_start_month, 4) }}</td>
				            <td>{{ $attendance->ut_rating_5 }}</td>
				            <td>{{ $attendance->da_records_late_5 }}</td>
				        </tr>
				        <tr>
				            <td class="text-start">5x Frequency or more</td>
				            <td>0</td>
				            <td>{{ getMonthYear($attendance->late_start_month, 5) }}</td>
				            <td>{{ $attendance->ut_rating_6 }}</td>
				            <td>{{ $attendance->da_records_late_6 }}</td>
				        </tr> --}}
				        <tr>
				            <td colspan="2"></td>
				            <td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ {{$numMonths}} MOS.</strong></td>
				            <td class="table-secondary table-bordered border-dark"><strong><u>{{ $attendance->ul_rating_score * $numMonths }}</u> ÷ </strong> {{ $numMonths }} <strong> = <u>{{ $attendance->ul_rating_score }}</u></strong></td>
				            <td class="table-secondary table-bordered border-dark" width="15%"></td>
				        </tr>
				    </tbody>
				</table>
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
						<tr>
							<td class="text-center" width="31%"></td>
							<td style="width: 20%;"></td>
							<td class="text-center align-middle" style="border-top: hidden; border-right:hidden;" width="15%"><strong></strong></td>
							<td class="text-center align-middle" style="border-top: hidden; border-right:hidden;" width="7%"><strong></strong></td>
							<td class="text-center align-middle" style="border-top: hidden; border-right:hidden;" width="7%"><strong></strong></td>
						</tr>
						<tr>
							<td style="border-top: hidden"><strong>SUMMARY</strong></td>
							<td style="border-top: hidden; width: 20%;"><strong>RATINGS</strong></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
						</tr>
						<tr>
							<td class="text-start">PUNCTUALITY RECORD</td>
							<td style="width: 20%;">{{ $attendance->late_rating_score }}</td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
						</tr>
						<tr>
							<td class="text-start">UNDERTIME RECORD</td>
							<td style="width: 20%;">{{ $attendance->ut_rating_score }}</td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
						</tr>
						<tr>
							<td class="text-start">UNSCHEDULED LEAVE RECORD</td>
							<td style="width: 20%;">{{ $attendance->ul_rating_score }}</td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
							<td style="border-top: hidden; border-right:hidden;"></td>
						</tr>
						<tr>
							<td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ 3</strong></td>
							<td class="table-secondary table-bordered border-dark" style="width: 20%;"><strong><u>{{ $attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score }}</u> ÷ </strong> 3 <strong> = <u>{{ number_format(($attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score) / 3, 2) }}
							</u></strong></td>
							<td style="border-top: hidden; border-right:hidden; border-bottom: hidden"></td>
							<td style="border-top: hidden; border-right:hidden; border-bottom: hidden"></td>
							<td style="border-top: hidden; border-right:hidden; border-bottom: hidden"></td>
						</tr>
					</tbody>					
				</table>
			@endif
		</div>
		<br>
	</div>
</body>
</html>