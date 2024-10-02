<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
      <h4 class="card-title">PERFORMANCE APPRAISAL FORM</h4>
      <p class="card-text">(Technical/Professional/Specialist Rank & File)</p>
      {{-- form --}}
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-job-tab" data-coreui-toggle="tab" data-coreui-target="#nav-job" type="button" role="tab" aria-controls="nav-job" aria-selected="true"><strong>Job Knowledge</strong></button>
              <button class="nav-link" id="nav-quality-tab" data-coreui-toggle="tab" data-coreui-target="#nav-quality" type="button" role="tab" aria-controls="nav-quality" aria-selected="false"><strong>Quality of Work</strong></button>
              <button class="nav-link" id="nav-quantity-tab" data-coreui-toggle="tab" data-coreui-target="#nav-quantity" type="button" role="tab" aria-controls="nav-quantity" aria-selected="false"><strong>Quantity of Work</strong></button>
              <button class="nav-link" id="nav-problem-tab" data-coreui-toggle="tab" data-coreui-target="#nav-problem" type="button" role="tab" aria-controls="nav-problem" aria-selected="false"><strong>Problem Solving</strong></button>
              <button class="nav-link" id="nav-innovation-tab" data-coreui-toggle="tab" data-coreui-target="#nav-innovation" type="button" role="tab" aria-controls="nav-innovation" aria-selected="false"><strong>Innovation</strong></button>
              <button class="nav-link" id="nav-teamwork-tab" data-coreui-toggle="tab" data-coreui-target="#nav-teamwork" type="button" role="tab" aria-controls="nav-teamwork" aria-selected="false"><strong>Teamwork</strong></button>
              <button class="nav-link" id="nav-communication-tab" data-coreui-toggle="tab" data-coreui-target="#nav-communication" type="button" role="tab" aria-controls="nav-communication" aria-selected="false"><strong>Communications</strong></button>
              <button class="nav-link" id="nav-compliance-tab" data-coreui-toggle="tab" data-coreui-target="#nav-compliance" type="button" role="tab" aria-controls="nav-compliance" aria-selected="false"><strong>Compliances</strong></button>
              <button class="nav-link" id="nav-attendance-tab" data-coreui-toggle="tab" data-coreui-target="#nav-attendance" type="button" role="tab" aria-controls="nav-attendance" aria-selected="false"><strong>Attendance</strong></button>
            </div>
      </nav>
        <div class="tab-content" id="nav-tabContent">
        <!-- Content for Job Knowledge -->
        <div class="tab-pane fade show active" id="nav-job" role="tabpanel" aria-labelledby="nav-job-tab" tabindex="0">
            <form method="POST" action="{{ route('team.appraise', ['id' => $user->id, 'appraise_id' => $appraise_id]) }}" enctype="multipart/form-data">
                @csrf
            <h4>I. JOB KNOWLEDGE</h4>       
            <p>THE EXTENT OF TECHNICAL PROFICIENCY AND DEGREE OF UNDERSTANDING OF THE TASKS ASSIGNED. EMPLOYEE IS EXPECTED TO UNDERSTAND THE NATURE AND DETAILS OF THE TASKS BY APPLYING HIS/HER COMPETENCIES TO THE JOB.</p>       
            <!-- 1.1 EXPECTED OUTCOME -->       
            <div class="form-group">       
                <label for="expectedOutcome1_1"><strong>1.1. EXPECTED OUTCOME:</strong> Competent in required job knowledge and skills</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_3" value="3" required>       
                        <label class="form-check-label" for="jk_rating_1_3">       
                            Demonstrates competency in the skills and knowledge required       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_1_5">       
                            Demonstrates significant expertise at his/her job because of his/her in-depth knowledge and skills       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_1_1">       
                            Has not demonstrated that s/he has the skills and knowledge to fulfill the responsibilities of his/her position       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_1_4">       
                            Demonstrates a high level of competency in the skills and knowledge required       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_1_2">       
                            Improvement is needed in certain skills and job knowledge       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 1.2 EXPECTED OUTCOME -->       
            <div class="form-group">       
                <label for="expectedOutcome1_2"><strong>1.2. EXPECTED OUTCOME:</strong> Exhibits ability to learn and apply new skills</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_3" value="3" required>       
                        <label class="form-check-label" for="jk_rating_2_3">       
                            Learns and applies new skills within the expected time period       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_2_5">       
                            An exceptionally fast learner and able to quickly put new skills to use       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_2_1">       
                            It takes him/her too long to learn and apply new skills       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_2_4">       
                            Learns and applies new skills quickly       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_2_2">       
                            It sometimes takes him/her too long to learn and apply new skills       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 1.3 EXPECTED OUTCOME -->       
            <div class="form-group">       
                <label for="expectedOutcome1_3"><strong>1.3. EXPECTED OUTCOME:</strong> Keeps abreast of current developments</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_3" value="3" required>       
                        <label class="form-check-label" for="jk_rating_3_3">       
                            Knowledgeable about current developments in his/her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_3_5">       
                            Reads and researches extensively, staying on top of current developments that might impact her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_3_1">       
                            Fails to keep updated about current developments in his/her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_3_4">       
                            Does an excellent job of keeping himself/herself updated about current developments in his/her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_3_2">       
                            Should be more knowledgeable about current developments in his/ her field       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 1.4 EXPECTED OUTCOME -->       
            <div class="form-group">       
                <label for="expectedOutcome1_4"><strong>1.4. EXPECTED OUTCOME:</strong> Requires minimal supervision</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_3" value="3" required>       
                        <label class="form-check-label" for="jk_rating_4_3">       
                            Works within the normal scope of supervision       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_4_5">       
                            Performs extremely well with very little, if any, supervision or assistance needed       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_4_1">       
                            Needs more supervision and assistance than s/he should       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_4_4">       
                            Needs a minimal amount of supervision to fulfill his/her responsibilities       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_4_2">       
                            Needs slightly more supervision than s/he should to fulfill his/her responsibilities       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 1.5 EXPECTED OUTCOME -->       
            <div class="form-group">       
                <label for="expectedOutcome1_5"><strong>1.5. EXPECTED OUTCOME:</strong> Displays understanding of how job relates to others & uses resources effectively</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_3" value="3" required>       
                        <label class="form-check-label" for="jk_rating_5_3">       
                            Displays a good understanding of how his/her job relates to other jobs & effectively uses the resources and tools available       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_5_5">       
                            Has an extraordinary understanding of his/her job and the jobs of others & skillfully uses resources to maximum use       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_5_1">       
                            Does not completely understand how his/her job relates to others & s/he ineffectively uses the resources available       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_5_4">       
                            Has better than usual understanding of how his/her job relates to other jobs & takes advantage of the resources available       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_5_2">       
                            Would have better results if s/he understands how his/her job relates to others & has difficulty in effectively using the resources       
                        </label>       
                    </div>       
                </div>       
            </div>
            <div class="form-group">
                <label for="jk_rating_remarks"><strong>Remarks</strong></label>
                <textarea class="form-control" name="jk_rating_remarks" id="jk_rating_remarks" rows="3"></textarea>
                <input type="hidden" id="jk_rating_score" name="jk_rating_score" value="" />
            </div> 
            <br>
            <!-- Next Button -->
            <button type="button" class="btn btn-primary" id="next-to-job">Next</button>
        </div>
        {{-- end tab 1 --}}

        <!-- Content for Quality -->
        <div class="tab-pane fade" id="nav-quality" role="tabpanel" aria-labelledby="nav-quality-tab" tabindex="0">
            <h4>II. QUALITY OF WORK</h4>       
            <p>REFERS TO THE ACCURACY AND THOROUGHNESS OF WORK OUTPUT AND DEPENDABILITY OF RESULTS REGARDLESS OF AMOUNT OF WORK DONE. THE ABILITY TO DO TASKS RIGHT AT THE FIRST TIME.</p>       
            <!-- 2.1 EXPECTED OUTCOME: Demonstrates accuracy and thoroughness -->       
            <div class="form-group">       
                <label for="expectedOutcome2_1"><strong>2.1. EXPECTED OUTCOME:</strong> Demonstrates accuracy and thoroughness</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_1" value="1" required>       
                        <label class="form-check-label" for="quality_rating_1_1">       
                            Work does not reflect adequate attention to accuracy and completeness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_1_3">       
                            The work s/he produces meets standards for accuracy and completeness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_1_2">       
                            Sometimes the work s/he produces is less accurate and less thorough than his/her position requires       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_1_5">       
                            The quality of work s/he produces far exceeds expectations for accuracy & thoroughness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_1_4">       
                            The work s/he produces is usually highly accurate and thorough       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 2.2 EXPECTED OUTCOME: Displays commitment to excellence -->       
            <div class="form-group">       
                <label for="expectedOutcome2_2"><strong>2.2. EXPECTED OUTCOME:</strong> Displays commitment to excellence</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_1" value="1" required>       
                        <label class="form-check-label" for="quality_rating_2_1">       
                            Displays a lack of commitment to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_2_3">       
                            Regularly displays his/her commitment to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_2_2">       
                            Could display more commitment to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_2_5">       
                            A role model because of his/her dedication and commitment to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_2_4">       
                            Displays a strong dedication and commitment to excellence       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 2.3 EXPECTED OUTCOME: Looks for ways to improve and promote quality -->       
            <div class="form-group">       
                <label for="expectedOutcome2_3"><strong>2.3. EXPECTED OUTCOME:</strong> Looks for ways to improve and promote quality</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_1" value="1" required>       
                        <label class="form-check-label" for="quality_rating_3_1">       
                            Does not actively look for ways to improve quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_3_3">       
                            Looks for ways to improve quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_3_2">       
                            Needs to more actively look for ways to improve quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_3_5">       
                            Leads the organization in looking for ways to improve quality and promote quality awareness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_3_4">       
                            Works hard to improve quality in his/her own work and promotes quality awareness throughout the organization       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 2.4 EXPECTED OUTCOME: Applies feedback to improve performance -->       
            <div class="form-group">       
                <label for="expectedOutcome2_4"><strong>2.4. EXPECTED OUTCOME:</strong> Applies feedback to improve performance</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_1" value="1" required>       
                        <label class="form-check-label" for="quality_rating_4_1">       
                            The feedback he/she receives about his/her performance is not being applied       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_4_3">       
                            Applies the feedback he/she receives to improve his/her performance       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_4_2">       
                            Doesn’t always apply the feedback he/she receives to improve performance       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_4_5">       
                            Proactive about seeking feedback and using it to improve her performance       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_4_4">       
                            Often asks for feedback and uses it to improve his/her performance       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 2.5 EXPECTED OUTCOME: Monitors own work to ensure quality -->       
            <div class="form-group">       
                <label for="expectedOutcome2_5"><strong>2.5. EXPECTED OUTCOME:</strong> Monitors own work to ensure quality</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_1" value="1" required>       
                        <label class="form-check-label" for="quality_rating_5_1">       
                            Does an unacceptable job of monitoring his/her work to ensure quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_5_3">       
                            Monitors his/her work to meet quality standards       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_5_2">       
                            There are some quality problems because he/she does not adequately monitor his/her work       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_5_5">       
                            Has designed highly effective methods for monitoring his/her work to achieve & maintain the highest quality standards       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_5_4">       
                            Consistently and carefully monitors his/her work to ensure its quality       
                        </label>       
                    </div>       
                </div>       
            </div>   
            <div class="form-group">
                <label for="quality_rating_remarks"><strong>Remarks</strong></label>
                <textarea class="form-control" name="quality_rating_remarks" id="quality_rating_remarks" rows="3"></textarea>
                <input type="hidden" id="quality_rating_score" name="quality_rating_score" value="" />
            </div> 
                <br>
                <button type="button" class="btn btn-secondary" id="prev-to-job">Previous</button>
                <button type="button" class="btn btn-primary" id="next-to-quality">Next</button>
        </div>
        {{-- end tab 2 --}}

        <!-- Content for Quantity -->
        <div class="tab-pane fade" id="nav-quantity" role="tabpanel" aria-labelledby="nav-quantity-tab" tabindex="0">
            <h4>III. QUANTITY OF WORK</h4>       
            <p>THE ABILITY TO DELIVER GIVEN VOLUME OF OUTPUT IN A GIVEN TIME AND THE ABILITY TO PRODUCE REQUIRED QUALITY OF OUTPUT WITHIN REASONABLE TIME.</p>       
            <!-- 3.1 EXPECTED OUTCOME: Meets productivity standards -->       
            <div class="form-group">       
                <label for="expectedOutcome3_1"><strong>3.1. EXPECTED OUTCOME:</strong> Meets productivity standards</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_2" value="2" required>       
                        <label class="form-check-label" for="quantity_rating_1_2">       
                            Not always as productive as expected for his/her job       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_1_1">       
                            Produces less work than expected for his/her job       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_1_4">       
                            Usually produces more work than expected       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_1_3">       
                            Regularly produces a normal amount of work       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_1_5">       
                            Regularly exceeds the amount of work normally expected for this job       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 3.2 EXPECTED OUTCOME: Completes work in timely manner -->       
            <div class="form-group">       
                <label for="expectedOutcome3_2"><strong>3.2. EXPECTED OUTCOME:</strong> Completes work in timely manner</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_2" value="2" required>       
                        <label class="form-check-label" for="quantity_rating_2_2">       
                            It sometimes takes him/her longer than satisfactory to complete work and s/he too often misses deadlines       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_2_1">       
                            Work is not getting done within acceptable time frames       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_2_4">       
                            Often completes his/her work ahead of schedule       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_2_3">       
                            Completes his/her work in a timely manner and meets most deadlines       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_2_5">       
                            Routinely completes work ahead of schedule, always meeting his/her deadlines       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 3.3 EXPECTED OUTCOME: Strives to increase productivity -->       
            <div class="form-group">       
                <label for="expectedOutcome3_3"><strong>3.3. EXPECTED OUTCOME:</strong> Strives to increase productivity</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_2" value="2" required>       
                        <label class="form-check-label" for="quantity_rating_3_2">       
                            Could do more to demonstrate his/her commitment to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_3_1">       
                            Does not display much commitment to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_3_4">       
                            Demonstrates a strong commitment to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_3_3">       
                            Demonstrates a commitment to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_3_5">       
                            Sets a good example to others in his/her dedication to increasing productivity       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 3.4 EXPECTED OUTCOME: Works quickly -->       
            <div class="form-group">       
                <label for="expectedOutcome3_4"><strong>3.4. EXPECTED OUTCOME:</strong> Works quickly</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_2" value="2" required>       
                        <label class="form-check-label" for="quantity_rating_4_2">       
                            Works more slowly than the position requires       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_4_1">       
                            The pace at which s/he works is not adequate for this job       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_4_4">       
                            Works at a faster pace than normally expected for the position       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_4_3">       
                            Works at the pace expected for the position       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_4_5">       
                            Works at an exceptionally fast pace       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 3.5 EXPECTED OUTCOME: Achieves established goals -->       
            <div class="form-group">       
                <label for="expectedOutcome3_5"><strong>3.5. EXPECTED OUTCOME:</strong> Achieves established goals</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_2" value="2" required>       
                        <label class="form-check-label" for="quantity_rating_5_2">       
                            Does not always achieve his/her established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_5_1">       
                            Too often fails to achieve established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_5_4">       
                            Strives hard in the achievement of established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_5_3">       
                            Achieves most of his/her established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_5_5">       
                            Consistently pushes himself/ herself to achieve and surpass his/her established goals       
                        </label>       
                    </div>       
                </div>       
            </div>
            <div class="form-group">
                <label for="quantity_rating_remarks"><strong>Remarks</strong></label>
                <textarea class="form-control" name="quantity_rating_remarks" id="quantity_rating_remarks" rows="3"></textarea>
                <input type="hidden" id="quantity_rating_score" name="quantity_rating_score" value="" />
            </div> 
            <br>
            <button type="button" class="btn btn-secondary" id="prev-to-quantity">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-quantity">Next</button>
        </div>
        {{-- end tab 3 --}}  

        <!-- Content for Problem -->
        <div class="tab-pane fade" id="nav-problem" role="tabpanel" aria-labelledby="nav-problem-tab" tabindex="0"> 
            <h4>IV. Problem-Solving</h4>       
            <p>CAPABILITY IN RECOGNIZING PROBLEM AREAS ENCOUNTERED IN WORK AS WELL AS THE ABILITY TO ESTABLISH APPROPRIATE MEASURES TO RESOLVE THESE PROBLEMS. THE ABILITY TO ANALYZE COMPLEX SITUATIONS AND EMPLOY THE BEST SOLUTION AT HAND.</p>       
            <!-- 4.1 EXPECTED OUTCOME: Identifies problems in a timely manner -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_1"><strong>4.1. EXPECTED OUTCOME:</strong> Identifies problems in a timely manner</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_1_4">       
                                Identifies the existence of problems quickly       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_1_1">       
                                Identifies problems in a less than timely manner       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_1_5">       
                                Immediately identifies the existence and nature of problems       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_1_2">       
                                Sometimes late in identifying that problem situations exist       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_1_3">       
                                Identifies most problem situations within appropriate time frames       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.2 EXPECTED OUTCOME: Gathers and analyzes information skillfully -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_2"><strong>4.2. EXPECTED OUTCOME:</strong> Gathers and analyzes information skillfully</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_2_4">       
                                Skilled at gathering and analyzing information from multiple sources       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_2_1">       
                                Does not demonstrate the information gathering and analysis skills needed for his/her position       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_2_5">       
                                Extremely skilled at gathering and analyzing complex information from multiple sources       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_2_2">       
                                Information gathering and analysis are not always thorough enough for his/her position       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_2_3">       
                                Information gathering and analysis meet the requirements of his/her position       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.3 EXPECTED OUTCOME: Develops alternative solutions -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_3"><strong>4.3. EXPECTED OUTCOME:</strong> Develops alternative solutions</label>       
                    <div class="mt-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_3_4">       
                                Addresses problem-solving situations by analyzing options and developing several alternative solutions       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_3_1">       
                                Does not develop adequate alternative solutions as part of the problem-solving process       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_3_5">       
                                Routinely researches all options, developing the best alternative solutions       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_3_2">       
                                Would be better at problem-solving if s/he better developed alternative solutions       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_3_3">       
                                Most of the time, s/he develops several alternative solutions to problems       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.4 EXPECTED OUTCOME: Resolves problems in early stages -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_4"><strong>4.4. EXPECTED OUTCOME:</strong> Resolves problems in early stages</label>       
                    <div class="mt-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_4_4">       
                                Resolves or minimizes problems by addressing them in their early stages       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_4_1">       
                                Frequently, problems become larger issues because s/he fails to anticipate and resolve them earlier       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_4_5">       
                                Using his/her foresight and analytical skills, s/he quickly resolves problems in their earliest stages       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_4_2">       
                                Could do more to anticipate and resolve problems before they grow into larger issues       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_4_3">       
                                Usually resolves or minimizes most problems before they grow into larger issues       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.5 EXPECTED OUTCOME: Works well in group problem solving situations -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_5"><strong>4.5. EXPECTED OUTCOME:</strong> Works well in group problem solving situations</label>       
                    <div class="mt-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_5_4">       
                                In group situations, s/he contributes actively to help solve problems       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_5_1">       
                                Needs to participate more actively in group problem solving situations       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_5_5">       
                                In group problem solving situations, s/he is a key member, listening to all perspectives and helping the team come to resolution       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_5_2">       
                                Participation in group problem solving situations needs to improve       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_5_3">       
                                Participates well in group problem solving situations       
                            </label>       
                        </div>       
                    </div>       
                </div>            
                <div class="form-group">
                    <label for="ps_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="ps_rating_remarks" id="ps_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="ps_rating_score" name="ps_rating_score" value="" />
                </div> 
            <br>
            <button type="button" class="btn btn-secondary" id="prev-to-problem">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-problem">Next</button>
        </div>
        {{-- end tab 4 --}}

        <!-- Content for Innovation -->
        <div class="tab-pane fade" id="nav-innovation" role="tabpanel" aria-labelledby="nav-innovation-tab" tabindex="0">
            <h4>V. Innovation</h4>
            <p>DEGREE OF CREATIVITY MANIFESTED AND ABILITY TO COME UP WITH NEW IDEAS WHICH COULD 
                FACILITATE WORK PROCESS.
            </p>
            <!-- 5.1 EXPECTED OUTCOME: Displays original thinking and creativity -->
                <div class="form-group">
                    <label for="expectedOutcome5_1"><strong>5.1. EXPECTED OUTCOME:</strong> Displays original thinking and creativity</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_1_3">
                                Displays creativity and original thinking in his/her work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_1_2">
                                Needs to display more creativity and original thinking to meet the minimum expectations for his/her position
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_1_1">
                                Has not displayed enough creativity or original thinking in his/her work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_1_5">
                                Displays brilliance in his/her creativity and original thinking 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_1_4">
                                Often displays creativity and original thinking beyond the expectations for his/her position
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 5.2 EXPECTED OUTCOME: Meets challenges with resourcefulness -->
                <div class="form-group">
                    <label for="expectedOutcome5_2"><strong>5.2. EXPECTED OUTCOME:</strong> Meets challenges with resourcefulness</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_2_3">
                                Usually resourceful when faced with unexpected challenges
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_2_2">
                                Not always resourceful enough when faced with unexpected challenges
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_2_1">
                                Does not show the necessary resourcefulness when faced with unexpected challenges
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_2_5">
                                When faced with unexpected challenges, s/he is extremely resourceful 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_2_4">
                                When faced with unexpected challenges, s/he is very resourceful
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 5.3 EXPECTED OUTCOME: Generates suggestions for improving work -->
                <div class="form-group">
                    <label for="expectedOutcome5_3"><strong>5.3. EXPECTED OUTCOME:</strong> Generates suggestions for improving work</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_3_3">
                                Contributes usable suggestions for improving work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_3_2">
                                It would be preferable if s/he offered more usable suggestions on how to improve work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_3_1">
                                Rarely contributes usable suggestions for improving work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_3_5">
                                On a consistent basis, s/he contributes highly ingenious and valuable suggestions for improving work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_3_4">
                                Generates many usable and ingenious suggestions for improving work
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 5.4 EXPECTED OUTCOME: Develops innovative approaches and ideas -->
                <div class="form-group">
                    <label for="expectedOutcome5_4"><strong>5.4. EXPECTED OUTCOME:</strong> Develops innovative approaches and ideas</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_4_3">
                                Has developed innovative approaches and ideas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_4_2">
                                Has not developed many innovative approaches or ideas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_4_1">
                                Approaches and ideas have not been innovated enough for his/her position
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_4_5">
                                Has produced innovative approaches and ideas that are far above the expectations for his/her position 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_4_4">
                                Has developed some highly innovative approaches and ideas
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inno_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="inno_rating_remarks" id="inno_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="inno_rating_score" name="inno_rating_score" value="" />
                </div> 
            <br>
            <button type="button" class="btn btn-secondary" id="prev-to-innovation">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-innovation">Next</button>
        </div>
        {{-- end tab 5 --}}

        <!-- Content for Teamwork -->
        <div class="tab-pane fade" id="nav-teamwork" role="tabpanel" aria-labelledby="nav-teamwork-tab" tabindex="0">
            <h4>VI. Teamwork</h4>
            <p>ABILITY TO ADJUST TO WORK DEMANDS, ADAPT TO WORK CHANGES, PROVIDE SUPPORT AND 
                COORDINATION WITH THE TEAM FOR COMPANY OBJECTIVES, AND PROMOTE COHESIVENESS OF 
                THE GROUP THROUGH MUTUAL TRUST AND SUPPORT AMONG THE MEMBERS.
            </p>
            <!-- 6.1 EXPECTED OUTCOME: Balances team and individual responsibilities -->
            <div class="form-group">
                <label for="expectedOutcome6_1"><strong>6.1. EXPECTED OUTCOME:</strong> Balances team and individual responsibilities</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_1" id="tw_rating_1_5" value="5" required>
                        <label class="form-check-label" for="tw_rating_1_5">
                            Skill at balancing the needs of the team with his/her individual responsibilities is outstanding
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_1" id="tw_rating_1_1" value="1" required>
                        <label class="form-check-label" for="tw_rating_1_1">
                            Has trouble meeting his/her team responsibilities as well as his/her own
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_1" id="tw_rating_1_4" value="4" required>
                        <label class="form-check-label" for="tw_rating_1_4">
                            Does an admirable job of balancing the needs of the team with his/her individual responsibilities
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_1" id="tw_rating_1_2" value="2" required>
                        <label class="form-check-label" for="tw_rating_1_2">
                            Has had some difficulty balancing team responsibilities with his/her own individual responsibilities
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_1" id="tw_rating_1_3" value="3" required>
                        <label class="form-check-label" for="tw_rating_1_3">
                            Has been able to balance the needs of the team with his/her individual responsibilities
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- 6.2 EXPECTED OUTCOME: Exhibits objectivity and openness to others’ views -->
            <div class="form-group">
                <label for="expectedOutcome6_2"><strong>6.2. EXPECTED OUTCOME:</strong> Exhibits objectivity and openness to others’ views</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_2" id="tw_rating_2_5" value="5" required>
                        <label class="form-check-label" for="tw_rating_2_5">
                            Welcomes the opinions and views of others, always maintaining a high degree of objectivity
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_2" id="tw_rating_2_1" value="1" required>
                        <label class="form-check-label" for="tw_rating_2_1">
                            Often does not show objectivity or respect for the views of others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_2" id="tw_rating_2_4" value="4" required>
                        <label class="form-check-label" for="tw_rating_2_4">
                            Exhibits a high degree of openness and objectivity to the views of others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_2" id="tw_rating_2_2" value="2" required>
                        <label class="form-check-label" for="tw_rating_2_2">
                            There have been situations when he/she did not show adequate objectivity or openness to the views of others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_2" id="tw_rating_2_3" value="3" required>
                        <label class="form-check-label" for="tw_rating_2_3">
                            Exhibits objectivity and openness to the views of others
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- 6.3 EXPECTED OUTCOME: Gives and welcomes feedback -->
            <div class="form-group">
                <label for="expectedOutcome6_3"><strong>6.3. EXPECTED OUTCOME:</strong> Gives and welcomes feedback</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_3" id="tw_rating_3_5" value="5" required>
                        <label class="form-check-label" for="tw_rating_3_5">
                            Gives honest, constructive feedback to team members and, in turn, actively requests feedback from them
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_3" id="tw_rating_3_1" value="1" required>
                        <label class="form-check-label" for="tw_rating_3_1">
                            Resists giving and receiving constructive feedback
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_3" id="tw_rating_3_4" value="4" required>
                        <label class="form-check-label" for="tw_rating_3_4">
                            Gives honest, constructive feedback and welcomes it from team members
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_3" id="tw_rating_3_2" value="2" required>
                        <label class="form-check-label" for="tw_rating_3_2">
                            Lacks certain skills in giving and receiving constructive feedback
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_3" id="tw_rating_3_3" value="3" required>
                        <label class="form-check-label" for="tw_rating_3_3">
                            Gives constructive feedback to and accepts it from team members
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- 6.4 EXPECTED OUTCOME: Contributes to building a positive team spirit -->
            <div class="form-group">
                <label for="expectedOutcome6_4"><strong>6.4. EXPECTED OUTCOME:</strong> Contributes to building a positive team spirit</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_4" id="tw_rating_4_5" value="5" required>
                        <label class="form-check-label" for="tw_rating_4_5">
                            A leader in building a strong team spirit and identity
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_4" id="tw_rating_4_1" value="1" required>
                        <label class="form-check-label" for="tw_rating_4_1">
                            Has had a negative impact on team morale
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_4" id="tw_rating_4_4" value="4" required>
                        <label class="form-check-label" for="tw_rating_4_4">
                            Works hard to build a positive team spirit and identity
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_4" id="tw_rating_4_2" value="2" required>
                        <label class="form-check-label" for="tw_rating_4_2">
                            Contributions to building a positive team spirit have been minimal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_4" id="tw_rating_4_3" value="3" required>
                        <label class="form-check-label" for="tw_rating_4_3">
                            Contributes to building a positive team spirit
                        </label>
                    </div>
                </div>
            </div>
            
            <!-- 6.5 EXPECTED OUTCOME: Puts success of team above own interests -->
            <div class="form-group">
                <label for="expectedOutcome6_5"><strong>6.5. EXPECTED OUTCOME:</strong> Puts success of team above own interests</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_5" id="tw_rating_5_5" value="5" required>
                        <label class="form-check-label" for="tw_rating_5_5">
                            All his/her actions are directed toward the success of the team over his/her own interests
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_5" id="tw_rating_5_1" value="1" required>
                        <label class="form-check-label" for="tw_rating_5_1">
                            Puts his/her own interests above the interests of the team
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_5" id="tw_rating_5_4" value="4" required>
                        <label class="form-check-label" for="tw_rating_5_4">
                            Keeps the success of the team in the forefront of all his/her actions
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_5" id="tw_rating_5_2" value="2" required>
                        <label class="form-check-label" for="tw_rating_5_2">
                            Needs to give more attention to making the team successful rather than furthering his/her own interests
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tw_rating_5" id="tw_rating_5_3" value="3" required>
                        <label class="form-check-label" for="tw_rating_5_3">
                            Puts the success of the team above his/her own interests
                        </label>
                    </div>
                </div>
            </div>         
            <div class="form-group">
                <label for="tw_rating_remarks"><strong>Remarks</strong></label>
                <textarea class="form-control" name="tw_rating_remarks" id="tw_rating_remarks" rows="3"></textarea>
                <input type="hidden" id="tw_rating_score" name="tw_rating_score" value="" />
            </div> 
            <br>
            <button type="button" class="btn btn-secondary" id="prev-to-teamwork">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-teamwork">Next</button>
        </div>
        {{-- end tab 6 --}}

        <!-- Content for Communication -->
        <div class="tab-pane fade" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab" tabindex="0">
            <h4>VII. Communications</h4>
            <p>ABILITY TO RECEIVE AND CONVEY VERBAL AND WRITTEN COMMUNICATION EFFECTIVELY IN A PRECISE AND CONCISE MANNER. EXHIBITS OPENNESS AND SUPPORT TO ALL CHANNELS OF COMMUNICATION.</p>       
            <!-- 7.1 EXPECTED OUTCOME: Expresses ideas and thoughts verbally -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_1"><strong>7.1. EXPECTED OUTCOME:</strong> Expresses ideas and thoughts verbally</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_1_3">       
                                Displays effective verbal communications skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_1_5">       
                                Displays superior verbal skills, communicating clearly, concisely, and in meaningful ways       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_1_2">       
                                Needs to improve his/her verbal communications skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_1_1">       
                                Does not display the verbal communications skills required       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_1_4">       
                                Displays very good verbal skills, communicating clearly and concisely       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.2 EXPECTED OUTCOME: Expresses ideas and thoughts in written form -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_2"><strong>7.2. EXPECTED OUTCOME:</strong> Expresses ideas and thoughts in written form</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_2_3">       
                                Written communications skills meet the requirements of his/her position       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_2_5">       
                                Demonstrates outstanding written communications skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_2_2">       
                                Requires more assistance than desirable to produce written communications that meet the job’s requirements       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_2_1">       
                                Written communications fall short of the quality needed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_2_4">       
                                Demonstrates excellent written communications skills       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.3 EXPECTED OUTCOME: Exhibits good listening and comprehension -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_3"><strong>7.3. EXPECTED OUTCOME:</strong> Exhibits good listening and comprehension</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_3_3">       
                                Listens and comprehends well       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_3_5">       
                                Listens carefully, asks perceptive questions, and quickly comprehends new or highly complex matters       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_3_2">       
                                Does not always exhibit good listening and comprehension skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_3_1">       
                                Does not exhibit the listening and comprehension skills necessary for satisfactory performance of his/her job       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_3_4">       
                                Exhibits good listening skills and comprehends complex matters well       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.4 EXPECTED OUTCOME: Keeps others adequately informed -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_4"><strong>7.4. EXPECTED OUTCOME:</strong> Keeps others adequately informed</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_4_3">       
                                Keeps others adequately informed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_4_5">       
                                Extremely thorough and proactive about keeping others well informed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_4_2">       
                                Unless reminded, s/he sometimes fails to keep others adequately informed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_4_1">       
                                Frequently fails to keep others adequately informed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_4_4">       
                                Careful to keep others informed in a timely manner       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.5 EXPECTED OUTCOME: Selects and uses appropriate communication methods -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_5"><strong>7.5. EXPECTED OUTCOME:</strong> Selects and uses appropriate communication methods</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_5_3">       
                                Selects appropriate methods of communication       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_5_5">       
                                Implements highly effective and often innovative communication methods       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_5_2">       
                                Occasionally selects inappropriate methods of communication       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_5_1">       
                                Too often he/she does not select or use appropriate communication methods       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_5_4">       
                                When communicating, s/he is very good at selecting and using the most effective methods       
                            </label>       
                        </div>       
                    </div>       
                </div>                
                <div class="form-group">
                    <label for="comms_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="comms_rating_remarks" id="comms_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="comms_rating_score" name="comms_rating_score" value="" />
                </div> 
            <br>            
            <button type="button" class="btn btn-secondary" id="prev-to-communication">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-communication">Next</button>
        </div>
        {{-- end tab 7 --}}

        <!-- Content for Compliances -->
        <div class="tab-pane fade" id="nav-compliance" role="tabpanel" aria-labelledby="nav-compliance-tab" tabindex="0">
            <h4>VIII. Compliances</h4>
            <p>DISPOSITION AND EFFORT EXERTED TO OBSERVE AND COMPLY TO COMPANY STANDARDS, POLICIES, PROCEDURES, PROTOCOL, WORK ETHICS, AMONG OTHERS IN ORDER TO PROMOTE ORDER, SAFETY, SECURITY, HARMONY, AND TO AVOID ACCIDENTS, WASTAGES, LOSSES / DAMAGES OF COMPANY RESOURCES/PROPERTIES, INJURIES OF PERSONNEL, AMONG OTHERS.</p>       
            <!-- 7.1 EXPECTED OUTCOME: Adheres to Company rules and regulations -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_1"><strong>8.1. EXPECTED OUTCOME:</strong> Adheres to Company rules and regulations. Conforms to established policies and procedures.</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_1_1">       
                                Hardly comply, interrogate       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_1_3">       
                                Requires frequent reminder       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_1_4">       
                                Manifests sensitivity to compliance ‘walk-his-talk’ and ‘walk on extra mile’       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_1_2">       
                                Reprimanded for some violation/noncompliance to policies and procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_1_5">       
                                Consistently comply with company policies and procedures       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.2 EXPECTED OUTCOME: Observes safety and security procedures -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_2"><strong>8.2. EXPECTED OUTCOME:</strong> Observes safety and security procedures</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_2_3">       
                                Routinely observes safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_2_5">       
                                A leader in carefully observing and monitoring proper safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_2_1">       
                                Fails to observe proper safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_2_4">       
                                Careful about observing safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_2_2">       
                                Upon occasion, has not observed proper safety and security procedures       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.3 EXPECTED OUTCOME: Determines appropriate action beyond guidelines -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_3"><strong>8.3. EXPECTED OUTCOME:</strong> Determines appropriate action beyond guidelines</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_3_3">       
                                When faced with situations not covered by normal guidelines, he/she usually arrives at an appropriate action       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_3_5">       
                                Even under very unusual conditions not covered by the normal guidelines, he/she quickly sizes up the situation and determines the appropriate action       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_3_1">       
                                When a situation arises that is not covered by the normal guidelines, he/she has difficulty determining an appropriate action       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_3_4">       
                                Has little difficulty arriving at the most appropriate action when faced with situations not covered by normal guidelines       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_3_2">       
                                Has had some difficulty determining an appropriate action when faced with a situation outside the normal guidelines       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.4 EXPECTED OUTCOME: Uses equipment and materials properly -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_4"><strong>8.4. EXPECTED OUTCOME:</strong> Uses equipment and materials properly</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_4_3">       
                                Properly uses equipment and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_4_5">       
                                Pays exceptional attention to ensure proper use of equipment and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_4_1">       
                                Although s/he has been properly trained, he/she has created unsafe situations by misusing equipment and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_4_4">       
                                Takes careful precautions when using equipment and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_4_2">       
                                There have been times when s/he had to be warned about the improper use of equipment and materials       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.5 EXPECTED OUTCOME: Observes proper deportment and decorum -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_5"><strong>8.5. EXPECTED OUTCOME:</strong> Observes proper deportment and decorum – social traits such as disposition, tact, appearance, behavior, and conduct</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_5_3">       
                                Could be expected to present a business-like attitude with constant reminders       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_5_2">       
                                Showed misdemeanor       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_5_5">       
                                Role model in terms of grooming and basic corporate ethics       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_5_4">       
                                Demonstrated tact and diligence       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_5_1">       
                                Fails to adhere to standards       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.6 EXPECTED OUTCOME: Observes proper interpersonal skills -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_6"><strong>8.6. EXPECTED OUTCOME:</strong> Observes proper interpersonal skills – the ability to work harmoniously with others towards the achievement of goals.</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_6_4">       
                                Normally tactful, usually obtains cooperation and respect of others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_6_2">       
                                Occasionally able to get the respect and cooperation of others. Needs to improve relationship with co-workers.       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_6_5">       
                                Strong force for office morale. Always obtains cooperation and respect of others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_6_3">       
                                Gets out of his/her way to cooperate       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_6_1">       
                                Dislikes to cooperate, cannot work harmoniously with others       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.7 EXPECTED OUTCOME: Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned tasks -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_7"><strong>8.7. EXPECTED OUTCOME:</strong> Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned tasks.</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_7_1">       
                                Has very low regard for work       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_7_4">       
                                Possesses great interest in work       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_7_2">       
                                Displays little interest. Not conscious of doing a good job.       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_7_5">       
                                Exceptionally enthusiastic about work       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_7_3">       
                                Shows moderate interest in work       
                            </label>       
                        </div>       
                    </div>       
                </div>            
                <div class="form-group">
                    <label for="comp_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="comp_rating_remarks" id="comp_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="comp_rating_score" name="comp_rating_score" value="" />
                </div> 
            <br>            
            <button type="button" class="btn btn-secondary" id="prev-to-compliance">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-compliance">Next</button>
        </div>
        {{-- end tab 8 --}}

        <!-- Content for Attendance -->
        <div class="tab-pane fade" id="nav-attendance" role="tabpanel" aria-labelledby="nav-attendance-tab" tabindex="0"> 
            <h4>IX.A Attendance & Punctuality</h4>
            <p>REGULARITY IN ATTENDANCE, PUNCTUALITY IN REPORTING FOR WORK, AND EFFECTIVE MANAGEMENT OF TIME.</p>       
            <!-- 8A.1 EXPECTED OUTCOME: Schedules time off in advance -->       
              <div class="form-group">       
                  <label for="expectedOutcome9A_1"><strong>9A.1. EXPECTED OUTCOME:</strong> Schedules time off in advance</label>       
                  <div class="mb-3">       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_3" value="3" required>       
                          <label class="form-check-label" for="attend_rating_1_3">       
                              Before he/she takes time off, s/he gives advance notice whenever possible       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_5" value="5" required>       
                          <label class="form-check-label" for="attend_rating_1_5">       
                              Always works out a mutually agreeable time off schedule with superior and coworkers       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_1" value="1" required>       
                          <label class="form-check-label" for="attend_rating_1_1">       
                              There have been too many occasions when s/he has taken time off without providing adequate notice       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_4" value="4" required>       
                          <label class="form-check-label" for="attend_rating_1_4">       
                              Usually works out time off arrangements in advance       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_2" value="2" required>       
                          <label class="form-check-label" for="attend_rating_1_2">       
                              Needs to give more advance notice before s/he takes time off       
                          </label>       
                      </div>       
                  </div>       
              </div>       
              <!-- 8A.2 EXPECTED OUTCOME: Begins working on time -->       
              <div class="form-group">       
                  <label for="expectedOutcome9A_2"><strong>9A.2. EXPECTED OUTCOME:</strong> Begins working on time</label>       
                  <div class="mb-3">       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_3" value="3" required>       
                          <label class="form-check-label" for="attend_rating_2_3">       
                              Usually begins work on time       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_5" value="5" required>       
                          <label class="form-check-label" for="attend_rating_2_5">       
                              Consistently ready for work at the scheduled times       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_1" value="1" required>       
                          <label class="form-check-label" for="attend_rating_2_1">       
                              Begins work late more frequently than acceptable       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_4" value="4" required>       
                          <label class="form-check-label" for="attend_rating_2_4">       
                              Rarely begins work late       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_2" value="2" required>       
                          <label class="form-check-label" for="attend_rating_2_2">       
                              Occasionally begins work late       
                          </label>       
                      </div>       
                  </div>       
              </div>       
              <!-- 8A.3 EXPECTED OUTCOME: Ensures work responsibilities are covered when absent -->       
              <div class="form-group">       
                  <label for="expectedOutcome9A_3"><strong>9A.3. EXPECTED OUTCOME:</strong> Ensures work responsibilities are covered when absent</label>       
                  <div class="mb-3">       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_3" value="3" required>       
                          <label class="form-check-label" for="attend_rating_3_3">       
                              When late or absent, s/he generally makes sure that his/her responsibilities are covered       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_5" value="5" required>       
                          <label class="form-check-label" for="attend_rating_3_5">       
                              When out of the office, s/he makes a special effort to ensure that his/her commitments are met and problems resolved       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_1" value="1" required>       
                          <label class="form-check-label" for="attend_rating_3_1">       
                              When late or absent, problems have occurred because s/he failed to confirm that his/her responsibilities were adequately covered       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_4" value="4" required>       
                          <label class="form-check-label" for="attend_rating_3_4">       
                              When out of the office, s/he confirms that his/her responsibilities and commitments are managed       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_2" value="2" required>       
                          <label class="form-check-label" for="attend_rating_3_2">       
                              When late or absent, s/he has not always confirmed that his/her responsibilities are covered       
                          </label>       
                      </div>       
                  </div>       
              </div>       
              <!-- 8A.4 EXPECTED OUTCOME: Arrives at meetings and appointments on time -->       
              <div class="form-group">       
                  <label for="expectedOutcome9A_4"><strong>9A.4. EXPECTED OUTCOME:</strong> Arrives at meetings and appointments on time</label>       
                  <div class="mb-3">       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_3" value="3" required>       
                          <label class="form-check-label" for="attend_rating_4_3">       
                              Normally on time for meetings and appointments       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_5" value="5" required>       
                          <label class="form-check-label" for="attend_rating_4_5">       
                              Sets a good example for others by always arriving promptly for meetings and appointments       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_1" value="1" required>       
                          <label class="form-check-label" for="attend_rating_4_1">       
                              Inconveniences others by being late for meetings       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_4" value="4" required>       
                          <label class="form-check-label" for="attend_rating_4_4">       
                              Prompt for meetings and appointments       
                          </label>       
                      </div>       
                      <div class="form-check">       
                          <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_2" value="2" required>       
                          <label class="form-check-label" for="attend_rating_4_2">       
                              Inconveniences others by often being late for meetings       
                          </label>       
                      </div>       
                  </div>       
              </div>          
              <div class="form-group">
                  <label for="attend_rating_remarks"><strong>Remarks</strong></label>
                  <textarea class="form-control" name="attend_rating_remarks" id="attend_rating_remarks" rows="3"></textarea>
                  <input type="hidden" id="attend_rating_score" name="attend_rating_score" value="" />
              </div> 
            <br>
            <hr>
            <div class="form-group">
                <label for="evaluator_recommendation"><strong>EVALUATOR’S RECOMMENDATION / GENERAL ASSESSMENT</strong></label>
                <textarea class="form-control" name="evaluator_recommendation" id="evaluator_recommendation" rows="5" required></textarea>
            </div>
            <br>
            <button type="button" class="btn btn-secondary" id="prev-to-attendance">Previous</button>
            <br>
            <br>
            <div class="d-grid gap-2">
              <input type="hidden" id="appraisal_rating_score" name="appraisal_rating_score" value="" />
              <input type="hidden" id="form_id" name="form_id" value="2" />
              @if($user->es_id == 3)
              <input type="hidden" id="period" name="period" value="{{ $period_id == 1 ? 'Jan-June' : 'July-Dec' }}" />
          @else
          <input type="hidden" id="period" name="period" value="{{ $month_range1 }} - {{ $month_range2 }}" />
          @endif
            <input type="hidden" id="name" name="name" value="{{ $user->FullName }}" />
            <input type="hidden" id="company" name="company" value="{{ $user->company->name ?? '' }}" />
            <input type="hidden" id="group" name="group" value="{{ $user->group->name ?? '' }}" />
            <input type="hidden" id="designation" name="designation" value="{{ $user->designation->name ?? '' }}" />
            <input type="hidden" id="job_rank" name="job_rank" value="{{ $user->job_level }} - {{ $user->joblevel->name ?? '' }}" />
              <input class="btn btn-info text-light" type="submit" name="form-submit" id="form-submit" value="Save">
            </div>
        </div>
            {{-- end tab 9 --}}
        </form>
        @include('pages.rate.hrform')
    </div>
  </div>
</div>