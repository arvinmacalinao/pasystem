<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function form1()
    {
        
        return view('pdf.form1');
    }
}
