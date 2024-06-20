<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppraisalRating extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'appraisal_ratings';

	protected $fillable = [
		'id', 'appraisal_id', 'jk_rating_1', 'jk_rating_2', 'jk_rating_3', 'jk_rating_4', 'jk_rating_5', 'jk_rating_score', 'jk_rating_remarks', 'quality_rating_1', 'quality_rating_2', 'quality_rating_3', 'quality_rating_4', 'quality_rating_5', 'quality_rating_score', 'quality_rating_remarks', 'quantity_rating_1', 'quantity_rating_2', 'quantity_rating_3', 'quantity_rating_4', 'quantity_rating_5', 'quantity_rating_score', 'quantity_rating_remarks', 'initiative_rating_1', 'initiative_rating_2', 'initiative_rating_3', 'initiative_rating_4', 'initiative_rating_5', 'initiative_rating_score', 'initiative_rating_remarks', 'coop_rating_1', 'coop_rating_2', 'coop_rating_3', 'coop_rating_4', 'coop_rating_5', 'coop_rating_score', 'coop_rating_remarks', 'comms_rating_1', 'comms_rating_2', 'comms_rating_3', 'comms_rating_4', 'comms_rating_5', 'comms_rating_score', 'comms_rating_remarks', 'comp_rating_1', 'comp_rating_2', 'comp_rating_3', 'comp_rating_4', 'comp_rating_5', 'comp_rating_6', 'comp_rating_7', 'comp_rating_score', 'comp_rating_remarks', 'attend_rating_1', 'attend_rating_2', 'attend_rating_3', 'attend_rating_4', 'attend_rating_5', 'attend_rating_score', 'attend_rating_remarks', 'ps_rating_1', 'ps_rating_2', 'ps_rating_3', 'ps_rating_4', 'ps_rating_5', 'ps_rating_score', 'ps_rating_remarks', 'inno_rating_1', 'inno_rating_2', 'inno_rating_3', 'inno_rating_4', 'inno_rating_score', 'inno_rating_remarks', 'tw_rating_1', 'tw_rating_2', 'tw_rating_3', 'tw_rating_4', 'tw_rating_5', 'tw_rating_score', 'tw_rating_remarks', 'pm_rating_1', 'pm_rating_2', 'pm_rating_3', 'pm_rating_4', 'pm_rating_5', 'pm_rating_score', 'pm_rating_remarks', 'judgment_rating_1', 'judgment_rating_2', 'judgment_rating_3', 'judgment_rating_4', 'judgment_rating_5', 'judgment_rating_score', 'judgment_rating_remarks', 'management_rating_1', 'management_rating_2', 'management_rating_3', 'management_rating_4', 'management_rating_5', 'management_rating_6', 'management_rating_7', 'management_rating_score', 'management_rating_remarks', 'late_rating_1', 'late_rating_2', 'late_rating_3', 'late_rating_4', 'late_rating_5', 'late_rating_6', 'da_records_late_1', 'da_records_late_2', 'da_records_late_3', 'da_records_late_4', 'da_records_late_5', 'da_records_late_6', 'late_rating_score', 'ut_rating_1', 'ut_rating_2', 'ut_rating_3', 'ut_rating_4', 'ut_rating_5', 'ut_rating_6', 'da_records_ut_1', 'da_records_ut_2', 'da_records_ut_3', 'da_records_ut_4', 'da_records_ut_5', 'da_records_ut_6', 'ut_rating_score', 'ul_rating_1', 'ul_rating_2', 'ul_rating_3', 'ul_rating_4', 'ul_rating_5', 'ul_rating_6', 'da_records_ul_1', 'da_records_ul_2', 'da_records_ul_3', 'da_records_ul_4', 'da_records_ul_5', 'da_records_ul_6', 'ul_rating_score', 'attend_b_rating_score', 'final_score', 'created_at', 'updated_at', 'deleted_at'
	];
}
