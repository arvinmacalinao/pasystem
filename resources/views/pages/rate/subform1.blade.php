<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
      <h4 class="card-title">PERFORMANCE APPRAISAL FORM</h4>
      <p class="card-text">(Rank and File)</p>
    <div class="tab-content" id="nav-tabContent">
        <!-- Content for Job Knowledge -->
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
                            <strong>DEMONSTRATES</strong> competency in the skills and knowledge required       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_1_5">       
                            Demonstrates <strong>SIGNIFICANT EXPERTISE</strong> at his/her job because of his/her in-depth knowledge and skills       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_1_1">       
                            1 - <strong>HAS NOT DEMONSTRATED</strong> that s/he has the skills and knowledge to fulfill the responsibilities of his/her position       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_1_4">       
                            Demonstrates a <strong>HIGH LEVEL OF COMPETENCY</strong> in the skills and knowledge required       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_1" id="jk_rating_1_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_1_2">       
                          2 - <strong>Improvement</strong> is needed in certain skills and job knowledge       
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
                            Learns and applies new skills within the <strong>EXPECTED TIME PERIOD</strong>
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_2_5">       
                            An <strong>EXCEPTIONALLY FAST LEARNER</strong> and able to quickly put new skills to use       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_2_1">       
                           1 - It takes him/her <strong>TOO LONG TO LEARN</strong> and apply new skills       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_2_4">       
                            Learns and applies new skills <strong>QUICKLY</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_2" id="jk_rating_2_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_2_2">       
                            2 - It <strong>SOMETIMES TAKES HIM/HER TOO LONG</strong> to learn and apply new skills       
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
                            <strong>Knowledgeable</strong> about current developments in his/her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_3_5">       
                            Reads and researches <strong>EXTENSIVELY</strong>, staying on top of current developments that might impact her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_3_1">       
                            1 - <strong>FAILS TO KEEP UPDATED</strong> about current developments in his/her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_3_4">       
                            Does an <strong>EXCELLENT JOB</strong> of keeping himself/herself updated about current developments in his/her field       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_3" id="jk_rating_3_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_3_2">       
                            2 - <strong>SHOULD BE MORE KNOWLEDGEABLE</strong> about current developments in his/ her field       
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
                            Works within the <strong>NORMAL SCOPE OF SUPERVISION</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_4_5">       
                            Performs <strong>EXTREMELY WELL</strong> with very little, if any, supervision or assistance needed       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_4_1">       
                           1 - <strong>NEEDS MORE SUPERVISION</strong> and assistance than s/he should       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_4_4">       
                            Needs a <strong>MINIMAL AMOUNT OF SUPERVISION</strong> to fulfill his/her responsibilities       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_4" id="jk_rating_4_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_4_2">       
                            2 - Needs <strong>SLIGHTLY MORE SUPERVISION</strong> than s/he should to fulfill his/her responsibilities       
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
                            Displays a <strong>GOOD UNDERSTANDING</strong> of how his/her job relates to other jobs & effectively uses the resources and tools available       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_5" value="5" required>       
                        <label class="form-check-label" for="jk_rating_5_5">       
                            Has an <strong>EXTRAORDINARY UNDERSTANDING</strong> of his/her job and the jobs of others & skillfully uses resources to maximum use       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_1" value="1" required>       
                        <label class="form-check-label" for="jk_rating_5_1">       
                            1 - <strong>DOES NOT COMPLETELY UNDERSTAND</strong> how his/her job relates to others & s/he ineffectively uses the resources available       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_4" value="4" required>       
                        <label class="form-check-label" for="jk_rating_5_4">       
                            <strong>HAS BETTER THAN USUAL UNDERSTANDING</strong> of how his/her job relates to other jobs & takes advantage of the resources available       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="jk_rating_5" id="jk_rating_5_2" value="2" required>       
                        <label class="form-check-label" for="jk_rating_5_2">       
                            2 - <strong>WOULD HAVE BETTER RESULTS</strong> if s/he understands how his/her job relates to others & has difficulty in effectively using the resources       
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
        {{-- end tab 1 --}}
        
        <!-- Content for Quality -->
        <hr>
            <h4>II. QUALITY OF WORK</h4>       
            <p>REFERS TO THE ACCURACY AND THOROUGHNESS OF WORK OUTPUT AND DEPENDABILITY OF RESULTS REGARDLESS OF AMOUNT OF WORK DONE. THE ABILITY TO DO TASKS RIGHT AT THE FIRST TIME.</p>       
            <!-- 2.1 EXPECTED OUTCOME: Demonstrates accuracy and thoroughness -->       
            <div class="form-group">       
                <label for="expectedOutcome2_1"><strong>2.1. EXPECTED OUTCOME:</strong> Demonstrates accuracy and thoroughness</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_1" value="1" required>       
                        <label class="form-check-label" for="quality_rating_1_1">       
                            1 - Work <strong>DOES NOT REFLECT ADEQUATE</strong> attention to accuracy and completeness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_1_3">       
                            The work s/he produces <strong>MEETS STANDARDS</strong> for accuracy and completeness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_1_2">       
                            2 - Sometimes the work s/he produces is <strong>LESS ACCURATE AND LESS THOROUGH</strong> than his/her position requires       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_1_5">       
                            The quality of work s/he produces far <strong>EXCEEDS EXPECTATIONS</strong> for accuracy & thoroughness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_1" id="quality_rating_1_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_1_4">       
                            The work s/he produces is <strong>USUALLY HIGHLY ACCURATE</strong> and thorough       
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
                           1 - Displays a <strong>LACK OF COMMITMENT</strong> to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_2_3">       
                            <strong>REGULARLY DISPLAYS</strong> his/her commitment to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_2_2">       
                            2 - <strong>COULD DISPLAY MORE COMMITMENT</strong> to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_2_5">       
                            A <strong>ROLE MODEL</strong> because of his/her dedication and commitment to excellence       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_2" id="quality_rating_2_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_2_4">       
                            Displays a <strong>STRONG DEDICATION AND COMMITMENT</strong> to excellence       
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
                            1 - <strong>DOES NOT ACTIVELY LOOK</strong> for ways to improve quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_3_3">       
                            <strong>LOOKS FOR WAYS</strong> to improve quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_3_2">       
                            2 - <strong>NEEDS TO MORE ACTIVELY LOOK</strong> for ways to improve quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_3_5">       
                            <strong>LEADS THE ORGANIZATION IN LOOKING FOR WAYS</strong> to improve quality and promote quality awareness       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_3" id="quality_rating_3_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_3_4">       
                            <strong>WORKS HARD</strong> to improve quality in his/her own work and promotes quality awareness throughout the organization       
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
                            1 - The feedback he/she receives about his/her performance is <strong>NOT BEING APPLIED</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_4_3">       
                            <strong>APPLIES THE FEEDBACK</strong> he/she receives to improve his/her performance       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_4_2">       
                            2 - <strong>DOESN’T ALWAYS APPLY</strong> the feedback he/she receives to improve performance       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_4_5">       
                            <strong>PROACTIVE ABOUT SEEKING FEEDBACK</strong> and using it to improve her performance       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_4" id="quality_rating_4_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_4_4">       
                            <strong>OFTEN ASKS FOR FEEDBACK</strong> and uses it to improve his/her performance       
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
                           1 - Does an <strong>UNACCEPTABLE JOB</strong> of monitoring his/her work to ensure quality       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_3" value="3" required>       
                        <label class="form-check-label" for="quality_rating_5_3">       
                            Monitors his/her work to <strong>MEET QUALITY STANDARDS</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_2" value="2" required>       
                        <label class="form-check-label" for="quality_rating_5_2">       
                            2 - There are <strong>SOME QUALITY PROBLEMS</strong> because he/she does not adequately monitor his/her work       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_5" value="5" required>       
                        <label class="form-check-label" for="quality_rating_5_5">       
                            Has designed <strong>HIGHLY EFFECTIVE METHODS</strong> for monitoring his/her work to achieve & maintain the highest quality standards       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quality_rating_5" id="quality_rating_5_4" value="4" required>       
                        <label class="form-check-label" for="quality_rating_5_4">       
                            <strong>CONSISTENTLY AND CAREFULLY MONITORS</strong> his/her work to ensure its quality       
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
        <!-- Content for Quantity -->
        <hr>
            <h4>III. QUANTITY OF WORK</h4>       
            <p>THE ABILITY TO DELIVER GIVEN VOLUME OF OUTPUT IN A GIVEN TIME AND THE ABILITY TO PRODUCE REQUIRED QUALITY OF OUTPUT WITHIN REASONABLE TIME.</p>       
            <!-- 3.1 EXPECTED OUTCOME: Meets productivity standards -->       
            <div class="form-group">       
                <label for="expectedOutcome3_1"><strong>3.1. EXPECTED OUTCOME:</strong> Meets productivity standards</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_2" value="2" required>       
                        <label class="form-check-label" for="quantity_rating_1_2">       
                           2 - <strong>NOT ALWAYS AS PRODUCTIVE</strong> as expected for his/her job       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_1_1">       
                           1 - Produces <strong>LESS WORK THAN EXPECTED</strong> for his/her job       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_1_4">       
                            <strong>USUALLY</strong> produces <strong>MORE WORK</strong> than expected       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_1_3">       
                            Regularly produces a <strong>NORMAL AMOUNT OF WORK</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_1" id="quantity_rating_1_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_1_5">       
                            <strong>REGULARLY EXCEEDS</strong> the amount of work normally expected for this job       
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
                            2 - It <strong>SOMETIMES TAKES HIM/HER LONGER</strong> than satisfactory to complete work and s/he too often misses deadlines       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_2_1">       
                            1 - <strong>WORK IS NOT GETTING DONE</strong> within acceptable time frames       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_2_4">       
                            <strong>OFTEN COMPLETES</strong> his/her work ahead of schedule       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_2_3">       
                            Completes his/her work in a <strong>TIMELY MANNER</strong> and <strong>MEETS MOST DEADLINES</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_2" id="quantity_rating_2_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_2_5">       
                            <strong>ROUTINELY COMPLETES WORK AHEAD OF TIME</strong>, always meeting his/her deadlines       
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
                            2 - <strong>COULD DO MORE TO DEMONSTRATE</strong> his/her commitment to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_3_1">       
                            1 - <strong>DOES NOT DISPLAY MUCH</strong> commitment to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_3_4">       
                            Demonstrates a <strong>STRONG COMMITMENT</strong> to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_3_3">       
                            <strong>DEMONSTRATES</strong> a commitment to increasing productivity       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_3" id="quantity_rating_3_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_3_5">       
                            <strong>SETS A GOOD EXAMPLE</strong> to others in his/her dedication to increasing productivity       
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
                            2 - <strong>WORKS MORE SLOWLY</strong> than the position requires       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_4_1">       
                            1 - The pace at which s/he works is <strong>NOT ADEQUATE FOR THIS JOB </strong>      
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_4_4">       
                            Works at a <strong>FASTER PACE THAN NORMALLY</strong> expected for the position       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_4_3">       
                            <strong>WORKS AT THE PACE EXPECTED</strong> for the position       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_4" id="quantity_rating_4_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_4_5">       
                            Works at an <strong>EXCEPTIONALLY FAST PACE</strong>       
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
                            2 - <strong>DOES NOT ALWAYS ACHIEVE</strong> his/her established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_1" value="1" required>       
                        <label class="form-check-label" for="quantity_rating_5_1">       
                            1 - <strong>TOO OFTEN FAILS</strong> to achieve established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_4" value="4" required>       
                        <label class="form-check-label" for="quantity_rating_5_4">       
                            <strong>STRIVES HARD</strong> in the achievement of established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_3" value="3" required>       
                        <label class="form-check-label" for="quantity_rating_5_3">       
                            <strong>ACHIEVES</strong> most of his/her established goals       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="quantity_rating_5" id="quantity_rating_5_5" value="5" required>       
                        <label class="form-check-label" for="quantity_rating_5_5">       
                            <strong>CONSISTENTLY PUSHES</strong> himself/ herself to achieve and surpass his/her established goals       
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
        {{-- end tab 3 --}}
        
        <!-- Content for Initiative -->
        <hr>
            <h4>IV. Initiative</h4>       
            <p>ABILITY TO SEEK AND APPLY BETTER MEANS TO ACHIEVE OBJECTIVES, TO GENERATE IMAGINATIVE SOLUTIONS TO ENCOUNTERED WORK PROBLEMS, AND TO IMPOSE SELF TO DO JOB RESPONSIBILITIES EVEN WITHOUT BEING TOLD.</p>       
            <!-- 4.1 EXPECTED OUTCOME: Volunteers readily -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_1"><strong>4.1. EXPECTED OUTCOME:</strong> Volunteers readily</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_1" id="initiative_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="initiative_rating_1_4">       
                                <strong>QUICK TO VOLUNTEER</strong> whenever others need help       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_1" id="initiative_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="initiative_rating_1_3">       
                                <strong>VOLUNTEERS</strong> to help others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_1" id="initiative_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="initiative_rating_1_5">       
                                Without being asked, s/he <strong>VOLUNTEERS IMMEDIATELY</strong> when s/he sees help is needed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_1" id="initiative_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="initiative_rating_1_1">       
                                1 - <strong>HAS TO BE REMINDED</strong> that his/her assistance would be helpful       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_1" id="initiative_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="initiative_rating_1_2">       
                                2 - <strong>OCCASIONALLY VOLUNTEERS</strong> to help but not to the extent expected       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.2 EXPECTED OUTCOME: Undertakes self-development activities -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_2"><strong>4.2. EXPECTED OUTCOME:</strong> Undertakes self-development activities</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_2" id="initiative_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="initiative_rating_2_4">       
                                On his/her own initiative, s/he <strong>FREQUENTLY UNDERTAKES</strong> self-development activities       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_2" id="initiative_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="initiative_rating_2_3">       
                                <strong>UNDERTAKES</strong> self-development activities on his/her own initiative       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_2" id="initiative_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="initiative_rating_2_5">       
                                <strong>CONSTANTLY EXPANDING</strong> his/her capabilities and skills on his/her own initiative       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_2" id="initiative_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="initiative_rating_2_1">       
                                1 - <strong>DOES NOT UNDERTAKE</strong> self-development activities       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_2" id="initiative_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="initiative_rating_2_2">       
                                2 - <strong>NEEDS TO BE ENCOURAGED</strong> to take on self-development activities       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.3 EXPECTED OUTCOME: Seeks increased responsibilities -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_3"><strong>4.3. EXPECTED OUTCOME:</strong> Seeks increased responsibilities</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_3" id="initiative_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="initiative_rating_3_4">       
                                <strong>OFTEN SEEKS OUT</strong> additional responsibilities beyond the normal scope of his/her job       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_3" id="initiative_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="initiative_rating_3_3">       
                                <strong>OCCASIONALLY SEEKS</strong> increased responsibilities beyond the normal scope of her job       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_3" id="initiative_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="initiative_rating_3_5">       
                                When it comes to seeking increased responsibilities, s/he <strong>DOES NOT PLACE LIMITS</strong> on the <strong>SCOPE OF HIS/HER POSITION</strong>       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_3" id="initiative_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="initiative_rating_3_1">       
                               1 - <strong>RESISTS TAKING ON</strong> additional responsibilities       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_3" id="initiative_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="initiative_rating_3_2">       
                                2 - <strong>SELDOM LOOKS</strong> for increased responsibilities       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.4 EXPECTED OUTCOME: Takes independent actions and calculated risks -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_4"><strong>4.4. EXPECTED OUTCOME:</strong> Takes independent actions and calculated risks</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_4" id="initiative_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="initiative_rating_4_4">       
                                <strong>TAKES INDEPENDENT ACTIONS</strong> and <strong>APPROPRIATE</strong>, calculated risks       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_4" id="initiative_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="initiative_rating_4_3">       
                                Exercises a <strong>REASONABLE DEGREE OF RISK TAKING</strong> in the performance of his/her work       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_4" id="initiative_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="initiative_rating_4_5">       
                                A <strong>TOTAL SELF-STARTER</strong>, taking independent actions and well-calculated risks       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_4" id="initiative_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="initiative_rating_4_1">       
                               1 - <strong>DOES NOT TAKE CALCULATED RISKS</strong> or independent actions appropriate to his/her job       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_4" id="initiative_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="initiative_rating_4_2">       
                               2 - <strong>RARELY TAKES</strong> independent actions or calculated risks       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 4.5 EXPECTED OUTCOME: Looks for and takes advantage of opportunities -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_5"><strong>4.5. EXPECTED OUTCOME:</strong> Looks for and takes advantage of opportunities</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_5" id="initiative_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="initiative_rating_5_4">       
                                <strong>RESOURCEFUL</strong> at taking advantage of opportunities       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_5" id="initiative_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="initiative_rating_5_3">       
                                <strong>LOOKS FOR</strong> and takes advantage of opportunities       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_5" id="initiative_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="initiative_rating_5_5">       
                                <strong>ALWAYS ALERT</strong> to opportunities and makes the most of them       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_5" id="initiative_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="initiative_rating_5_1">       
                                1 - <strong>OVERLOOKS</strong> many opportunities       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="initiative_rating_5" id="initiative_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="initiative_rating_5_2">       
                                2 - <strong>SOMETIMES OVERLOOKS</strong> opportunities       
                            </label>       
                        </div>       
                    </div>       
                </div>            
                <div class="form-group">
                    <label for="initiative_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="initiative_rating_remarks" id="initiative_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="initiative_rating_score" name="initiative_rating_score" value="" />
                </div> 
            <br>
        {{-- end tab 4 --}}
        
        <!-- Content for Cooperation -->
        <hr>
            <h4>V. Cooperation</h4>       
            <p>ABILITY TO PROVIDE SUPPORT AND COORDINATION WITH CO-WORKERS, THE EXERCISE OF PROPER INTERACTION SKILLS AND BEHAVIOR, INCLUDING BEING CONSIDERATE OF THE NEEDS AND FEELINGS OF OTHERS IN ORDER TO MEET COMPANY OBJECTIVES.</p>       
            <!-- 5.1 EXPECTED OUTCOME: Establishes and maintains effective relations -->       
                <div class="form-group">       
                    <label for="expectedOutcome5_1"><strong>5.1. EXPECTED OUTCOME:</strong> Establishes and maintains effective relations</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_1" id="coop_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="coop_rating_1_3">       
                                <strong>USUALLY ESTABLISHES</strong> and maintains good working relationships       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_1" id="coop_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="coop_rating_1_2">       
                               2 - <strong>SOMETIMES S/HE INCURS DIFFICULTIES</strong> in establishing and maintaining good relationships       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_1" id="coop_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="coop_rating_1_5">       
                                His/her efforts to establish and maintain <strong>STRONG WORKING RELATIONSHIPS ARE OUTSTANDING</strong>   
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_1" id="coop_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="coop_rating_1_4">       
                                <strong>PARTICULARLY SUCCESSFUL</strong> at establishing and maintaining good relationships       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_1" id="coop_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="coop_rating_1_1">       
                               1 - Working relationships are <strong>FREQUENTLY UNSATISFACTORY</strong>       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 5.2 EXPECTED OUTCOME: Exhibits tact and consideration -->       
                <div class="form-group">       
                    <label for="expectedOutcome5_2"><strong>5.2. EXPECTED OUTCOME:</strong> Exhibits tact and consideration</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_2" id="coop_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="coop_rating_2_3">       
                                <strong>EXHIBITS</strong> tact and consideration in his/her relations with others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_2" id="coop_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="coop_rating_2_2">       
                               2 - There <strong>HAVE BEEN A NUMBER OF OCCASIONS</strong> when s/he exhibited a <strong>LACK OF TACT OR CONSIDERATION</strong> for others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_2" id="coop_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="coop_rating_2_5">       
                                <strong>CONSISTENTLY TACTFUL</strong> and considerate in his/her relations with others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_2" id="coop_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="coop_rating_2_4">       
                                Exhibits a <strong>HIGH DEGREE OF TACT</strong> and consideration in his/her relations with others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_2" id="coop_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="coop_rating_2_1">       
                                1 - <strong>TOO OFTEN</strong> s/he has exhibited a lack of tact or consideration to others       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 5.3 EXPECTED OUTCOME: Displays positive outlook and pleasant manner -->       
                <div class="form-group">       
                    <label for="expectedOutcome5_3"><strong>5.3. EXPECTED OUTCOME:</strong> Displays positive outlook and pleasant manner</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_3" id="coop_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="coop_rating_3_3">       
                                Outlook is <strong>GENERALLY POSITIVE</strong> and his/her manner is pleasant       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_3" id="coop_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="coop_rating_3_2">       
                               2 - <strong>WOULD BE EASIER TO WORK WITH</strong> if s/he projected a more positive outlook and pleasant manner       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_3" id="coop_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="coop_rating_3_5">       
                                <strong>DISPLAYS AN UPBEAT</strong>, positive outlook and pleasant manner under even the most trying circumstances       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_3" id="coop_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="coop_rating_3_4">       
                                <strong>REGULARLY DISPLAYS</strong> a positive outlook and pleasant manner       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_3" id="coop_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="coop_rating_3_1">       
                               1 - Can be <strong>DIFFICULT TO WORK WITH</strong> because s/he displays <strong>NEGATIVE AND RUDE BEHAVIOR</strong>       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 5.4 EXPECTED OUTCOME: Offers assistance and support to co-workers -->       
                <div class="form-group">       
                    <label for="expectedOutcome5_4"><strong>5.4. EXPECTED OUTCOME:</strong> Offers assistance and support to co-workers</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_4" id="coop_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="coop_rating_4_3">       
                                <strong>ASSISTS AND SUPPORTS</strong> his/her co-workers       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_4" id="coop_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="coop_rating_4_2">       
                                2 - It <strong>WOULD BE PREFERABLE IF S/HE OFFERED MORE</strong> assistance and support to his/her co-workers       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_4" id="coop_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="coop_rating_4_5">       
                                <strong>ALWAYS THE FIRST TO OFFER</strong> his/her assistance to his/her co-workers       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_4" id="coop_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="coop_rating_4_4">       
                                <strong>OFTEN EXTENDS</strong> himself/herself more than required to assist and support her co-workers       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_4" id="coop_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="coop_rating_4_1">       
                                1 - <strong>RARELY OFFERS</strong> support or assistance to his/her co-workers       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 5.5 EXPECTED OUTCOME: Works cooperatively in group situations -->       
                <div class="form-group">       
                    <label for="expectedOutcome5_5"><strong>5.5. EXPECTED OUTCOME:</strong> Works cooperatively in group situations</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_5" id="coop_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="coop_rating_5_3">       
                                <strong>WORKS COOPERATIVELY</strong> in group situations       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_5" id="coop_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="coop_rating_5_2">       
                               2 - <strong>NOT ALWAYS SUCCESSFUL</strong> when working in group situations       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_5" id="coop_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="coop_rating_5_5">       
                                <strong>PLAYS A HIGHLY PROACTIVE</strong>, participative role when working in group situations       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_5" id="coop_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="coop_rating_5_4">       
                                <strong>DEMONSTRATES AND PROMOTES COOPERATION</strong> when working in group situations       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="coop_rating_5" id="coop_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="coop_rating_5_1">       
                               1 - Has been <strong>GENERALLY UNCOOPERATIVE</strong> when working in group situations       
                            </label>       
                        </div>       
                    </div>       
                </div>            
                <div class="form-group">
                    <label for="coop_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="coop_rating_remarks" id="coop_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="coop_rating_score" name="coop_rating_score" value="" />
                </div> 
            <br>
        {{-- end tab 5 --}}

        <!-- Content for Communications -->
        <hr>
            <h4>VI. Communications</h4>       
            <p>ABILITY TO RECEIVE AND CONVEY VERBAL AND WRITTEN COMMUNICATION EFFECTIVELY IN A PRECISE AND CONCISE MANNER. EXHIBITS OPENNESS AND SUPPORT TO ALL CHANNELS OF COMMUNICATION.</p>       
            <!-- 6.1 EXPECTED OUTCOME: Expresses ideas and thoughts verbally -->       
                <div class="form-group">       
                    <label for="expectedOutcome6_1"><strong>6.1. EXPECTED OUTCOME:</strong> Expresses ideas and thoughts verbally</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_1_3">       
                                Displays <strong>EFFECTIVE</strong> verbal communications skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_1_5">       
                                Displays <strong>SUPERIOR VERBAL SKILLS</strong>, communicating clearly, concisely, and in meaningful ways       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_1_2">       
                                2 - <strong>NEEDS TO IMPROVE</strong> his/her verbal communications skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_1_1">       
                                1 - <strong>DOES NOT DISPLAY</strong> the verbal communications skills required       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_1" id="comms_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_1_4">       
                                Displays <strong>VERY GOOD VERBAL SKILLS</strong>, communicating clearly and concisely       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.2 EXPECTED OUTCOME: Expresses ideas and thoughts in written form -->       
                <div class="form-group">       
                    <label for="expectedOutcome6_2"><strong>6.2. EXPECTED OUTCOME:</strong> Expresses ideas and thoughts in written form</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_2_3">       
                                Written communications skills <strong>MEET THE REQUIREMENTS</strong> of his/her position       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_2_5">       
                                Demonstrates <strong>OUTSTANDING</strong> written communications skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_2_2">       
                                2 - <strong>REQUIRES MORE ASSISTANCE</strong> than desirable to produce written communications that meet the job’s requirements       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_2_1">       
                                1 - Written communications <strong>FALL SHORT</strong> of the quality needed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_2" id="comms_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_2_4">       
                                Demonstrates <strong>EXCELLENT</strong> written communications skills       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.3 EXPECTED OUTCOME: Exhibits good listening and comprehension -->       
                <div class="form-group">       
                    <label for="expectedOutcome6_3"><strong>6.3. EXPECTED OUTCOME:</strong> Exhibits good listening and comprehension</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_3_3">       
                                <strong>LISTENS AND COMPREHENDS</strong> well       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_3_5">       
                                Listens <strong>CAREFULLY</strong>, asks <strong>PERCEPTIVE</strong> questions, and <strong>QUICKLY COMPREHENDS</strong> new or highly complex matters       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_3_2">       
                               2 - <strong>DOES NOT ALWAYS EXHIBIT</strong> good listening and comprehension skills       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_3_1">       
                               1 - <strong>DOES NOT EXHIBIT</strong> the listening and comprehension skills necessary for satisfactory performance of his/her job       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_3" id="comms_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_3_4">       
                                <strong>EXHIBITS GOOD LISTENING</strong> skills and comprehends complex matters well       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.4 EXPECTED OUTCOME: Keeps others adequately informed -->       
                <div class="form-group">       
                    <label for="expectedOutcome6_4"><strong>6.4. EXPECTED OUTCOME:</strong> Keeps others adequately informed</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_4_3">       
                                Keeps others <strong>ADEQUATELY INFORMED</strong>       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_4_5">       
                                <strong>EXTREMELY THOROUGH AND PROACTIVE</strong> about keeping others well informed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_4_2">       
                               2 - Unless reminded, s/he <strong>SOMETIMES FAILS TO KEEP</strong> others adequately informed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_4_1">       
                               1 - <strong>FREQUENTLY FAILS</strong> to keep others adequately informed       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_4" id="comms_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_4_4">       
                                <strong>CAREFUL TO KEEP OTHERS</strong> informed in a timely manner       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 6.5 EXPECTED OUTCOME: Selects and uses appropriate communication methods -->       
                <div class="form-group">       
                    <label for="expectedOutcome6_5"><strong>6.5. EXPECTED OUTCOME:</strong> Selects and uses appropriate communication methods</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="comms_rating_5_3">       
                                <strong>SELECTS APPROPRIATE</strong> methods of communication       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="comms_rating_5_5">       
                                Implements <strong>HIGHLY EFFECTIVE</strong> and often innovative communication methods       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="comms_rating_5_2">       
                               2 - <strong>OCCASIONALLY SELECTS INAPPROPRIATE</strong> methods of communication       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="comms_rating_5_1">       
                               1 - <strong>TOO OFTEN</strong> he/she <strong>DOES NOT SELECT OR USE APPROPRIATE</strong> communication methods       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comms_rating_5" id="comms_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="comms_rating_5_4">       
                                When communicating, s/he is <strong>VERY GOOD AT SELECTING</strong> and using the most effective methods       
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
        {{-- end tab 6 --}}

        <!-- Content for Compliance -->
        <hr>
            <h4>VII. Compliance</h4>       
            <p>DISPOSITION AND EFFORT EXERTED TO OBSERVE AND COMPLY TO COMPANY STANDARDS, POLICIES, PROCEDURES, PROTOCOL, WORK ETHICS, AMONG OTHERS IN ORDER TO PROMOTE ORDER, SAFETY, SECURITY, HARMONY, AND TO AVOID ACCIDENTS, WASTAGES, LOSSES / DAMAGES OF COMPANY RESOURCES/PROPERTIES, INJURIES OF PERSONNEL, AMONG OTHERS.</p>       
            <!-- 7.1 EXPECTED OUTCOME: Adheres to Company rules and regulations -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_1"><strong>7.1. EXPECTED OUTCOME:</strong> Adheres to Company rules and regulations. Conforms to established policies and procedures.</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_1_1">       
                               1 - <strong>HARDLY COMPLY</strong>, interrogate       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_1_3">       
                                Requires <strong>FREQUENT REMINDER</strong>       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_1_4">       
                                Manifests <strong>SENSITIVITY TO COMPLIANCE</strong> ‘walk-his-talk’ and ‘walk on extra mile’       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_1_2">       
                               2 - <strong>REPRIMANDED FOR SOME VIOLATION/NONCOMPLIANCE</strong> to policies and procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_1" id="comp_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_1_5">       
                                <strong>CONSISTENTLY COMPLY</strong> with company policies and procedures       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.2 EXPECTED OUTCOME: Observes safety and security procedures -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_2"><strong>7.2. EXPECTED OUTCOME:</strong> Observes safety and security procedures</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_2_3">       
                                <strong>ROUTINELY OBSERVES</strong> safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_2_5">       
                                <strong>A LEADER IN CAREFULLY OBSERVING</strong> and monitoring proper safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_2_1">       
                                1 - <strong>FAILS TO OBSERVE</strong> proper safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_2_4">       
                                <strong>CAREFUL ABOUT OBSERVING</strong> safety and security procedures       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_2" id="comp_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_2_2">       
                               2 - <strong>UPON OCCASION, HAS NOT OBSERVED</strong> proper safety and security procedures       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.3 EXPECTED OUTCOME: Determines appropriate action beyond guidelines -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_3"><strong>7.3. EXPECTED OUTCOME:</strong> Determines appropriate action beyond guidelines</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_3_3">       
                                When faced with situations not covered by normal guidelines, he/she <strong>USUALLY ARRIVES AT AN APPROPRIATE ACTION</strong>       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_3_5">       
                                Even under very unusual conditions not covered by the normal guidelines, he/she <strong>QUICKLY SIZES UP THE SITUATION</strong> and determines the appropriate action       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_3_1">       
                               1 - When a situation arises that is not covered by the normal guidelines, he/she <strong>HAS DIFFICULTY DETERMINING</strong> an appropriate action       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_3_4">       
                                <strong>HAS LITTLE DIFFICULTY ARRIVING AT THE MOST APPROPRIATE ACTION</strong> when faced with situations not covered by normal guidelines       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_3" id="comp_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_3_2">       
                               2 - <strong>HAS HAD SOME DIFFICULTY DETERMINING</strong> an appropriate action when faced with a situation outside the normal guidelines       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.4 EXPECTED OUTCOME: Uses equipment and materials properly -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_4"><strong>7.4. EXPECTED OUTCOME:</strong> Uses equipment and materials properly</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_4_3">       
                                <strong>PROPERLY</strong> uses equipment and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_4_5">       
                                Pays <strong>EXCEPTIONAL ATTENTION</strong> to ensure proper use of equipment and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_4_1">       
                                1 - Although s/he has been properly trained, he/she has <strong>CREATED UNSAFE SITUATIONS BY MISUSING EQUIPMENT</strong> and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_4_4">       
                                <strong>TAKES CAREFUL PRECAUTIONS</strong> when using equipment and materials       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_4" id="comp_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_4_2">       
                               2 - There have been times when s/he <strong>HAD TO BE WARNED ABOUT THE IMPROPER USE</strong> of equipment and materials       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.5 EXPECTED OUTCOME: Observes proper deportment and decorum -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_5"><strong>7.5. EXPECTED OUTCOME:</strong> Observes proper deportment and decorum – social traits such as disposition, tact, appearance, behavior, and conduct</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_5_3">       
                                Could be <strong>EXPECTED TO PRESENT A BUSINESS-LIKE ATTITUDE</strong> with constant reminders       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_5_2">       
                                2 - Showed <strong>MISDEMEANOR</strong>       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_5_5">       
                                <strong>ROLE MODEL</strong> in terms of grooming and basic corporate ethics       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_5_4">       
                                Demonstrated <strong>TACT AND DILIGENCE</strong>       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_5" id="comp_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_5_1">       
                                1 - <strong>FAILS TO ADHERE</strong> to standards       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.6 EXPECTED OUTCOME: Observes proper interpersonal skills -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_6"><strong>7.6. EXPECTED OUTCOME:</strong> Observes proper interpersonal skills – the ability to work harmoniously with others towards the achievement of goals.</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_6_4">       
                                <strong>NORMALLY TACTFUL, USUALLY</strong> obtains cooperation and respect of others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_6_2">       
                               2 - Occasionally able to get the respect and cooperation of others. <strong>NEEDS TO IMPROVE</strong> relationship with co-workers.       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_6_5">       
                                <strong>STRONG FORCE</strong> for office morale. <strong>ALWAYS</strong> obtains cooperation and respect of others       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_6_3">       
                                <strong>GETS OUT OF HIS/HER WAY</strong> to cooperate       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_6" id="comp_rating_6_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_6_1">       
                              1 - <strong>DISLIKES TO COOPERATE</strong>, cannot work harmoniously with others       
                            </label>       
                        </div>       
                    </div>       
                </div>       
                <!-- 7.7 EXPECTED OUTCOME: Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned tasks -->       
                <div class="form-group">       
                    <label for="expectedOutcome7_7"><strong>7.7. EXPECTED OUTCOME:</strong> Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned tasks.</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_1" value="1" required>       
                            <label class="form-check-label" for="comp_rating_7_1">       
                               1 - Has <strong>VERY LOW</strong> regard for work       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_4" value="4" required>       
                            <label class="form-check-label" for="comp_rating_7_4">       
                                Possesses <strong>GREAT INTEREST</strong> in work       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_2" value="2" required>       
                            <label class="form-check-label" for="comp_rating_7_2">       
                               2 - Displays <strong>LITTLE INTEREST</strong>. Not conscious of doing a good job.       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_5" value="5" required>       
                            <label class="form-check-label" for="comp_rating_7_5">       
                                <strong>EXCEPTIONALLY ENTHUSIASTIC</strong> about work       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="comp_rating_7" id="comp_rating_7_3" value="3" required>       
                            <label class="form-check-label" for="comp_rating_7_3">       
                                shows <strong>MODERATE INTEREST</strong> in work       
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
        {{-- end tab 7 --}}
        
        <!-- Content for Attendance -->
        <hr>
          <h4>VIII.A Attendance & Punctuality</h4>       
          <p>REGULARITY IN ATTENDANCE, PUNCTUALITY IN REPORTING FOR WORK, AND EFFECTIVE MANAGEMENT OF TIME.</p>       
          <!-- 8A.1 EXPECTED OUTCOME: Schedules time off in advance -->       
            <div class="form-group">       
                <label for="expectedOutcome9A_1"><strong>8A.1. EXPECTED OUTCOME:</strong> Schedules time off in advance</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_3" value="3" required>       
                        <label class="form-check-label" for="attend_rating_1_3">       
                            Before he/she takes time off, s/he <strong>GIVES ADVANCE NOTICE</strong> whenever possible       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_5" value="5" required>       
                        <label class="form-check-label" for="attend_rating_1_5">       
                            <strong>ALWAYS WORKS OUT A MUTUALLY AGREEABLE TIME OFF</strong> schedule with superior and coworkers       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_1" value="1" required>       
                        <label class="form-check-label" for="attend_rating_1_1">       
                           1 - There have been too many occasions when s/he has <strong>TAKEN TIME OFF WITHOUT PROVIDING ADEQUATE NOTICE</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_4" value="4" required>       
                        <label class="form-check-label" for="attend_rating_1_4">       
                            <strong>USUALLY WORKS OUT TIME OFF</strong> arrangements in advance       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_1" id="attend_rating_1_2" value="2" required>       
                        <label class="form-check-label" for="attend_rating_1_2">       
                           2 - <strong>NEEDS TO GIVE MORE ADVANCE NOTICE</strong> before s/he takes time off       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 8A.2 EXPECTED OUTCOME: Begins working on time -->       
            <div class="form-group">       
                <label for="expectedOutcome9A_2"><strong>8A.2. EXPECTED OUTCOME:</strong> Begins working on time</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_3" value="3" required>       
                        <label class="form-check-label" for="attend_rating_2_3">       
                            <strong>USUALLY</strong> begins work on time       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_5" value="5" required>       
                        <label class="form-check-label" for="attend_rating_2_5">       
                            <strong>CONSISTENTLY READY FOR WORK</strong> at the scheduled times       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_1" value="1" required>       
                        <label class="form-check-label" for="attend_rating_2_1">       
                           1 - <strong>BEGINS WORK LATE MORE FREQUENTLY</strong> than acceptable       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_4" value="4" required>       
                        <label class="form-check-label" for="attend_rating_2_4">       
                            <strong>RARELY</strong> begins work late       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_2" id="attend_rating_2_2" value="2" required>       
                        <label class="form-check-label" for="attend_rating_2_2">       
                           2 - <strong>OCCASIONALLY</strong> begins work late       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 8A.3 EXPECTED OUTCOME: Ensures work responsibilities are covered when absent -->       
            <div class="form-group">       
                <label for="expectedOutcome9A_3"><strong>8A.3. EXPECTED OUTCOME:</strong> Ensures work responsibilities are covered when absent</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_3" value="3" required>       
                        <label class="form-check-label" for="attend_rating_3_3">       
                            When late or absent, s/he <strong>GENERALLY MAKES SURE</strong> that his/her responsibilities are covered       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_5" value="5" required>       
                        <label class="form-check-label" for="attend_rating_3_5">       
                            When out of the office, s/he <strong>MAKES A SPECIAL EFFORT</strong> to ensure that his/her commitments are met and problems resolved       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_1" value="1" required>       
                        <label class="form-check-label" for="attend_rating_3_1">       
                           1 - When late or absent, <strong>PROBLEMS HAVE OCCURRED</strong> because s/he failed to confirm that his/her responsibilities were adequately covered       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_4" value="4" required>       
                        <label class="form-check-label" for="attend_rating_3_4">       
                            When out of the office, s/he <strong>CONFIRMS THAT HIS/HER RESPONSIBILITIES AND COMMITMENTS ARE MANAGED</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_3" id="attend_rating_3_2" value="2" required>       
                        <label class="form-check-label" for="attend_rating_3_2">       
                            2 - When late or absent, s/he <strong>HAS NOT ALWAYS CONFIRMED</strong> that his/her responsibilities are covered       
                        </label>       
                    </div>       
                </div>       
            </div>       
            <!-- 8A.4 EXPECTED OUTCOME: Arrives at meetings and appointments on time -->       
            <div class="form-group">       
                <label for="expectedOutcome9A_4"><strong>8A.4. EXPECTED OUTCOME:</strong> Arrives at meetings and appointments on time</label>       
                <div class="mb-3">       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_3" value="3" required>       
                        <label class="form-check-label" for="attend_rating_4_3">       
                            <strong>NORMALLY ON TIME</strong> for meetings and appointments       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_5" value="5" required>       
                        <label class="form-check-label" for="attend_rating_4_5">       
                            <strong>SETS A GOOD EXAMPLE</strong> for others by always arriving promptly for meetings and appointments       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_1" value="1" required>       
                        <label class="form-check-label" for="attend_rating_4_1">       
                           1 - Inconveniences others by <strong>BEING LATE FOR MEETINGS</strong>       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_4" value="4" required>       
                        <label class="form-check-label" for="attend_rating_4_4">       
                            <strong>PROMPT FOR MEETINGS</strong> and appointments       
                        </label>       
                    </div>       
                    <div class="form-check">       
                        <input class="form-check-input" type="radio" name="attend_rating_4" id="attend_rating_4_2" value="2" required>       
                        <label class="form-check-label" for="attend_rating_4_2">       
                           2 - Inconveniences others by <strong>OFTEN BEING LATE FOR MEETINGS</strong>       
                        </label>       
                    </div>       
                </div>       
            </div>         
            <div class="col-md-12">
                <label class="form-label fw-bold" for="pa_file" >Perfomance Appraisal Supporting Documents</label>
                <input class="form-control @error('pa_file') is-invalid @enderror" type="file" id="pa_file"  accept=".pdf" name="pa_file">
                <div class="invalid-feedback">@error('pa_file') {{ $errors->first('pa_file') }} @enderror</div>
            </div> 
            <br>
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
          <br>
          <br>
          <div class="d-grid gap-2">
            <input type="hidden" id="appraisal_rating_score" name="appraisal_rating_score" value="" />
            <input type="hidden" id="form_id" name="form_id" value="1" />
            @if($user->es_id == 3)
                <input type="hidden" id="period" name="period" value="{{ $period_id == 1 ? 'Jan-June' : 'July-Dec' }}" />
                <input type="hidden" id="start_month" name="start_month" value="{{ $period_id == 1 ? 1 : 7 }}" />
                <input type="hidden" id="end_month" name="end_month" value="{{ $period_id == 1 ? 6 : 12 }}" />
            @else
                <input type="hidden" id="period" name="period" value="{{$startMonthName}} - {{$endMonthName}}" />
                <input type="hidden" id="start_month" name="start_month" value="{{$startMonth}}" />
                <input type="hidden" id="end_month" name="end_month" value="{{$endMonth}}" />
            @endif
            <input type="hidden" id="name" name="name" value="{{ $user->FullName }}" />
            <input type="hidden" id="company" name="company" value="{{ $user->company->name ?? '' }}" />
            <input type="hidden" id="group" name="group" value="{{ $user->group->name ?? '' }}" />
            <input type="hidden" id="designation" name="designation" value="{{ $user->designation->name ?? '' }}" />
            <input type="hidden" id="job_rank" name="job_rank" value="{{ $user->job_level }} - {{ $user->joblevel->name ?? '' }}" />
            <input class="btn btn-info text-light" type="submit" name="form-submit" id="form-submit" value="Save">
          </div>
        </div>
        {{-- end tab 8 --}}
        </form>
            @include('pages.rate.hrform')
      </div>
    </div>
  </div>