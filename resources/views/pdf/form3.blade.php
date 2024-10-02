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
							<h5>(Supervisors/Senior Supervisors)</h5></td>
						</tr>
					</thead>
				</table>
				<table>
					<br>
					<tr>
						<td class="text-left"><h5><strong>NAME OF EMPLOYEE:</strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->name  }}</h5></td>
						<td class="text-left"><h5><strong>NAME OF EVALUATOR: <br></strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->evaluator->FullName  }}</h5></td>
					</tr>
					<tr>
						<td class="text-end"><h5><strong>POSITION TITLE:</strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->designation  }}</h5></td>
						<td class="text-end"><h5><strong>POSITION TITLE: <br></strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->user->designation->name  }}</h5></td>
					</tr>
					<tr>
						<td class="text-end"><h5><strong>REVIEW PERIOD:</strong></h5></td>
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->period }} {{ date('Y', strtotime($appraisal->evaluation_date)) }}</h5></td>
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
							<td class="text-start" colspan="3">Demonstrates competency in the skills and knowledge required</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Demonstrates significant expertise at his/her job because of his/her in-depth knowledge and skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Has not demonstrated that s/he has the skills and knowledge to fulfill the responsibilities of his/her position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Demonstrates a high level of competency in the skills and knowledge required</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Improvement is needed in certain skills and job knowledge</td>
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
							<td class="text-start" colspan="3">Learns and applies new skills within the expected time period</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">An exceptionally fast learner and able to quickly put new skills to use</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">It takes him/her too long to learn and apply new skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Learns and applies new skills quickly</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">It sometimes takes him/her too long to learn and apply new skills</td>
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
							<td class="text-start" colspan="3">Knowledgeable about current developments in his/her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Reads and researches extensively, staying on top of current developments that might impact her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fails to keep updated about current developments in his/her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does an excellent job of keeping himself/herself updated about current developments in his/her field</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Should be more knowledgeable about current developments in his/her field</td>
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
							<td class="text-start" colspan="3">Works within the normal scope of supervision</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Performs extremely well with very little, if any, supervision or assistance needed</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Needs more supervision and assistance than s/he should</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Needs a minimal amount of supervision to fulfill his/her responsibilities</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Needs slightly more supervision than s/he should to fulfill his/her responsibilities</td>
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
							<td class="text-start" colspan="3">Displays a good understanding of how his/her job relates to other jobs & effectively uses the resources and tools available</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Has an extraordinary understanding of his/her job and the jobs of others & skillfully uses resources to maximum use</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does not completely understand how his/her job relates to others & s/he ineffectively uses the resources available</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Has better than usual understanding of how his/her job relates to other jobs & takes advantage of the resources available</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->jk_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Would have better results if s/he understands how his/her job relates to others & has difficulty in effectively using the resources</td>
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
							<td class="text-start" colspan="3">Work does not reflect adequate attention to accuracy and completeness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">The work s/he produces meets standards for accuracy and completeness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Sometimes the work s/he produces is less accurate and less thorough than his/her position requires</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">The quality of work s/he produces far exceeds expectations for accuracy & thoroughness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">The work s/he produces is usually highly accurate and thorough</td>
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
							<td class="text-start" colspan="3">Displays a lack of commitment to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Regularly displays his/her commitment to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Could display more commitment to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">A role model because of his/her dedication and commitment to excellence</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Displays a strong dedication and commitment to excellence</td>
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
							<td class="text-start" colspan="3">Does not actively look for ways to improve quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Looks for ways to improve quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Needs to more actively look for ways to improve quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Leads the organization in looking for ways to improve quality and promote quality awareness</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works hard to improve quality in his/her own work and promotes quality awareness throughout the organization</td>
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
							<td class="text-start" colspan="3">The feedback he/she receives about his/her performance is not being applied</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Applies the feedback he/she receives to improve his/her performance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Doesn’t always apply the feedback he/she receives to improve performance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Proactive about seeking feedback and using it to improve her performance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Often asks for feedback and uses it to improve his/her performance</td>
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
							<td class="text-start" colspan="3">Does an unacceptable job of monitoring his/her work to ensure quality</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Monitors his/her work to meet quality standards</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">There are some quality problems because he/she does not adequately monitor his/her work</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Has designed highly effective methods for monitoring his/her work to achieve & maintain the highest quality standards</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quality_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Consistently and carefully monitors his/her work to ensure its quality</td>
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
								@if($ratings->quantity_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Produces less work than expected for his/her job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Not always as productive as expected for his/her job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Regularly produces a normal amount of work</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Usually produces more work than expected</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Regularly exceeds the amount of work normally expected for this job</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.2.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Completes work in timely manner</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Work is not getting done within acceptable time frames</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">It sometimes takes him/her longer than satisfactory to complete work and s/he too often misses deadlines</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Completes his/her work in a timely manner and meets most deadlines</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Often completes his/her work ahead of schedule</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Routinely completes work ahead of schedule, always meeting his/her deadlines</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.3.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Strives to increase productivity</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does not display much commitment to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Could do more to demonstrate his/her commitment to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Demonstrates a commitment to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Demonstrates a strong commitment to increasing productivity</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Sets a good example to others in his/her dedication to increasing productivity</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.4.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Works quickly</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">The pace at which s/he works is not adequate for this job</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works more slowly than the position requires</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works at the pace expected for the position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works at a faster pace than normally expected for the position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works at an exceptionally fast pace</td>
						</tr>
						
						<tr>
							<td class="text-start" colspan="3"><strong>3.5.&nbsp;&nbsp;EXPECTED OUTCOME: &nbsp;&nbsp;&nbsp;Achieves established goals</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Too often fails to achieve established goals</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does not always achieve his/her established goals</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Achieves most of his/her established goals</td>
						</tr>	
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Strives hard in the achievement of established goals</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->quantity_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Consistently pushes himself/herself to achieve and surpass his/her established goals</td>
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
							<td class="text-start" colspan="3">Provides clear direction and has little problem gaining compliance from others</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides unclear direction and has difficulty gaining compliance from others</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Excels at providing clear direction to others as well as gaining their compliance quickly</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides clear direction and is usually able to gain compliance from others</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Sometimes does not provide clear direction and gain compliance from others</td>
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
							<td class="text-start" colspan="3">Makes sure that his/her subordinates are an important part of all planning</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Problems occur because s/he does not sufficiently include his/her subordinates in planning</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Implements planning processes that maximize the participation of his/her subordinates to get the best results</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Includes subordinates in most planning</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Needs to more fully include his/her subordinates in planning</td>
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
							<td class="text-start" colspan="3">Does not hesitate to take appropriate responsibility for his/her subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fails to assume appropriate responsibility for subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Maintains full responsibility for his/her subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Takes responsibility for his/her subordinates’ activities
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Assumes insufficient responsibility for subordinates’ activities
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
							<td class="text-start" colspan="3">Makes every effort to make himself/ herself accessible to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does not make himself/herself accessible enough to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Sets a high priority on ensuring that s/he is always available to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Makes himself/herself available to his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">There have been times when s/he did not make himself/herself available enough to subordinates</td>
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
							<td class="text-start" colspan="3">Provides consistent, valuable performance feedback & dedicates considerable effort to develop his/ her subordinates’ skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides inadequate performance feedback & does not make efforts to develop the skills of his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Works closely, providing perceptive and consistent feedback & has a record for developing the skills of his/her subordinates</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Provides regular performance feedback & works with his/her subordinates to develop their skills</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Is inconsistent about providing performance feedback & spends minimal time developing his/her subordinate’ skills</td>
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
								@if($ratings->ps_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Identifies the existence of problems quickly</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Identifies problems in a less than timely manner</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Immediately identifies the existence and nature of problems</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Sometimes late in identifying that problem situations exist</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Identifies most problem situations within appropriate time frames</td>
						</tr>
				
						<!-- 5.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.2. EXPECTED OUTCOME: Gathers and analyzes information skillfully</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Skilled at gathering and analyzing information from multiple sources</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does not demonstrate the information gathering and analysis skills needed for his/her position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Extremely skilled at gathering and analyzing complex information from multiple sources</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Information gathering and analysis are not always thorough enough for his/her position</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Information gathering and analysis meet the requirements of his/her position</td>
						</tr>
				
						<!-- 5.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.3. EXPECTED OUTCOME: Develops alternative solutions</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Addresses problem-solving situations by analyzing options and developing several alternative solutions
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Does not develop adequate alternative solutions as part of the problem-solving process
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Routinely researches all options, developing the best alternative solutions
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Would be better at problem-solving if s/he better developed alternative solutions
							</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Most of the time, s/he develops several alternative solutions to problems
							</td>
						</tr>
				
						<!-- 5.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.5. EXPECTED OUTCOME: Resolves problems in early stages</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Resolves or minimizes problems by addressing them in their early stages</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Frequently, problems become larger issues because s/he fails to anticipate and resolve them earlier</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Using his/her foresight and analytical skills, s/he quickly resolves problems in their earliest stages</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Could do more to anticipate and resolve problems before they grow into larger issues</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Usually resolves or minimizes most problems before they grow into larger issues</td>
						</tr>
				
						<!-- 5.5 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>5.5. EXPECTED OUTCOME: Works well in group problem solving situations</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">In group situations, s/he contributes actively to help solve problems</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Needs to participate more actively in group problem solving situations</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">In group problem solving situations, s/he is a key member, listening to all perspectives and helping the team come to resolution</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Participation in group problem solving situations needs to improve</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Participates well in group problem solving situations</td>
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
				                <h5><strong>JUDGMENT & DECISION-MAKING (5%)</strong></h5>
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
				            <td class="text-start" colspan="3">Hesitates in making some decisions on his/her own, often requiring more assistance than appropriate </td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Confidently makes decisions in all areas of his/her job</td>
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
				            <td class="text-start" colspan="3">Frequently, s/he has difficulty making independent decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Does not hesitate to make decisions on very challenging matters and has confidence in his/her decision making abilities</td>
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
				            <td class="text-start" colspan="3">Has too often made decisions that subsequently resulted in problems because they were not well thought out</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Decisions are on target and reflect his/her reliable, sound judgment skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Decisions are generally accurate and sound</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Lack of judgment has often resulted in problem situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Sound judgment results in decisions that are consistently on target for even the most complicated issues</td>
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
				            <td class="text-start" colspan="3">Sometimes has difficulty supporting and explaining his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Can clearly explain the reasoning and provide good support for his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Can usually support and explain the reasoning for his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Presents inadequate support and reasoning for his/her decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Skillfully presents the supporting information and reasoning behind his/her decisions</td>
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
				            <td class="text-start" colspan="3">Decision making is frequently less than effective because s/he does not include the appropriate people</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Verifies that the appropriate people are included in the decision- making process</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">In most matters, s/he includes the appropriate people in the decision- making process</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Excludes appropriate people from the decision- making process too often</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Always ensures that the appropriate people are included in the decision- making process</td>
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
				            <td class="text-start" colspan="3">Takes longer than acceptable to reach a decision</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Can usually make decisions even under tight time frames</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Decisions are made in a timely manner</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Takes an unacceptable length of time to make decisions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Can be relied upon to make decisions even under the tightest time frames</td>
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
				            <td class="text-start" colspan="3">Would be a stronger leader if s/he exhibited greater confidence in himself/herself as well as in others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Fails to exhibit the kind of confidence in himself/herself and others that is needed to successfully perform his/her job</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Communicates not only a strong confidence in himself/herself but also a confidence in others that encourages them to perform to their best</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Exhibits an appropriate level of confidence in himself/herself as well as in others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Exhibits a high degree of confidence in himself/herself as well as in others</td>
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
				            <td class="text-start" colspan="3">Upon occasion, his/her actions have resulted in a lack of respect and trust from others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Because of his/her actions, s/he has not inspired the respect and trust of others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has earned the respect and trust of others through his/her uncompromising integrity and openness</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Inspires the respect and trust of others through his/her actions</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Inspires the respect and trust of others through his/her openness and integrity</td>
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
				            <td class="text-start" colspan="3">Sometimes reacts poorly in pressure situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has reacted poorly in pressure situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Provides leadership even when challenged with highly stressful or crisis situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Reacts well in pressure situations</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Tolerates a great deal of pressure</td>
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
				            <td class="text-start" colspan="3">Has shown reluctance to assume a leadership role when action was needed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Often hesitates or lacks conviction when action is needed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When action is needed, s/he is a natural leader due to his/her courage and decisiveness</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When action is needed, s/he shows the ability to assume a leadership role</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Quickly assumes a strong leadership role when action is needed</td>
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
				            <td class="text-start" colspan="3">Has not adequately motivated others to perform better</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has not demonstrated the ability to motivate others to perform better</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">A powerful influence upon others, motivating them to perform their best</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Influences others to perform better</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->leadership_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Excels at motivating others to perform better</td>
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
				                <h5><strong>VIII. INNOVATION (8%)</strong></h5>
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
				            <td class="text-start" colspan="3">Displays creativity and original thinking in his/her work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Needs to display more creativity and original thinking to meet the minimum expectations for his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has not displayed enough creativity or original thinking in his/her work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Displays brilliance in his/her creativity and original thinking</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Often displays creativity and original thinking beyond the expectations for his/her position</td>
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
				            <td class="text-start" colspan="3">Usually resourceful when faced with unexpected challenges</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Not always resourceful enough when faced with unexpected challenges</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Does not show the necessary resourcefulness when faced with unexpected challenges</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When faced with unexpected challenges, s/he is extremely resourceful </td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When faced with unexpected challenges, s/he is very resourceful</td>
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
				            <td class="text-start" colspan="3">Contributes usable suggestions for improving work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">It would be preferable if s/he offered more usable suggestions on how to improve work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Rarely contributes usable suggestions for improving work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">On a consistent basis, s/he contributes highly ingenious and valuable suggestions for improving work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Generates many usable and ingenious suggestions for improving work</td>
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
				            <td class="text-start" colspan="3">Has developed innovative approaches and ideas</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has not developed many innovative approaches or ideas</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Approaches and ideas have not been innovated enough for his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has produced innovative approaches and ideas that are far above the expectations for his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->inno_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has developed some highly innovative approaches and ideas</td>
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
				            <td class="text-start" colspan="3">Displays effective verbal communications skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Displays superior verbal skills, communicating clearly, concisely, and in meaningful ways</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Needs to improve his/her verbal communications skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Does not display the verbal communications skills required</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Displays very good verbal skills, communicating clearly and concisely</td>
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
				            <td class="text-start" colspan="3">Written communications skills meet the requirements of his/her position</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Demonstrates outstanding written communications skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Requires more assistance than desirable to produce written communications that meet the job’s requirements</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Written communications fall short of the quality needed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Demonstrates excellent written communications skills</td>
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
				            <td class="text-start" colspan="3">Listens and comprehends well</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Listens carefully, asks perceptive questions, and quickly comprehends new or highly complex matters</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Does not always exhibit good listening and comprehension skills</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Does not exhibit the listening and comprehension skills necessary for satisfactory performance of his/her job</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Exhibits good listening skills and comprehends complex matters well</td>
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
				            <td class="text-start" colspan="3">Keeps others adequately informed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Extremely thorough and proactive about keeping others well informed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Unless reminded, s/he sometimes fails to keep others adequately informed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Frequently fails to keep others adequately informed</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Careful to keep others informed in a timely manner</td>
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
				            <td class="text-start" colspan="3">Selects appropriate methods of communication</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Implements highly effective and often innovative communication methods</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Occasionally selects inappropriate methods of communication</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Too often he/she does not select or use appropriate communication methods</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comms_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When communicating, s/he is very good at selecting and using the most effective methods</td>
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
				            <td class="text-start" colspan="3">Hardly comply, interrogate</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Requires frequent reminder</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Manifests sensitivity to compliance ‘walk-his-talk’ and ‘walk on extra mile’</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Reprimanded for some violation/noncompliance to policies and procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_1 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Consistently comply with company policies and procedures</td>
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
				            <td class="text-start" colspan="3">Routinely observes safety and security procedures</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">A leader in carefully observing and monitoring proper safety and security procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Fails to observe proper safety and security procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Careful about observing safety and security procedures</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Upon occasion, has not observed proper safety and security procedures</td>
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
				            <td class="text-start" colspan="3">When faced with situations not covered by normal guidelines, he/she usually arrives at an appropriate action</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Even under very unusual conditions not covered by the normal guidelines, he/she quickly sizes up the situation and determines the appropriate action</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">When a situation arises that is not covered by the normal guidelines, he/she has difficulty determining an appropriate action</td>
				        </tr>
						<tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has little difficulty arriving at the most appropriate action when faced with situations not covered by normal guidelines</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_3 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Has had some difficulty determining an appropriate action when faced with a situation outside the normal guidelines</td>
				        </tr>
					
				        <!-- 10.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.4 EXPECTED OUTCOME:</strong> Uses equipment and materials properly</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Although s/he has been properly trained, he/she has created unsafe situations by misusing equipment and materials</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">There have been times when s/he had to be warned about the improper use of equipment and materials</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Properly uses equipment and materials</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Takes careful precautions when using equipment and materials</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_4 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Pays exceptional attention to ensure proper use of equipment and materials</td>
				        </tr>
					
				        <!-- 10.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>10.5 EXPECTED OUTCOME:</strong> Observes proper deportment and decorum – social traits such as disposition, tact, appearance, behavior, and conduct</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Often inappropriate, does not follow professional decorum</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Sometimes exhibits behavior that is unprofessional or not in line with company standards</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Usually adheres to proper deportment and decorum</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Demonstrates professional behavior and appearance consistently</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Exemplifies outstanding deportment and decorum, setting a standard for others</td>
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
				            <td class="text-start" colspan="3">Normally tactful, usually obtains cooperation and respect of others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Occasionally able to get the respect and cooperation of others. Needs to improve relationship with co-workers</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Strong force for office morale. Always obtains cooperation and respect of others</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Gets out of his/her way to cooperate</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_6 == 1)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Dislikes to cooperate, cannot work harmoniously with others</td>
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
				            <td class="text-start" colspan="3">Has very low regard for work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 4)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Possesses great interest in work</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Displays little interest. Not conscious of doing a good job.</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 5)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Demonstrates professional behavior and appearance consistently</td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->comp_rating_5 == 3)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">Shows moderate interest in work</td>
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
								<h5><strong>XI.A Attendance & Punctuality (4%)</strong></h5>
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
							<td class="text-start" colspan="3">Before he/she takes time off, s/he gives advance notice whenever possible</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Always works out a mutually agreeable time off schedule with superior and coworkers</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">There have been too many occasions when s/he has taken time off without providing adequate notice</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Usually works out time off arrangements in advance</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_1 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Needs to give more advance notice before s/he takes time off</td>
						</tr>
				
						<!-- 11A.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>11A.2 EXPECTED OUTCOME:</strong> Begins working on time</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 3) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Usually begins work on time</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Consistently ready for work at the scheduled times</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Begins work late more frequently than acceptable</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Rarely begins work late</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_2 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Occasionally begins work late</td>
						</tr>
				
						<!-- 11A.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>11A.3 EXPECTED OUTCOME:</strong> Ensures work responsibilities are covered when absent</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 3) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When late or absent, s/he generally makes sure that his/her responsibilities are covered</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When out of the office, s/he makes a special effort to ensure that his/her commitments are met and problems resolved</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When late or absent, problems have occurred because s/he failed to confirm that his/her responsibilities were adequately covered</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When out of the office, s/he confirms that his/her responsibilities and commitments are managed</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_3 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">When late or absent, s/he has not always confirmed that his/her responsibilities are covered</td>
						</tr>
				
						<!-- 11A.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="4"><strong>11A.4 EXPECTED OUTCOME:</strong> Arrives at meetings and appointments on time</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 3) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Normally on time for meetings and appointments</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 5) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Sets a good example for others by always arriving promptly for meetings and appointments</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 1) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Inconveniences others by being late for meetings</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 4) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Prompt for meetings and appointments</td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->attend_rating_4 == 2) <i class="fa fa-check fa-lg"></i> @endif
							</td>
							<td class="text-start" colspan="3">Inconveniences others by often being late for meetings</td>
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
									<h5><strong>XI.B ACTUAL RECORDS OF HRD (8%)</strong></h5>
								</td>
								<td colspan="3">
									<p class="text-start text-wrap">CONSOLIDATED RECORDS OF PUNCTUALITY, UNDERTIME, AND UNSCHEDULED LEAVE</p>
								</td>
							</tr>
						</tbody>
				</table>
				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						{{-- punctuality --}}
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
						<tr>
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
				        </tr>
						<tr>
							<td colspan="2"></td>
							<td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ 6 MOS.</strong></td>
							<td class="table-secondary table-bordered border-dark"><strong><u>{{ $attendance->late_rating_score * 6 }}</u> ÷ </strong> 6 <strong> = <u>{{ $attendance->late_rating_score }}</u></strong></td>
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
				        <tr>
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
				        </tr>
				        <tr>
				            <td colspan="2"></td>
				            <td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ 6 MOS.</strong></td>
				            <td class="table-secondary table-bordered border-dark"><strong><u>{{ $attendance->ut_rating_score * 6 }}</u> ÷ </strong> 6 <strong> = <u>{{ $attendance->ut_rating_score }}</u></strong></td>
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
				        <tr>
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
				        </tr>
				        <tr>
				            <td colspan="2"></td>
				            <td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ 6 MOS.</strong></td>
				            <td class="table-secondary table-bordered border-dark"><strong><u>{{ $attendance->late_rating_score * 6 }}</u> ÷ </strong> 6 <strong> = <u>{{ $attendance->late_rating_score }}</u></strong></td>
				            <td class="table-secondary table-bordered border-dark"></td>
				        </tr>
				    </tbody>
				</table>
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <tr>
				            <td class="text-center" width="31%">
				            </td>
							<td></td>
				            <td class="text-center align-middle" style="border-top: hidden; border-right:hidden;" width="23%"><strong></strong></td>
				            <td class="text-center align-middle" style="border-top: hidden; border-right:hidden;" width="23%"><strong></strong></td>
				            <td class="text-center align-middle" style="border-top: hidden; border-right:hidden;" width="23%"><strong></strong></td>
				        </tr>
				        <tr>
				            <td style="border-top: hidden"><strong>SUMMARY</strong></td>
				            <td style="border-top: hidden" width="5%"><strong>RATINGS</strong></td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				        </tr>
				        <tr>
				            <td class="text-start">PUNCTUALITY RECORD</td>
				            <td>{{ $attendance->late_rating_score }}</td>
				           	<td style="border-top: hidden; border-right:hidden;"></td>
				           	<td style="border-top: hidden; border-right:hidden;"></td>
				           	<td style="border-top: hidden; border-right:hidden;"></td>
				        </tr>
				        <tr>
				            <td class="text-start">UNDERTIME RECORD</td>
				            <td>{{ $attendance->ut_rating_score }}</td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				        </tr>
				        <tr>
				            <td class="text-start">UNSCHEDULED LEAVE RECORD</td>
				            <td>{{ $attendance->ul_rating_score }}</td>
							<td style="border-top: hidden; border-right:hidden;"></td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				            <td style="border-top: hidden; border-right:hidden;"></td>
				        </tr>
				        <tr>
				            <td class="table-secondary table-bordered border-dark"><strong>AVERAGE = TOTAL ÷ 3</strong></td>
				            <td class="table-secondary table-bordered border-dark"><strong><u>{{ $attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score }}</u> ÷ </strong> 3 <strong> = <u>{{ ($attendance->late_rating_score + $attendance->ut_rating_score + $attendance->ul_rating_score) / 3 }}</u></strong></td>
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
<?php
function getMonthYear($startMonth, $offset) {
    $currentYear = date('Y');
    $month = ($startMonth + $offset) % 12;
    $year = $currentYear + floor(($startMonth + $offset) / 12);
    return date('M Y', mktime(0, 0, 0, $month, 1, $year));
}

$late_start_month = $attendance->late_start_month; // Assuming this comes from your database
$months = [];
for ($i = 0; $i < 6; $i++) {
    $months[] = getMonthYear($late_start_month, $i);
}
?>
</html>