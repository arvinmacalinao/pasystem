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
							<h5>(Senior Managers and Executives)</h5></td>
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
						@if(date('Y', $appraisal->evaluation_date == 2024))
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->period }} - 2024</h5></td>
						@elseif(date('Y',$appraisal->evaluation_date == 2025))
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->period }} - 2024</h5></td>
						@else
						<td width="33%" class="text-center dtr-border-bottom"><h5>{{ $appraisal->period }} {{ date('Y', strtotime($appraisal->evaluation_date)) }}</h5></td>
						@endif
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
						<tr>
							<td class="table-secondary table-bordered border-dark text-start" width="20%" colspan="2" class=""><h5><strong> MANAGEMENT AND <br>ORGANIZATIONAL SKILLS (40%)</strong></h5></td>
							<td class="text-start text-wrap" colspan="2"><p align="left" class="text-wrap"></td>
						</tr>
						{{-- 1.1 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.1. TECHNICAL EXPERTISE: &nbsp;&nbsp;&nbsp;</strong><span class="text-wrap">Shows advanced, comprehensive, persuasive knowledge of skills needed to carry out responsibilities of the job. Applies strong business acumen, expert-level knowledge gained through rigorous training and experience. Always on the look-out of new developments in the field; shares relevant information with management.</span></td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_1 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Expert Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_1 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Advanced Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_1 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Intermediate Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_1 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Novice (Limited)</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_1 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fundamental Awareness (Basic Knowledge)</td>
						</tr>

						{{-- 1.2 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.2. PLANNING: &nbsp;&nbsp;&nbsp;</strong><span class="text-wrap">Accurately forecasts relevant operating and business conditions; establishes productive objectives, strategies, and plans; develops effective budgets; establishes priorities; develops efficient work schedules and plans.</span></td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_2 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Expert Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Advanced Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_2 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Intermediate Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_2 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Novice (Limited)</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_2 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fundamental Awareness (Basic Knowledge)</td>
						</tr>

						{{-- 1.3 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.3. ADMINISTRATION: &nbsp;&nbsp;&nbsp;</strong><span class="text-wrap"> Measures effectiveness in planning, organizing, and efficiently handling activities and eliminating unnecessary activities.</span></td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_3 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Expert Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_3 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Advanced Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_3 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Intermediate Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_3 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Novice (Limited)</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_3 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fundamental Awareness (Basic Knowledge)</td>
						</tr>

						{{-- 1.4 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.4. FINANCIAL / EXPENSE MANAGEMENT: &nbsp;&nbsp;&nbsp;</strong><span class="text-wrap">Measures effectiveness in establishing appropriate reporting and control procedures; operating 
							efficiently at lowest cost; staying within established budgets. Plans and works within budget; effectively implements cost-saving procedures; effectively monitors expenditures.</span></td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_4 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Expert Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Advanced Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Intermediate Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_4 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Novice (Limited)</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_4 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fundamental Awareness (Basic Knowledge)</td>
						</tr>

						{{-- 1.5 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.5. BUSINESS RELATIONSHIPS: &nbsp;&nbsp;&nbsp;</strong><span class="text-wrap">Establishes and maintains effective business relationships within the context of the individual job responsibility. As appropriate, demonstrates effective business acquisitions skills, including participation in proposal writing, new product development, negotiation, alliance building, idea sharing thru collaboration, brainstorming with others to resolve shared problems.</span></td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_5 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Expert Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_5 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Advanced Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_5 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Intermediate Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_5 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Novice (Limited)</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_5 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fundamental Awareness (Basic Knowledge)</td>
						</tr>

						{{-- 1.6 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.6. STAFF UTILIZATION: &nbsp;&nbsp;&nbsp;</strong><span class="text-wrap">Ensures that all employees are treated fairly and with respect; develops personnel plans that meet anticipated needs and enhance individual growth; complies with established policies and procedures affecting human resource.</span></td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_6 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Expert Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_6 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Advanced Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_6 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Intermediate Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_6 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Novice (Limited)</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_6 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fundamental Awareness (Basic Knowledge)</td>
						</tr>

						{{-- 1.7 --}}
						<tr>
							<td class="text-start" colspan="3"><strong>1.7. STAFF DEVELOPMENT: &nbsp;&nbsp;&nbsp;</strong><span class="text-wrap">Effectively trains new employees and, when appropriate, cross-trains existing staff; initiates retraining; performs timely performance appraisals and ensures that appropriate goals are set.</span></td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_7 == 5)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Expert Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_7 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Advanced Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_7 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Intermediate Level</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_7 == 2)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">2 - Novice (Limited)</td>
						</tr>
						<tr>
							<td width="2%">
								@if($ratings->management_rating_7 == 1)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3">Fundamental Awareness (Basic Knowledge)</td>
						</tr>

						<tr>
							<td colspan="2" class="text-start table-secondary table-bordered border-dark"><strong>REMARKS FOR <br>THIS AREA:</strong> {{ $ratings->management_rating_remarks }}</td>
						</tr>	
						<tr>
							<td colspan="4" class="text-start table-secondary table-bordered border-dark"><strong>AVERAGE RATING FOR THIS AREA:     TOTAL = <u>{{ $ratings->management_rating_score*5 }}</u> ÷ </strong> 5 <strong> = <u>{{ $ratings->management_rating_score }}</u></strong></td>
						</tr>					
					</tbody>
				</table>

				{{-- II --}}
				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<!-- PEOPLE-MANAGEMENT -->
						<tr>
							<td class="text-start table-secondary table-bordered border-dark" colspan="2">
								<h5><strong>II.  PEOPLE MANAGEMENT (10%)</strong></h5>
							</td>
							<td class="" colspan="2">
								<p class="text-start text-wrap">THE DEGREE OF BEING CONCERN TO THE DEVELOPMENT OF SUBORDINATES THROUGH GUIDANCE, COACHING AND TRAINING AND PURSUES ACTION TOWARDS THIS GOAL.</p>
							</td>
						</tr>
				
						<!-- 2.1 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>2.1. EXPECTED OUTCOME: Provides direction and gains compliance</strong></td>
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
							<td class="text-start" colspan="3"><strong>1 - PROVIDES UNCLEAR DIRECTION</strong> and has difficulty gaining compliance from others</td>
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
				
						<!-- 2.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>2.2. EXPECTED OUTCOME: Includes subordinates in planning</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_2 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>MAKES SURE</strong> that his/her subordinates are an <strong>IMPORTANT</strong> part of all planning</td>
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
							<td class="text-start" colspan="3"><strong>IMPLEMENTS PLANNING PROCESSES</strong> that maximize the participation of his/her subordinates to get the best results</td>
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
				
						<!-- 2.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>2.3. EXPECTED OUTCOME: Takes responsibility for subordinates’ activities</strong></td>
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
				
						<!-- 2.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>2.4. EXPECTED OUTCOME: Makes self available to subordinates</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->pm_rating_4 == 4)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>MAKES EVERY EFFORT TO MAKE HIMSELF/ HERSELF ACCESSIBLE</strong> to his/her subordinates</td>
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
				
						<!-- 2.5 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>2.5. EXPECTED OUTCOME: Provides regular performance feedback and develops subordinates’ skills and encourages growth</strong></td>
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
							
				{{-- III --}}
				<table width="100%" class="table table-bordered border-dark text-center">
					<tbody>
						<!-- PROBLEM-SOLVING -->
						<tr>
							<td class="text-start table-secondary table-bordered border-dark" colspan="2">
								<h5><strong>III. PROBLEM-SOLVING (10%)</strong></h5>
							</td>
							<td class="" colspan="2">
								<p class="text-start text-wrap">CAPABILITY IN RECOGNIZING PROBLEM AREAS ENCOUNTERED IN WORK AS WELL AS THE ABILITY TO ESTABLISH APPROPRIATE MEASURES TO RESOLVE THESE PROBLEMS. THE ABILITY TO ANALYZE COMPLEX SITUATIONS AND EMPLOY THE BEST SOLUTION AT HAND.</p>
							</td>
						</tr>
				
						<!-- 3.1 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>3.1. EXPECTED OUTCOME: Identifies problems in a timely manner</strong></td>
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
							<td class="text-start" colspan="3">Identifies the <strong>EXISTENCE OF PROBLEMS QUICKLY</strong></td>
						</tr>
						
				
						<!-- 3.2 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>3.2. EXPECTED OUTCOME: Gathers and analyzes information skillfully</strong></td>
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
				
						<!-- 3.3 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>3.3. EXPECTED OUTCOME: Develops alternative solutions</strong></td>
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
							<td class="text-start" colspan="3">Addresses problem-solving situations by analyzing options and developing several alternative solutions
							</td>
						</tr>
				
						<!-- 3.4 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>3.4. EXPECTED OUTCOME: Resolves problems in early stages</strong></td>
						</tr>
						<tr>
							<td width="5%">
								@if($ratings->ps_rating_4 == 3)
									<i class="fa fa-check fa-lg"></i>
								@endif
							</td>
							<td class="text-start" colspan="3"><strong>USUALLY RESOLVES OR MINIMIZES</strong> most problems before they grow into larger issues</td>
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
						<!-- 3.5 EXPECTED OUTCOME -->
						<tr>
							<td class="text-start" colspan="3"><strong>3.5. EXPECTED OUTCOME: Works well in group problem solving situations</strong></td>
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
					
				{{-- IV --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section IV. JUDGMENT -->
				        <tr>
				            <td class="text-start table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>IV. JUDGMENT & DECISION-MAKING (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">THE ABILITY TO GIVE OUT OPINION CONSIDERING ALL ANGLES OF THE SITUATION AND TO ARRIVE AT A DECISION THAT IS WELL-THOUGHT OF MINIMIZING PREJUDICES TO THE COMPANY.</p>
				            </td>
				        </tr>
					
				        <!-- 4.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>4.1. EXPECTED OUTCOME: Displays willingness to make decisions</strong></td>
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
				            <td class="text-start" colspan="3"><strong>MAKES CONFIDENT DECISIONS</strong> in most areas of his/her job</td>
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
					
				        <!-- 4.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>4.2. EXPECTED OUTCOME: Exhibits sound and accurate judgment</strong></td>
				        </tr>
				        <tr>
				            <td width="5%">
				                @if($ratings->judgment_rating_2 == 2)
				                    <i class="fa fa-check fa-lg"></i>
				                @endif
				            </td>
				            <td class="text-start" colspan="3">2 - Has <strong>TOO OFTEN MADE DECISIONS</strong> that subsequently resulted <strong>IN PROBLEMS</strong> because they were not well thought out</td>
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
					
				        <!-- 4.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>4.3. EXPECTED OUTCOME: Supports and explains reasoning for decisions</strong></td>
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
					
				        <!-- 4.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>4.4. EXPECTED OUTCOME: Includes appropriate people in decision making process</strong></td>
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
					
				        <!-- 4.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>4.5. EXPECTED OUTCOME: Makes timely decisions</strong></td>
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

				{{-- V --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section V. Leadership -->
						<thead>
							<th class="table-secondary table-bordered border-dark text-center" colspan="4" class=text-center><strong>ON-THE-JOB BEHAVIOR</strong></th>
						</thead>
				        <tr>
				            <td class="text-start table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>V. LEADERSHIP (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">ABILITY TO INSPIRE PEERS AND SECURE THEIR COOPERATION TOWARDS A COMMON GOAL.</p>
				            </td>
				        </tr>
					
				        <!-- 5.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>5.1. EXPECTED OUTCOME: Exhibits confidence in self and others</strong></td>
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
					
				        <!-- 5.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>5.2. EXPECTED OUTCOME: Inspires respect and trust</strong></td>
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
				            <td class="text-start" colspan="3">1 - Because of his/her actions, s/he <strong>HAS NOT INSPIRED THE RESPECT</strong> and trust of others</td>
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
					
				        <!-- 5.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>5.3. EXPECTED OUTCOME: Reacts well under pressure</strong></td>
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
					
				        <!-- 5.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>5.4. EXPECTED OUTCOME: Shows courage to take action</strong></td>
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
					
				        <!-- 5.5 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>5.5. EXPECTED OUTCOME: Motivates others to perform well</strong></td>
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

				{{-- VI --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section VI. Innovation -->
				        <tr>
				            <td class="text-start table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>VI. INNOVATION (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">DEGREE OF CREATIVITY MANIFESTED AND ABILITY TO COME UP WITH NEW IDEAS WHICH COULD FACILITATE WORK PROCESS.</p>
				            </td>
				        </tr>

				        <!-- 6.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.1. EXPECTED OUTCOME: Displays original thinking and creativity</strong></td>
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
					
				        <!-- 6.2 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.3. EXPECTED OUTCOME: Meets challenges with resourcefulness</strong></td>
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
					
				        <!-- 6.3 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.3. EXPECTED OUTCOME: Generates suggestions for improving work</strong></td>
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
				            <td class="text-start" colspan="3">2 - It <strong>WOULD BE PREFERABLE</strong> if s/he offered more usable suggestions on how to improve work</td>
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
					
				        <!-- 6.4 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>6.4. EXPECTED OUTCOME: Develops innovative approaches and ideas</strong></td>
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

				{{-- VII --}}
				<table width="100%" class="table table-bordered border-dark text-center">
				    <tbody>
				        <!-- Section VII. Compliance -->
				        <tr>
				            <td class="text-start table-secondary table-bordered border-dark" colspan="2">
				                <h5><strong>VII. COMPLIANCE (10%)</strong></h5>
				            </td>
				            <td colspan="2">
				                <p class="text-start text-wrap">Disposition and effort exerted to observe and comply with company standards, policies, procedures, protocol, work ethics, among others in order to promote order, safety, security, harmony, and to avoid accidents, wastages, losses/damages of company resources/properties, injuries of personnel, among others.</p>
				            </td>
				        </tr>
					
				        <!-- 7.1 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>7.1 EXPECTED OUTCOME:</strong> Adheres to Company rules and regulations. Conforms to established policies and procedures.</td>
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
				            <td class="text-start" colspan="3"><strong>7.2 EXPECTED OUTCOME:</strong> Observes safety and security procedures</td>
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
				            <td class="text-start" colspan="3"><strong>7.3 EXPECTED OUTCOME:</strong> Determines appropriate action beyond guidelines</td>
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
				            <td class="text-start" colspan="3"><strong>7.4 EXPECTED OUTCOME:</strong> Uses equipment and materials properly</td>
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
				            <td class="text-start" colspan="3"><strong>7.5 EXPECTED OUTCOME:</strong> Observes proper deportment and decorum – social traits such as disposition, tact, appearance, behavior, and conduct</td>
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
				            <td class="text-start" colspan="3"><strong>7.6 EXPECTED OUTCOME:</strong> Observes proper interpersonal skills – the ability to work harmoniously with others towards the achievement of goals.</td>
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
				            <td class="text-start" colspan="3">Occasionally able to get the respect and cooperation of others. <strong>NEEDS TO IMPROVE</strong> relationship with co-workers</td>
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
				            <td class="text-start" colspan="3"><strong>DISLIKES TO COOPERATE</strong>, cannot work harmoniously with others</td>
				        </tr>

						<!-- 7.7 EXPECTED OUTCOME -->
				        <tr>
				            <td class="text-start" colspan="3"><strong>7.7 EXPECTED OUTCOME:</strong> Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned 
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
		</div>
		<br>
	</div>
</body>
</html>