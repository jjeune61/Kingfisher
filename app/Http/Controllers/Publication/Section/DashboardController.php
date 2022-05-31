<?php

namespace App\Http\Controllers\Publication\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('publication.section.dashboard');
        }
}
