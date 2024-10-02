<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
      <h4 class="card-title">PERFORMANCE APPRAISAL FORM</h4>
      <p class="card-text">(Senior Managers and Executives)</p>
      {{-- form --}}
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-management-tab" data-coreui-toggle="tab" data-coreui-target="#nav-management" type="button" role="tab" aria-controls="nav-management" aria-selected="true"><strong>Management and Organizational Skills</strong></button>
            <button class="nav-link" id="nav-people-tab" data-coreui-toggle="tab" data-coreui-target="#nav-people" type="button" role="tab" aria-controls="nav-people" aria-selected="false"><strong>People Management</strong></button>
            <button class="nav-link" id="nav-problem-tab" data-coreui-toggle="tab" data-coreui-target="#nav-problem" type="button" role="tab" aria-controls="nav-problem" aria-selected="false"><strong>Problem Solving</strong></button>
            <button class="nav-link" id="nav-judgement-tab" data-coreui-toggle="tab" data-coreui-target="#nav-judgement" type="button" role="tab" aria-controls="nav-judgement" aria-selected="false"><strong>Judgement</strong></button>
            <button class="nav-link" id="nav-leadership-tab" data-coreui-toggle="tab" data-coreui-target="#nav-leadership" type="button" role="tab" aria-controls="nav-leadership" aria-selected="false"><strong>Leadership</strong></button>
            <button class="nav-link" id="nav-innovation-tab" data-coreui-toggle="tab" data-coreui-target="#nav-innovation" type="button" role="tab" aria-controls="nav-innovation" aria-selected="false"><strong>Innovation</strong></button>
            <button class="nav-link" id="nav-compliance-tab" data-coreui-toggle="tab" data-coreui-target="#nav-compliance" type="button" role="tab" aria-controls="nav-compliance" aria-selected="false"><strong>Compliances</strong></button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <!-- Content for Management and Organizational Skills -->
        <div class="tab-pane fade show active" id="nav-management" role="tabpanel" aria-labelledby="nav-management-tab" tabindex="0">
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
            <!-- Next Button -->
            <button type="button" class="btn btn-primary" id="next-to-management">Next</button>
        </div>
        {{-- end tab 1 --}}

        <div class="tab-pane fade" id="nav-people" role="tabpanel" aria-labelledby="nav-people-tab" tabindex="0">
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
                                Provides clear direction and has little problem gaining compliance from others
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_1_1">
                                Provides unclear direction and has difficulty gaining compliance from others
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_1_5">
                                Excels at providing clear direction to others as well as gaining their compliance quickly
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_1_3">
                                Provides clear direction and is usually able to gain compliance from others
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_1" id="pm_rating_1_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_1_2">
                                Sometimes does not provide clear direction and gain compliance from others
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
                                Makes sure that his/her subordinates are an important part of all planning
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_2_1">
                                Problems occur because s/he does not sufficiently include his/her subordinates in planning
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_2_5">
                                Implements planning processes that maximize the participation of his/her subordinates to get the best results
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_2_3">
                                Includes subordinates in most planning
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_2" id="pm_rating_2_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_2_2">
                                Needs to more fully include his/her subordinates in planning
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
                                Does not hesitate to take appropriate responsibility for his/her subordinates’ activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_3_1">
                                Fails to assume appropriate responsibility for subordinates’ activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_3_5">
                                Maintains full responsibility for his/her subordinates’activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_3_3">
                                Takes responsibility for his/her subordinates’ activities
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_3" id="pm_rating_3_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_3_2">
                                Assumes insufficient responsibility for subordinates’ activities
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
                                Makes every effort to make himself/ herself accessible to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_4_1">
                                Does not make himself/herself accessible enough to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_4_5">
                                Sets a high priority on ensuring that s/he is always available to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_4_3">
                                Makes himself/herself available to his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_4" id="pm_rating_4_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_4_2">
                                There have been times when he/she did not make himself/herself available enough to subordinates
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
                                Provides consistent, valuable performance feedback & dedicates considerable effort to develop his/ her subordinates’ skills
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_1" value="1" required>
                            <label class="form-check-label" for="pm_rating_5_1">
                                Provides inadequate performance feedback & does not make efforts to develop the skills of his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_5" value="5" required>
                            <label class="form-check-label" for="pm_rating_5_5">
                                Works closely, providing perceptive and consistent feedback & has a record for developing the skills of his/her subordinates
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_3" value="3" required>
                            <label class="form-check-label" for="pm_rating_5_3">
                                Provides regular performance feedback & works with his/her subordinates to develop their skills
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pm_rating_5" id="pm_rating_5_2" value="2" required>
                            <label class="form-check-label" for="pm_rating_5_2">
                                Is inconsistent about providing performance feedback & spends minimal time developing his/her subordinate’ skills
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
            <button type="button" class="btn btn-secondary" id="prev-to-people">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-people">Next</button>
        </div>
        {{-- end tab 2 --}}

        <div class="tab-pane fade" id="nav-problem" role="tabpanel" aria-labelledby="nav-problem-tab" tabindex="0">
            <!-- Content for Problem -->
            <h4>III. Problem-Solving</h4>
            <p>CAPABILITY IN RECOGNIZING PROBLEM AREAS ENCOUNTERED IN WORK AS WELL AS THE ABILITY TO ESTABLISH APPROPRIATE MEASURES TO RESOLVE THESE PROBLEMS. THE ABILITY TO ANALYZE COMPLEX SITUATIONS AND EMPLOY THE BEST SOLUTION AT HAND.</p>       
            <!-- 4.1 EXPECTED OUTCOME: Identifies problems in a timely manner -->       
                <div class="form-group">       
                    <label for="expectedOutcome4_1"><strong>3.1. EXPECTED OUTCOME:</strong> Identifies problems in a timely manner</label>       
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
                    <label for="expectedOutcome4_2"><strong>3.2. EXPECTED OUTCOME:</strong> Gathers and analyzes information skillfully</label>       
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
                    <label for="expectedOutcome4_3"><strong>3.3. EXPECTED OUTCOME:</strong> Develops alternative solutions</label>       
                    <div class="mb-3">       
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
                    <label for="expectedOutcome4_4"><strong>3.4. EXPECTED OUTCOME:</strong> Resolves problems in early stages</label>       
                    <div class="mb-3">       
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
                    <label for="expectedOutcome4_5"><strong>3.5. EXPECTED OUTCOME:</strong> Works well in group problem solving situations</label>       
                    <div class="mb-3">       
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
        {{-- end tab 3 --}}

        <div class="tab-pane fade" id="nav-judgement" role="tabpanel" aria-labelledby="nav-judgement-tab" tabindex="0">
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
                                Hesitates in making some decisions on his/her own, often requiring more assistance than appropriate 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_1_4">
                                Confidently makes decisions in all areas of his/her job
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_1_3">
                                Makes confident decisions in most areas of his/her job
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_1_1">
                                Frequently, s/he has difficulty making independent decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_1" id="judgment_rating_1_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_1_5">
                                Does not hesitate to make decisions on very challenging matters and has confidence in his/her decision making abilities
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
                                Has too often made decisions that subsequently resulted in problems because they were not well thought out
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_2_4">
                                Decisions are on target and reflect his/her reliable, sound judgment skills
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_2_3">
                                Decisions are generally accurate and sound
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_2_1">
                                Lack of judgment has often resulted in problem situations
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_2" id="judgment_rating_2_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_2_5">
                                Sound judgment results in decisions that are consistently on target for even the most complicated issues
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
                                Sometimes has difficulty supporting and explaining his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_3_4">
                                Can clearly explain the reasoning and provide good support for his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_3_3">
                                Can usually support and explain the reasoning for his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_3_1">
                                Presents inadequate support and reasoning for his/her decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_3" id="judgment_rating_3_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_3_5">
                                Skillfully presents the supporting information and reasoning behind his/her decisions
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
                                Decision making is frequently less than effective because s/he does not include the appropriate people
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_4_4">
                                Verifies that the appropriate people are included in the decision-making process
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_4_3">
                                In most matters, s/he includes the appropriate people in the decision-making process
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_4_1">
                                Excludes appropriate people from the decision-making process too often
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_4" id="judgment_rating_4_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_4_5">
                                Always ensures that the appropriate people are included in the decision-making process
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
                                Takes longer than acceptable to reach a decision
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_4" value="4" required>
                            <label class="form-check-label" for="judgment_rating_5_4">
                                Can usually make decisions even under tight time frames 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_3" value="3" required>
                            <label class="form-check-label" for="judgment_rating_5_3">
                                Decisions are made in a timely manner
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_1" value="1" required>
                            <label class="form-check-label" for="judgment_rating_5_1">
                                Takes an unacceptable length of time to make decisions
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="judgment_rating_5" id="judgment_rating_5_5" value="5" required>
                            <label class="form-check-label" for="judgment_rating_5_5">
                                Can be relied upon to make decisions even under the tightest time frames
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
            <button type="button" class="btn btn-secondary" id="prev-to-judgement">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-judgement">Next</button>
        </div>
        {{-- end tab 4 --}}

        <div class="tab-pane fade" id="nav-leadership" role="tabpanel" aria-labelledby="nav-leadership-tab" tabindex="0">
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
                            Would be a stronger leader if s/he exhibited greater confidence in himself/herself as well as in others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_1_1">
                            Fails to exhibit the kind of confidence in himself/herself and others that is needed to successfully perform his/her job
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_1_5">
                            Communicates not only a strong confidence in himself/herself but also a confidence in others that encourages them to perform to their best
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_1_3">
                            Exhibits an appropriate level of confidence in himself/herself as well as in others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_1" id="leadership_rating_1_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_1_4">
                            Exhibits a high degree of confidence in himself/herself as well as in others
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
                            Upon occasion, his/her actions have resulted in a lack of respect and trust from others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_2_1">
                            Because of his/her actions, s/he has not inspired the respect and trust of others
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_2_5">
                            Has earned the respect and trust of others through his/her uncompromising integrity and openness
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_2_3">
                            Inspires the respect and trust of others through his/her actions
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_2" id="leadership_rating_2_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_2_4">
                            Inspires the respect and trust of others through his/her openness and integrity
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
                            Sometimes reacts poorly in pressure situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_3_1">
                            Has reacted poorly in pressure situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_3_5">
                            Provides leadership even when challenged with highly stressful or crisis situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_3_3">
                            Reacts well in pressure situations
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_3" id="leadership_rating_3_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_3_4">
                            Tolerates a great deal of pressure
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
                            Has shown reluctance to assume a leadership role when action was needed
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_4_1">
                            Often hesitates or lacks conviction when action is needed
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_4_5">
                            When action is needed, s/he is a natural leader due to his/her courage and decisiveness
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_4_3">
                            When action is needed, s/he shows the ability to assume a leadership role
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_4" id="leadership_rating_4_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_4_4">
                            Quickly assumes a strong leadership role when action is needed
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
                            Has not adequately motivated others to perform better
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_1" value="1" required>
                        <label class="form-check-label" for="leadership_rating_5_1">
                            Has not demonstrated the ability to motivate others to perform better
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_5" value="5" required>
                        <label class="form-check-label" for="leadership_rating_5_5">
                            A powerful influence upon others, motivating them to perform their best
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_3" value="3" required>
                        <label class="form-check-label" for="leadership_rating_5_3">
                            Influences others to perform better
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="leadership_rating_5" id="leadership_rating_5_4" value="4" required>
                        <label class="form-check-label" for="leadership_rating_5_4">
                            Excels at motivating others to perform better
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
            <button type="button" class="btn btn-secondary" id="prev-to-leadership">Previous</button>
            <button type="button" class="btn btn-primary" id="next-to-leadership">Next</button>
        </div>
        {{-- end tab 5 --}}

        <div class="tab-pane fade" id="nav-innovation" role="tabpanel" aria-labelledby="nav-innovation-tab" tabindex="0">
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
                    <label for="expectedOutcome5_2"><strong>6.2. EXPECTED OUTCOME:</strong> Meets challenges with resourcefulness</label>
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
                    <label for="expectedOutcome5_3"><strong>6.3. EXPECTED OUTCOME:</strong> Generates suggestions for improving work</label>
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
                    <label for="expectedOutcome5_4"><strong>6.4. EXPECTED OUTCOME:</strong> Develops innovative approaches and ideas</label>
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
        {{-- end tab 6 --}}

        <div class="tab-pane fade" id="nav-compliance" role="tabpanel" aria-labelledby="nav-compliance-tab" tabindex="0">
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
                    <label for="expectedOutcome7_2"><strong>7.2. EXPECTED OUTCOME:</strong> Observes safety and security procedures</label>       
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
                    <label for="expectedOutcome7_3"><strong>7.3. EXPECTED OUTCOME:</strong> Determines appropriate action beyond guidelines</label>       
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
                    <label for="expectedOutcome7_4"><strong>7.4. EXPECTED OUTCOME:</strong> Uses equipment and materials properly</label>       
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
                    <label for="expectedOutcome7_5"><strong>7.5. EXPECTED OUTCOME:</strong> Observes proper deportment and decorum – social traits such as disposition, tact, appearance, behavior, and conduct</label>       
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
                    <label for="expectedOutcome7_6"><strong>7.6. EXPECTED OUTCOME:</strong> Observes proper interpersonal skills – the ability to work harmoniously with others towards the achievement of goals.</label>       
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
                    <label for="expectedOutcome7_7"><strong>7.7. EXPECTED OUTCOME:</strong> Possesses interest in his/her work, enthusiasm, and concern over speedy accomplishment of assigned tasks.</label>       
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
            <hr>
            <div class="form-group">
                <label for="evaluator_recommendation"><strong>EVALUATOR’S RECOMMENDATION / GENERAL ASSESSMENT</strong></label>
                <textarea class="form-control" name="evaluator_recommendation" id="evaluator_recommendation" rows="5" required></textarea>
            </div>
            <br>
            <button type="button" class="btn btn-secondary" id="prev-to-compliance">Previous</button>
            <br>
            <br>
            <div class="d-grid gap-2">
              <input type="hidden" id="appraisal_rating_score" name="appraisal_rating_score" value="" />
              <input type="hidden" id="form_id" name="form_id" value="5" />
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
        {{-- end tab 7 --}}
    </div>
  </div>
</div>