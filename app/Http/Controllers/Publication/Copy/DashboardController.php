<?php

namespace App\Http\Controllers\Publication\Copy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('publication.copy.dashboard');
        }
}
