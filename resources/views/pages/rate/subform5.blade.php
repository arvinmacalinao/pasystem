<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
      <h4 class="card-title">PERFORMANCE APPRAISAL FORM</h4>
      <p class="card-text">(Senior Managers and Executives)</p>
      {{-- form --}}
      <div class="tab-content" id="nav-tabContent">
        <!-- Content for Management and Organizational Skills -->
            <form method="POST" action="{{ route('team.appraise', ['id' => $user->id, 'appraise_id' => $appraise_id]) }}" enctype="multipart/form-data">
                @csrf
            <h4>I. MANAGEMENT AND ORGANIZATIONAL SKILLS</h4>
            <div class="form-group">
                <label><strong>1.1. TECHNICAL EXPERTISE:</strong> Shows advanced, comprehensive, persuasive knowledge of skills needed to carry out responsibilities of the job. Applies strong business acumen, expert-level knowledge gained through rigorous training and experience. Always on the look-out for new developments in the field; shares relevant information with management.</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_1" id="management_rating_1_5" value="5" required>
                        <label class="form-check-label" for="management_rating_1_5">
                            Expert Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_1" id="management_rating_1_4" value="4" required>
                        <label class="form-check-label" for="management_rating_1_4">
                            Advanced Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_1" id="management_rating_1_3" value="3" required>
                        <label class="form-check-label" for="management_rating_1_3">
                            Intermediate Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_1" id="management_rating_1_2" value="2" required>
                        <label class="form-check-label" for="management_rating_1_2">
                            Novice (Limited)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_1" id="management_rating_1_1" value="1" required>
                        <label class="form-check-label" for="management_rating_1_1">
                            Fundamental Awareness (Basic Knowledge)
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>1.2. PLANNING:</strong> Accurately forecasts relevant operating and business conditions; establishes productive objectives, strategies, and plans; develops effective budgets; establishes priorities; develops efficient work schedules and plans.</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_2" id="management_rating_2_5" value="5" required>
                        <label class="form-check-label" for="management_rating_2_5">
                            Expert Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_2" id="management_rating_2_4" value="4" required>
                        <label class="form-check-label" for="management_rating_2_4">
                            Advanced Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_2" id="management_rating_2_3" value="3" required>
                        <label class="form-check-label" for="management_rating_2_3">
                            Intermediate Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_2" id="management_rating_2_2" value="2" required>
                        <label class="form-check-label" for="management_rating_2_2">
                            Novice (Limited)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_2" id="management_rating_2_1" value="1" required>
                        <label class="form-check-label" for="management_rating_2_1">
                            Fundamental Awareness (Basic Knowledge)
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label><strong>1.3. ADMINISTRATION:</strong> Measures effectiveness in planning, organizing, and efficiently handling activities and eliminating unnecessary activities.</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_3" id="management_rating_3_5" value="5" required>
                        <label class="form-check-label" for="management_rating_3_5">
                            Expert Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_3" id="management_rating_3_4" value="4" required>
                        <label class="form-check-label" for="management_rating_3_4">
                            Advanced Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_3" id="management_rating_3_3" value="3" required>
                        <label class="form-check-label" for="management_rating_3_3">
                            Intermediate Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_3" id="management_rating_3_2" value="2" required>
                        <label class="form-check-label" for="management_rating_3_2">
                            Novice (Limited)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_3" id="management_rating_3_1" value="1" required>
                        <label class="form-check-label" for="management_rating_3_1">
                            Fundamental Awareness (Basic Knowledge)
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>1.4. FINANCIAL / EXPENSE MANAGEMENT:</strong> Measures effectiveness in establishing appropriate reporting and control procedures; operating efficiently at lowest cost; staying within established budgets. Plans and works within budget; effectively implements cost-saving procedures; effectively monitors expenditures.</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_4" id="management_rating_4_5" value="5" required>
                        <label class="form-check-label" for="management_rating_4_5">
                            Expert Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_4" id="management_rating_4_4" value="4" required>
                        <label class="form-check-label" for="management_rating_4_4">
                            Advanced Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_4" id="management_rating_4_3" value="3" required>
                        <label class="form-check-label" for="management_rating_4_3">
                            Intermediate Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_4" id="management_rating_4_2" value="2" required>
                        <label class="form-check-label" for="management_rating_4_2">
                            Novice (Limited)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_4" id="management_rating_4_1" value="1" required>
                        <label class="form-check-label" for="management_rating_4_1">
                            Fundamental Awareness (Basic Knowledge)
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>1.5. BUSINESS RELATIONSHIPS:</strong> Establishes and maintains effective business relationships within the context of the individual job responsibility. As appropriate, demonstrates effective business acquisitions skills, including participation in proposal writing, new product development, negotiation, alliance building, idea sharing through collaboration, brainstorming with others to resolve shared problems.</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_5" id="management_rating_5_5" value="5" required>
                        <label class="form-check-label" for="management_rating_5_5">
                            Expert Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_5" id="management_rating_5_4" value="4" required>
                        <label class="form-check-label" for="management_rating_5_4">
                            Advanced Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_5" id="management_rating_5_3" value="3" required>
                        <label class="form-check-label" for="management_rating_5_3">
                            Intermediate Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_5" id="management_rating_5_2" value="2" required>
                        <label class="form-check-label" for="management_rating_5_2">
                            Novice (Limited)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_5" id="management_rating_5_1" value="1" required>
                        <label class="form-check-label" for="management_rating_5_1">
                            Fundamental Awareness (Basic Knowledge)
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>1.6. STAFF UTILIZATION:</strong> Ensures that all employees are treated fairly and with respect; develops personnel plans that meet anticipated needs and enhance individual growth; complies with established policies and procedures affecting human resource.</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_6" id="management_rating_6_5" value="5" required>
                        <label class="form-check-label" for="management_rating_6_5">
                            Expert Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_6" id="management_rating_6_4" value="4" required>
                        <label class="form-check-label" for="management_rating_6_4">
                            Advanced Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_6" id="management_rating_6_3" value="3" required>
                        <label class="form-check-label" for="management_rating_6_3">
                            Intermediate Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_6" id="management_rating_6_2" value="2" required>
                        <label class="form-check-label" for="management_rating_6_2">
                            Novice (Limited)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_6" id="management_rating_6_1" value="1" required>
                        <label class="form-check-label" for="management_rating_6_1">
                            Fundamental Awareness (Basic Knowledge)
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>1.7. STAFF DEVELOPMENT:</strong> Effectively trains new employees and, when appropriate, cross-trains existing staff; initiates retraining; performs timely performance appraisals and ensures that appropriate goals are set.</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_7" id="management_rating_7_5" value="5" required>
                        <label class="form-check-label" for="management_rating_7_5">
                            Expert Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_7" id="management_rating_7_4" value="4" required>
                        <label class="form-check-label" for="management_rating_7_4">
                            Advanced Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_7" id="management_rating_7_3" value="3" required>
                        <label class="form-check-label" for="management_rating_7_3">
                            Intermediate Level
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_7" id="management_rating_7_2" value="2" required>
                        <label class="form-check-label" for="management_rating_7_2">
                            Novice (Limited)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="management_rating_7" id="management_rating_7_1" value="1" required>
                        <label class="form-check-label" for="management_rating_7_1">
                            Fundamental Awareness (Basic Knowledge)
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="management_rating_remarks"><strong>Remarks</strong></label>
                <textarea class="form-control" name="management_rating_remarks" id="management_rating_remarks" rows="3"></textarea>
                <input type="hidden" id="management_rating_score" name="management_rating_score" value="" />
            </div> 
            </br>
        </div>
        {{-- end tab 1 --}}

        <hr>    
            <!-- Content for People -->
            <h4>II. People Management</h4>
            <p>THE DEGREE OF BEING CONCERN TO THE DEVELOPMENT OF SUBORDINATES THROUGH GUIDANCE, 
                COACHING AND TRAINING AND PURSUES ACTION TOWARDS THIS GOAL.
            </p>
            <!-- 2.1. EXPECTED OUTCOME: Provides direction and gains compliance -->
                <div class="form-group">
                    <label for="expectedOutcome4_1"><strong>2.1. EXPECTED OUTCOME:</strong> Provides direction and gains compliance</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_4" value="4" required>
                            <label class="form-check-label" for="pm_rating_1_4">
                                Provides clear direction and has <strong>LITTLE PROBLEM GAINING COMPLIANCE FROM OTHERS</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_1_1">
                                1 - Provides <strong>UNCLEAR DIRECTION</strong> and <strong>HAS DIFFICULTY GAINING COMPLIANCE FROM OTHERS</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_1_5">
                                <strong>EXCELS AT PROVIDING CLEAR DIRECTION</strong> to others as well as gaining their compliance quickly
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_1_3">
                                Provides clear direction and is <strong>USUALLY ABLE TO GAIN COMPLIANCE FROM OTHERS</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_1_2">
                                2 - <strong>SOMETIMES DOES NOT PROVIDE CLEAR DIRECTION</strong> and gain compliance from others
                            </label>
                        </div>
                    </div>
                </div>

                <!-- 4.2. EXPECTED OUTCOME: Includes subordinates in planning -->
                <div class="form-group">
                    <label for="expectedOutcome4_2"><strong>2.2. EXPECTED OUTCOME:</strong> Includes subordinates in planning</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_4" value="4" required>
                            <label class="form-check-label" for="pm_rating_2_4">
                                <strong>MAKES SURE</strong> that his/her subordinates are an <strong>IMPORTANT</strong> part of all planning
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_2_1">
                                1 - <strong>PROBLEMS OCCUR</strong> because s/he <strong>DOES NOT SUFFICIENTLY INCLUDE</strong> his/her subordinates in planning
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_2_5">
                                <strong>IMPLEMENTS PLANNING PROCESSES</strong> that maximize the participation of his/her subordinates to get the best results
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_2_3">
                                <strong>INCLUDES SUBORDINATES</strong> in most planning
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_2_2">
                                2 - <strong>NEEDS TO MORE FULLY INCLUDE</strong> his/her subordinates in planning
                            </label>
                        </div>
                    </div>
                </div>

                <!-- 4.3. EXPECTED OUTCOME: Takes responsibility for subordinates’ activities -->
                <div class="form-group">
                    <label for="expectedOutcome4_3"><strong>2.3. EXPECTED OUTCOME:</strong> Takes responsibility for subordinates’ activities</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_4" value="4" required>
                            <label class="form-check-label" for="pm_rating_3_4">
                                <strong>DOES NOT HESITATE TO TAKE APPROPRIATE RESPONSIBILITY</strong> for his/her subordinates’ activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_3_1">
                                1 - <strong>FAILS TO ASSUME</strong> appropriate responsibility for subordinates’ activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_3_5">
                                <strong>MAINTAINS FULL RESPONSIBILITY</strong> for his/her subordinates’activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_3_3">
                                <strong>TAKES RESPONSIBILITY</strong> for his/her subordinates’ activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_3_2">
                                2 - <strong>ASSUMES INSUFFICIENT RESPONSIBILITY</strong> for subordinates’ activities
                            </label>
                        </div>
                    </div>
                </div>

                <!-- 4.4. EXPECTED OUTCOME: Makes self available to subordinates -->
                <div class="form-group">
                    <label for="expectedOutcome4_4"><strong>2.4. EXPECTED OUTCOME:</strong> Makes self available to subordinates</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_4" value="4" required>
                            <label class="form-check-label" for="pm_rating_4_4">
                                <strong>MAKES EVERY EFFORT</strong> to make himself/ herself accessible to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_4_1">
                                1 - <strong>DOES NOT MAKE HIMSELF/HERSELF ACCESSIBLE</strong> enough to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_4_5">
                                <strong>SETS A HIGH PRIORITY</strong> on ensuring that s/he is always available to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_4_3">
                                <strong>MAKES HIMSELF/HERSELF AVAILABLE</strong> to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_4_2">
                                2 - There <strong>HAVE BEEN TIMES</strong> when he/she <strong>DID NOT MAKE HIMSELF/HERSELF AVAILABLE ENOUGH</strong> to subordinates
                            </label>
                        </div>
                    </div>
                </div>

                <!-- 4.5. EXPECTED OUTCOME: Provides regular performance feedback and develops subordinates’ skills and encourages growth -->
                <div class="form-group">
                    <label for="expectedOutcome4_5"><strong>2.5. EXPECTED OUTCOME:</strong> Provides regular performance feedback and develops subordinates’ skills and encourages growth</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_4" value="4" required>
                            <label class="form-check-label" for="pm_rating_5_4">
                                Provides <strong>CONSISTENT, VALUABLE PERFORMANCE FEEDBACK</strong> & dedicates considerable effort to develop his/ her subordinates’ skills
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_5_1">
                                1 - Provides <strong>INADEQUATE PERFORMANCE FEEDBACK</strong> & does not make efforts to develop the skills of his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_5_5">
                                <strong>WORKS CLOSELY, PROVIDING PERCEPTIVE AND CONSISTENT FEEDBACK</strong> & has a record for developing the skills of his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_5_3">
                                Provides <strong>REGULAR PERFORMANCE FEEDBACK</strong> & works with his/her subordinates to develop their skills
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_5_2">
                                2 - Is <strong>INCONSISTENT ABOUT PROVIDING PERFORMANCE FEEDBACK</strong> & spends minimal time developing his/her subordinate’ skills
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pm_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="pm_rating_remarks" id="pm_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="pm_rating_score" name="pm_rating_score" value="" />
                </div>             
            <br>
        {{-- end tab 2 --}}

        <hr>
            <!-- Content for Problem -->
            <h4>III. Problem-Solving</h4>
            <p>CAPABILITY IN RECOGNIZING PROBLEM AREAS ENCOUNTERED IN WORK AS WELL AS THE ABILITY TO ESTABLISH APPROPRIATE MEASURES TO RESOLVE THESE PROBLEMS. THE ABILITY TO ANALYZE COMPLEX SITUATIONS AND EMPLOY THE BEST SOLUTION AT HAND.</p>       
            <!-- 4.1 EXPECTED OUTCOME: Identifies problems in a timely manner -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_1"><strong>3.1. EXPECTED OUTCOME:</strong> Identifies problems in a timely manner</label>       
                    <div class="mb-3"> 
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_1_3">       
                                Identifies most problem situations <strong>WITHIN APPROPRIATE TIME FRAMES</strong>       
                            </label>       
                        </div>
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_1_1">       
                                1 - Identifies problems in a <strong>LESS THAN TIMELY MANNER</strong>       
                            </label>       
                        </div>  
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_1_2">       
                                2 - <strong>SOMETIMES LATE</strong> in identifying that problem situations exist       
                            </label>       
                        </div>
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_1_5">       
                                <strong>IMMEDIATELY IDENTIFIES</strong> the existence and nature of problems       
                            </label>       
                        </div>   
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_1" id="ps_rating_1_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_1_4">       
                                Identifies the <strong>EXISTENCE OF PROBLEMS QUICKLY</strong>       
                            </label>       
                        </div>  
                    </div>       
                </div>       
                <!-- 4.2 EXPECTED OUTCOME: Gathers and analyzes information skillfully -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_2"><strong>3.2. EXPECTED OUTCOME:</strong> Gathers and analyzes information skillfully</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_2_3">       
                                Information gathering and analysis <strong>MEET THE REQUIREMENTS</strong> of his/her position       
                            </label>       
                        </div> 
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_2_1">       
                                1 - <strong>DOES NOT DEMONSTRATE THE INFORMATION</strong> gathering and analysis skills needed for his/her position       
                            </label>       
                        </div>   
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_2_2">       
                                2 - Information gathering and analysis are <strong>NOT ALWAYS THOROUGH ENOUGH</strong> for his/her position       
                            </label>       
                        </div> 
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_2_5">       
                                <strong>EXTREMELY SKILLED</strong> at gathering and analyzing complex information from multiple sources       
                            </label>       
                        </div>
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_2" id="ps_rating_2_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_2_4">       
                                <strong>SKILLED AT GATHERING</strong> and analyzing information from multiple sources       
                            </label>       
                        </div>            
                    </div>       
                </div>       
                <!-- 4.3 EXPECTED OUTCOME: Develops alternative solutions -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_3"><strong>3.3. EXPECTED OUTCOME:</strong> Develops alternative solutions</label>       
                    <div class="mb-3">       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_3_3">       
                                Most of the time, s/he develops <strong>SEVERAL ALTERNATIVE SOLUTIONS</strong> to problems       
                            </label>       
                        </div>
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_3_1">       
                                1 - <strong>DOES NOT DEVELOP ADEQUATE ALTERNATIVE</strong> solutions as part of the problem-solving process       
                            </label>       
                        </div>  
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_3_2">       
                                2 - <strong>WOULD BE BETTER AT PROBLEM-SOLVING</strong> if s/he better developed alternative solutions       
                            </label>       
                        </div>  
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_3_5">       
                                <strong>ROUTINELY RESEARCHES ALL OPTIONS</strong>, developing the best alternative solutions       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_3" id="ps_rating_3_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_3_4">       
                                Addresses problem-solving situations by <strong>ANALYZING OPTIONS AND DEVELOPING SEVERAL ALTERNATIVE SOLUTIONS</strong>       
                            </label>       
                        </div>   
                    </div>       
                </div>       
                <!-- 4.4 EXPECTED OUTCOME: Resolves problems in early stages -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_4"><strong>3.4. EXPECTED OUTCOME:</strong> Resolves problems in early stages</label>       
                    <div class="mb-3">     
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_4_3">       
                                <strong>USUALLY RESOLVES OR MINIMIZES</strong> most problems before they grow into larger issues       
                            </label>       
                        </div>  
                         <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_4_1">       
                                1 - <strong>FREQUENTLY, PROBLEMS BECOME LARGER ISSUES</strong> because s/he fails to anticipate and resolve them earlier       
                            </label>       
                        </div>
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_4_2">       
                                2 - <strong>COULD DO MORE TO ANTICIPATE</strong> and resolve problems before they grow into larger issues       
                            </label>       
                        </div>
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_4_5">       
                                Using his/her foresight and analytical skills, s/he <strong>QUICKLY RESOLVES PROBLEMS IN THEIR EARLIEST STAGES</strong>       
                            </label>       
                        </div> 
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_4" id="ps_rating_4_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_4_4">       
                                Resolves or minimizes problems by <strong>ADDRESSING THEM IN THEIR EARLY STAGES</strong>       
                            </label>       
                        </div>    
                    </div>       
                </div>       
                <!-- 4.5 EXPECTED OUTCOME: Works well in group problem solving situations -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_5"><strong>3.5. EXPECTED OUTCOME:</strong> Works well in group problem solving situations</label>       
                    <div class="mb-3">
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_3" value="3" required>       
                            <label class="form-check-label" for="ps_rating_5_3">       
                                <strong>PARTICIPATES WELL</strong> in group problem solving situations       
                            </label>       
                        </div>   
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_1" value="1" required>       
                            <label class="form-check-label" for="ps_rating_5_1">       
                                1 - <strong>NEEDS TO PARTICIPATE MORE ACTIVELY</strong> in group problem solving situations       
                            </label>       
                        </div> 
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_2" value="2" required>       
                            <label class="form-check-label" for="ps_rating_5_2">       
                                2 - Participation in group problem solving situations <strong>NEEDS TO IMPROVE</strong>       
                            </label>       
                        </div>  
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_5" value="5" required>       
                            <label class="form-check-label" for="ps_rating_5_5">       
                                In group problem solving situations, s/he is <strong>A KEY MEMBER, LISTENING TO ALL PERSPECTIVES</strong> and helping the team come to resolution       
                            </label>       
                        </div>       
                        <div class="form-check">       
                            <input class="form-check-input" type="radio" name="ps_rating_5" id="ps_rating_5_4" value="4" required>       
                            <label class="form-check-label" for="ps_rating_5_4">       
                                In group situations, s/he <strong>CONTRIBUTES ACTIVELY TO HELP SOLVE PROBLEMS</strong>       
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
        {{-- end tab 3 --}}

        <hr>
            <!-- Content for Judgment -->
            <h4>IV. Judgment</h4>
            <p>THE ABILITY TO GIVE OUT OPINION CONSIDERING ALL ANGLES OF THE SITUATION AND TO ARRIVE 
                AT A DECISION THAT IS WELL-THOUGHT OF MINIMIZING PREJUDICES TO THE COMPANY.
            </p>
                <div class="form-group">
                    <label><strong>4.1. EXPECTED OUTCOME:</strong> Displays willingness to make decisions</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_2" value="2" required>
                            <label class="form-check-label" for="judgment_rating_1_2">
                                2 - Hesitates in making some decisions on his/her own, <strong>OFTEN REQUIRING MORE ASSISTANCE</strong> than appropriate 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_1_4">
                                <strong>CONFIDENTLY MAKES DECISIONS</strong> in all areas of his/her job
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_1_3">
                                <strong>MAKES CONFIDENT DECISIONS</strong> in most areas of his/her job
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_1_1">
                                1 - Frequently, s/he <strong>HAS DIFFICULTY MAKING INDEPENDENT DECISIONS</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_1_5">
                                <strong>DOES NOT HESITATE TO MAKE DECISIONS</strong> on very challenging matters and has confidence in his/her decision making abilities
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>4.2. EXPECTED OUTCOME:</strong> Exhibits sound and accurate judgment</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_2" value="2" required>
                            <label class="form-check-label" for="judgment_rating_2_2">
                                2 - Has <strong>TOO OFTEN MADE DECISIONS</strong> that subsequently <strong>RESULTED IN PROBLEMS</strong> because they were not well thought out
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_2_4">
                                Decisions are <strong>ON TARGET</strong> and reflect his/her reliable, sound judgment skills
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_2_3">
                                Decisions are <strong>GENERALLY ACCURATE</strong> and sound
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_2_1">
                                1 - <strong>LACK OF JUDGMENT</strong> has often resulted in problem situations
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_2_5">
                                <strong>SOUND JUDGMENT RESULTS</strong> in decisions that are <strong>CONSISTENTLY ON TARGET</strong> for even the most complicated issues
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>4.3. EXPECTED OUTCOME:</strong> Supports and explains reasoning for decisions</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_2" value="2" required>
                            <label class="form-check-label" for="judgment_rating_3_2">
                                2 - <strong>SOMETIMES HAS DIFFICULTY</strong> supporting and explaining his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_3_4">
                                Can <strong>CLEARLY EXPLAIN</strong> the reasoning and provide <strong>GOOD SUPPORT</strong> for his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_3_3">
                                Can <strong>USUALLY SUPPORT AND EXPLAIN</strong> the reasoning for his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_3_1">
                                1 - Presents <strong>INADEQUATE SUPPORT</strong> and reasoning for his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_3_5">
                                <strong>SKILLFULLY PRESENTS</strong> the supporting information and reasoning behind his/her decisions
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>4.4. EXPECTED OUTCOME:</strong> Includes appropriate people in decision making process</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_2" value="2" required>
                            <label class="form-check-label" for="judgment_rating_4_2">
                                2 - Decision making is <strong>FREQUENTLY LESS THAN EFFECTIVE</strong> because s/he does not include the appropriate people
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_4_4">
                                <strong>VERIFIES</strong> that the <strong>APPROPRIATE PEOPLE ARE INCLUDED</strong> in the decision-making process
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_4_3">
                                In most matters, s/he <strong>INCLUDES THE APPROPRIATE PEOPLE</strong> in the decision-making process
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_4_1">
                                1 - <strong>EXCLUDES APPROPRIATE PEOPLE</strong> from the decision-making process too often
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_4_5">
                                <strong>ALWAYS ENSURES</strong> that the appropriate people are included in the decision-making process
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label><strong>4.5. EXPECTED OUTCOME:</strong> Makes timely decisions</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_2" value="2" required>
                            <label class="form-check-label" for="judgment_rating_5_2">
                                2 - <strong>TAKES LONGER</strong> than acceptable to reach a decision
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_5_4">
                                Can <strong>USUALLY MAKE DECISIONS</strong> even under tight time frames 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_5_3">
                                Decisions are made in a <strong>TIMELY MANNER</strong>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_5_1">
                                1 - Takes an <strong>UNACCEPTABLE LENGTH OF TIME</strong> to make decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_5_5">
                                <strong>CAN BE RELIED UPON TO MAKE DECISIONS</strong> even under the tightest time frames
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="judgment_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="judgment_rating_remarks" id="judgment_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="judgment_rating_score" name="judgment_rating_score" value="" />
                </div> 
            <br>
        {{-- end tab 4 --}}

        <hr>
            <!-- Content for Leadership -->
            <h4>V. Leadership</h4>
            <p>THE ABILITY TO GIVE OUT OPINION CONSIDERING ALL ANGLES OF THE SITUATION AND TO ARRIVE 
                AT A DECISION THAT IS WELL-THOUGHT OF MINIMIZING PREJUDICES TO THE COMPANY.
            </p>
            <div class="form-group">
                <label><strong>5.1. EXPECTED OUTCOME:</strong> Exhibits confidence in self and others</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_2" value="2" required>
                        <label class="form-check-label" for="leadership_rating_1_2">
                            2 - <strong>WOULD BE A STRONGER LEADER</strong> if s/he exhibited greater confidence in himself/herself as well as in others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_1_1">
                            1 - <strong>FAILS TO EXHIBIT</strong> the kind of confidence in himself/herself and others that is needed to successfully perform his/her job
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_1_5">
                            Communicates not only <strong>A STRONG CONFIDENCE</strong> in himself/herself but also a confidence in others that encourages them to perform to their best
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_1_3">
                            Exhibits an <strong>APPROPRIATE LEVEL OF CONFIDENCE</strong> in himself/herself as well as in others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_1_4">
                            Exhibits a <strong>HIGH DEGREE OF CONFIDENCE</strong> in himself/herself as well as in others
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>5.2. EXPECTED OUTCOME:</strong> Inspires respect and trust</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_2" value="2" required>
                        <label class="form-check-label" for="leadership_rating_2_2">
                            2 - <strong>UPON OCCASION</strong>, his/her actions have <strong>RESULTED IN A LACK OF RESPECT</strong> and trust from others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_2_1">
                            1 - Because of his/her actions, s/he <strong>HAS NOT INSPIRED THE RESPECT</strong> and trust of others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_2_5">
                            Has <strong>EARNED THE RESPECT AND TRUST OF OTHERS</strong> through his/her uncompromising integrity and openness
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_2_3">
                            Inspires the respect and trust of others through <strong>HIS/HER ACTIONS</strong>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_2_4">
                            Inspires the respect and trust of others through <strong>HIS/HER OPENNESS AND INTEGRITY</strong>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>5.3. EXPECTED OUTCOME:</strong> Reacts well under pressure</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_2" value="2" required>
                        <label class="form-check-label" for="leadership_rating_3_2">
                            2 - <strong>SOMETIMES REACTS POORLY</strong> in pressure situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_3_1">
                            1 - <strong>HAS REACTED POORLY</strong> in pressure situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_3_5">
                            <strong>PROVIDES LEADERSHIP</strong> even when challenged with highly stressful or crisis situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_3_3">
                            <strong>REACTS WELL</strong> in pressure situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_3_4">
                            <strong>TOLERATES A GREAT DEAL</strong> of pressure
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>5.4. EXPECTED OUTCOME:</strong> Shows courage to take action</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_2" value="2" required>
                        <label class="form-check-label" for="leadership_rating_4_2">
                            2 - Has <strong>SHOWN RELUCTANCE</strong> to assume a leadership role when action was needed
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_4_1">
                            1 - <strong>OFTEN HESITATES OR LACKS CONVICTION</strong> when action is needed
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_4_5">
                            When action is needed, s/he is a <strong>NATURAL LEADER</strong> due to his/her <strong>COURAGE AND DECISIVENESS</strong>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_4_3">
                            When action is needed, s/he shows the <strong>ABILITY TO ASSUME A LEADERSHIP ROLE</strong>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_4_4">
                            <strong>QUICKLY ASSUMES A STRONG LEADERSHIP</strong> role when action is needed
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label><strong>5.5. EXPECTED OUTCOME:</strong> Motivates others to perform well</label>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_2" value="2" required>
                        <label class="form-check-label" for="leadership_rating_5_2">
                            2 - <strong>HAS NOT ADEQUATELY MOTIVATED</strong> others to perform better
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_5_1">
                            1 - <strong>HAS NOT DEMONSTRATED</strong> the ability to motivate others to perform better
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_5_5">
                            <strong>A POWERFUL INFLUENCE UPON OTHERS</strong>, motivating them to perform their best
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_5_3">
                            <strong>INFLUENCES OTHERS</strong> to perform better
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_5_4">
                            <strong>EXCELS AT MOTIVATING OTHERS</strong> to perform better
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="leadership_rating_remarks"><strong>Remarks</strong></label>
                <textarea class="form-control" name="leadership_rating_remarks" id="leadership_rating_remarks" rows="3"></textarea>
                <input type="hidden" id="leadership_rating_score" name="leadership_rating_score" value="" />
            </div>             
            <br>
        {{-- end tab 5 --}}

        <hr>
           <!-- Content for Innovation -->
            <h4>VI. Innovation</h4>
            <p>DEGREE OF CREATIVITY MANIFESTED AND ABILITY TO COME UP WITH NEW IDEAS WHICH COULD 
                FACILITATE WORK PROCESS.
            </p>
            <!-- 5.1 EXPECTED OUTCOME: Displays original thinking and creativity -->
                <div class="form-group">
                    <label for="expectedOutcome5_1"><strong>6.1. EXPECTED OUTCOME:</strong> Displays original thinking and creativity</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_1_3">
                                <strong>DISPLAYS CREATIVITY</strong> and original thinking in his/her work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_1_2">
                                2 - <strong>NEEDS TO DISPLAY MORE CREATIVITY</strong> and original thinking to meet the minimum expectations for his/her position
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_1_1">
                                1 - <strong>HAS NOT DISPLAYED ENOUGH CREATIVITY</strong> or original thinking in his/her work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_1_5">
                                <strong>DISPLAYS BRILLIANCE IN HIS/HER CREATIVITY</strong> and original thinking 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_1" id="inno_rating_1_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_1_4">
                                <strong>OFTEN DISPLAYS CREATIVITY</strong> and original thinking <strong>BEYOND THE EXPECTATIONS</strong> for his/her position
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 5.2 EXPECTED OUTCOME: Meets challenges with resourcefulness -->
                <div class="form-group">
                    <label for="expectedOutcome5_2"><strong>6.2. EXPECTED OUTCOME:</strong> Meets challenges with resourcefulness</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_2_3">
                                <strong>USUALLY RESOURCEFUL</strong> when faced with unexpected challenges
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_2_2">
                                2 - <strong>NOT ALWAYS RESOURCEFUL</strong> enough when faced with unexpected challenges
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_2_1">
                                1 - <strong>DOES NOT SHOW THE NECESSARY RESOURCEFULNESS</strong> when faced with unexpected challenges
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_2_5">
                                When faced with unexpected challenges, s/he is <strong>EXTREMELY RESOURCEFUL</strong> 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_2" id="inno_rating_2_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_2_4">
                                When faced with unexpected challenges, s/he is <strong>VERY RESOURCEFUL</strong>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 5.3 EXPECTED OUTCOME: Generates suggestions for improving work -->
                <div class="form-group">
                    <label for="expectedOutcome5_3"><strong>6.3. EXPECTED OUTCOME:</strong> Generates suggestions for improving work</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_3_3">
                                Contributes <strong>USABLE SUGGESTIONS</strong> for improving work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_3_2">
                                2 - It <strong>WOULD BE PREFERABLE</strong> if s/he <strong>OFFERED MORE USABLE</strong> suggestions on how to improve work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_3_1">
                                1 - <strong>RARELY CONTRIBUTES</strong> usable suggestions for improving work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_3_5">
                                On a <strong>CONSISTENT BASIS</strong>, s/he contributes <strong>HIGHLY INGENIOUS AND VALUABLE SUGGESTIONS</strong> for improving work
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_3" id="inno_rating_3_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_3_4">
                                <strong>GENERATES MANY USABLE</strong> and ingenious suggestions for improving work
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- 5.4 EXPECTED OUTCOME: Develops innovative approaches and ideas -->
                <div class="form-group">
                    <label for="expectedOutcome5_4"><strong>6.4. EXPECTED OUTCOME:</strong> Develops innovative approaches and ideas</label>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_3" value="3" required>
                            <label class="form-check-label" for="inno_rating_4_3">
                                Has <strong>DEVELOPED INNOVATIVE APPROACHES</strong> and ideas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_2" value="2" required>
                            <label class="form-check-label" for="inno_rating_4_2">
                                2 - Has <strong>NOT DEVELOPED MANY INNOVATIVE APPROACHES</strong> or ideas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_1" value="1" required>
                            <label class="form-check-label" for="inno_rating_4_1">
                                1 - Approaches and ideas have <strong>NOT BEEN INNOVATED ENOUGH</strong> for his/her position
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_5" value="5" required>
                            <label class="form-check-label" for="inno_rating_4_5">
                                Has <strong>PRODUCED INNOVATIVE APPROACHES</strong> and ideas that are <strong>FAR ABOVE THE EXPECTATIONS</strong> for his/her position 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inno_rating_4" id="inno_rating_4_4" value="4" required>
                            <label class="form-check-label" for="inno_rating_4_4">
                                Has developed some <strong>HIGHLY INNOVATIVE APPROACHES</strong> and ideas
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
        {{-- end tab 6 --}}

        <hr>
            <!-- Content for Compliances -->
            <h4>VII. Compliances</h4>
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
                                2 - <strong>REPRIMANDED FOR SOME VIOLATION</strong>/noncompliance to policies and procedures       
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
                                2 - Upon occasion, has not observed proper safety and security procedures       
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
                                Shows <strong>MODERATE INTEREST</strong> in work       
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
                    <label for="comp_rating_remarks"><strong>Remarks</strong></label>
                    <textarea class="form-control" name="comp_rating_remarks" id="comp_rating_remarks" rows="3"></textarea>
                    <input type="hidden" id="comp_rating_score" name="comp_rating_score" value="" />
                </div> 
            <br>  
            <hr>
            <div class="form-group">
                <label for="evaluator_recommendation"><strong>EVALUATOR’S RECOMMENDATION / GENERAL ASSESSMENT</strong></label>
                <textarea class="form-control" name="evaluator_recommendation" id="evaluator_recommendation" rows="5" required></textarea>
            </div>
            <br>
            <br>
            <div class="d-grid gap-2">
              <input type="hidden" id="appraisal_rating_score" name="appraisal_rating_score" value="" />
              <input type="hidden" id="form_id" name="form_id" value="5" />
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
       
        {{-- end tab 7 --}}
    </div>
  </div>
</div>