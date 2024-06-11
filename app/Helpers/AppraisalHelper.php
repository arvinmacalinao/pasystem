<?php

namespace App\Helpers;

class AppraisalHelper
{
    public static function computeAverageRatings($request, $categories)
    {
        $averages = [];
        
        foreach ($categories as $category) {
            $ratings = [];
            for ($i = 1; $i <= 5; $i++) {
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
}
