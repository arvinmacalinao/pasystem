<?php

namespace App\Helpers;

class AppraisalHelper
{
    public static function computeAverageRatings($request, $categories)
    {
        $averages = [];
        
        foreach ($categories as $category) {
            $ratings = [];
            for ($i = 1; $i <= 7; $i++) {
                $rating = $request->input("{$category}_rating_{$i}");
                if ($rating) {
                    $ratings[] = $rating;
                }
            }
            
            if (count($ratings) > 0) {
                $averages["{$category}_rating_score"] = array_sum($ratings) / count($ratings);
            } else {
                $averages["{$category}_rating_score"] = null;
            }
        }
        
        return $averages;
    }

    public static function computeAttendanceRatings($request, $categories, $endMonth)
    {
        $averages = [];
        
        foreach ($categories as $category) {
            $ratings = [];
            for ($i = 1; $i <= $endMonth; $i++) {
                $rating = $request->input("{$category}_rating_{$i}");
                if ($rating) {
                    $ratings[] = $rating;
                }
            }
            
            if (count($ratings) > 0) {
                $averages["{$category}_rating_score"] = array_sum($ratings) / count($ratings);
            } else {
                $averages["{$category}_rating_score"] = null;
            }
        }

        return $averages;
    }

    public static function computeAttendanceRatings1($request, $categories)
    {
        $averages = [];
        
        foreach ($categories as $category) {
            $ratings = [];
            for ($i = 1; $i <= 6; $i++) {
                $rating = $request->input("{$category}_rating_{$i}");
                if ($rating) {
                    $ratings[] = $rating;
                }
            }
            
            if (count($ratings) > 0) {
                $averages["{$category}_rating_score"] = array_sum($ratings) / count($ratings);
            } else {
                $averages["{$category}_rating_score"] = null;
            }
        }

        return $averages;
    }

    public static function computeOverallRating($level, $averageRatings)
    {
        $appraisal_rating_score = 0;

        if ($level >= 1 && $level <= 3) {
            $appraisal_rating_score  = [
                $averageRatings['jk_rating_score'] * 0.2,
                $averageRatings['quality_rating_score'] * 0.2,
                $averageRatings['quantity_rating_score'] * 0.15,
                $averageRatings['initiative_rating_score'] * 0.05,
                $averageRatings['coop_rating_score'] * 0.05,
                $averageRatings['comms_rating_score'] * 0.05,
                $averageRatings['comp_rating_score'] * 0.1,
                $averageRatings['attend_rating_score'] * 0.05,
            ];
            $appraisal_rating_score = array_sum($appraisal_rating_score);
        } elseif ($level >= 4 && $level <= 6) {
            $appraisal_rating_score  = [
                $averageRatings['jk_rating_score'] * 0.15,
                $averageRatings['quality_rating_score'] * 0.15,
                $averageRatings['quantity_rating_score'] * 0.15,
                $averageRatings['ps_rating_score'] * 0.15,
                $averageRatings['inno_rating_score'] * 0.05,
                $averageRatings['tw_rating_score'] * 0.05,
                $averageRatings['comms_rating_score'] * 0.05,
                $averageRatings['comp_rating_score'] * 0.1,
                $averageRatings['attend_rating_score'] * 0.05,
            ];
            $appraisal_rating_score = array_sum($appraisal_rating_score);
        } elseif ($level >= 7 && $level <= 8) {
            $appraisal_rating_score  = [
                $averageRatings['jk_rating_score'] * 0.1,
                $averageRatings['quality_rating_score'] * 0.1,
                $averageRatings['quantity_rating_score'] * 0.1,
                $averageRatings['pm_rating_score'] * 0.1,
                $averageRatings['ps_rating_score'] * 0.1,
                $averageRatings['judgment_rating_score'] * 0.05,
                $averageRatings['leadership_rating_score'] * 0.1,
                $averageRatings['inno_rating_score'] * 0.08,
                $averageRatings['comms_rating_score'] * 0.05,
                $averageRatings['comp_rating_score'] * 0.1,
                $averageRatings['attend_rating_score'] * 0.04,
            ];
            $appraisal_rating_score = array_sum($appraisal_rating_score);
        } elseif ($level == 9) {
            $appraisal_rating_score  = [
                $averageRatings['jk_rating_score'] * 0.1,
                $averageRatings['quality_rating_score'] * 0.1,
                $averageRatings['quantity_rating_score'] * 0.1,
                $averageRatings['pm_rating_score'] * 0.1,
                $averageRatings['ps_rating_score'] * 0.1,
                $averageRatings['judgment_rating_score'] * 0.1,
                $averageRatings['leadership_rating_score'] * 0.1,
                $averageRatings['inno_rating_score'] * 0.1,
                $averageRatings['comms_rating_score'] * 0.05,
                $averageRatings['comp_rating_score'] * 0.1,
                $averageRatings['attend_rating_score'] * 0.02,
            ];
            $appraisal_rating_score = array_sum($appraisal_rating_score);
        } elseif ($level == 10) {
            $appraisal_rating_score  = [
                $averageRatings['management_rating_score'] * 0.4,
                $averageRatings['pm_rating_score'] * 0.1,
                $averageRatings['ps_rating_score'] * 0.1,
                $averageRatings['judgment_rating_score'] * 0.1,
                $averageRatings['leadership_rating_score'] * 0.1,
                $averageRatings['inno_rating_score'] * 0.1,
                $averageRatings['comp_rating_score'] * 0.1,
            ];
            $appraisal_rating_score = array_sum($appraisal_rating_score);
        }
        
        return $appraisal_rating_score;
    }
    
