<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilityFunction extends Model
{
    public static function sanitize_filename($value) {
        $s = trim($value);
        if(strlen($s) == 0) return $s;
        $s = str_ireplace(' ', '_', $s);
        $s = preg_replace('/[^a-zA-Z0-9\_]/', '_', $s);
        return $s;
    }
}