    public static function test($request)
    {
        $averages = [];
        
        // Job Knowledge Rating
        $jkRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("jk_rating_{$i}");
            if ($rating) {
                $jkRatings[] = $rating;
            }
        }
        $averages['jk_rating_score'] = count($jkRatings) > 0 ? array_sum($jkRatings) / count($jkRatings) : null;
        
        // Quality Rating
        $qualityRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("quality_rating_{$i}");
            if ($rating) {
                $qualityRatings[] = $rating;
            }
        }
        $averages['quality_rating_score'] = count($qualityRatings) > 0 ? array_sum($qualityRatings) / count($qualityRatings) : null;
        
        // Quantity Rating
        $quantityRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("quantity_rating_{$i}");
            if ($rating) {
                $quantityRatings[] = $rating;
            }
        }
        $averages['quantity_rating_score'] = count($quantityRatings) > 0 ? array_sum($quantityRatings) / count($quantityRatings) : null;
        
        // Initiative Rating
        $initiativeRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("initiative_rating_{$i}");
            if ($rating) {
                $initiativeRatings[] = $rating;
            }
        }
        $averages['initiative_rating_score'] = count($initiativeRatings) > 0 ? array_sum($initiativeRatings) / count($initiativeRatings) : null;
        
        // Cooperation
        $coopRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("coop_rating_{$i}");
            if ($rating) {
                $coopRatings[] = $rating;
            }
        }
        $averages['coop_rating_score'] = count($coopRatings) > 0 ? array_sum($coopRatings) / count($coopRatings) : null;

        // Communication
        $commsRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("comms_rating_{$i}");
            if ($rating) {
                $commsRatings[] = $rating;
            }
        }
        $averages['comms_rating_score'] = count($commsRatings) > 0 ? array_sum($commsRatings) / count($commsRatings) : null;

        // Compliances
        $compRatings = [];
        for ($i = 1; $i <= 7; $i++) {
            $rating = $request->input("comp_rating_{$i}");
            if ($rating) {
                $compRatings[] = $rating;
            }
        }
        $averages['comp_rating_score'] = count($compRatings) > 0 ? array_sum($compRatings) / count($compRatings) : null;

        // Attendance
        $attendRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("attend_rating_{$i}");
            if ($rating) {
                $attendRatings[] = $rating;
            }
        }
        $averages['attend_rating_score'] = count($attendRatings) > 0 ? array_sum($attendRatings) / count($attendRatings) : null;

        // Problem Solving
        $psRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("ps_rating_{$i}");
            if ($rating) {
                $psRatings[] = $rating;
            }
        }
        $averages['ps_rating_score'] = count($psRatings) > 0 ? array_sum($psRatings) / count($psRatings) : null;

        // Innovation
        $innoRatings = [];
        for ($i = 1; $i <= 4; $i++) {
            $rating = $request->input("inno_rating_{$i}");
            if ($rating) {
                $innoRatings[] = $rating;
            }
        }
        $averages['inno_rating_score'] = count($innoRatings) > 0 ? array_sum($innoRatings) / count($innoRatings) : null;

        // Team Work
        $twRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("tw_rating_{$i}");
            if ($rating) {
                $twRatings[] = $rating;
            }
        }
        $averages['tw_rating_score'] = count($twRatings) > 0 ? array_sum($twRatings) / count($twRatings) : null;

        // People Management
        $pmRatings = [];
        for ($i = 1; $i <= 10; $i++) {
            $rating = $request->input("pm_rating_{$i}");
            if ($rating) {
                $pmRatings[] = $rating;
            }
        }
        $averages['pm_rating_score'] = count($pmRatings) > 0 ? array_sum($pmRatings) / count($pmRatings) : null;

        //Judgement
        $judgmentRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("judgment_rating_{$i}");
            if ($rating) {
                $judgmentRatings[] = $rating;
            }
        }
        $averages['judgment_rating_score'] = count($judgmentRatings) > 0 ? array_sum($judgmentRatings) / count($judgmentRatings) : null;

        // Leadership
        $leadershipRatings = [];
        for ($i = 1; $i <= 5; $i++) {
            $rating = $request->input("leadership_rating_{$i}");
            if ($rating) {
                $leadershipRatings[] = $rating;
            }
        }
        $averages['leadership_rating_score'] = count($leadershipRatings) > 0 ? array_sum($leadershipRatings) / count($leadershipRatings) : null;

        return $averages;
    }
}
