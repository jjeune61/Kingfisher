<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class AuditController extends Controller
{
    public function index(){
        $audits = Category::first()->audits();
        return view('admin.audit.audit', compact('audits'));
    }
}
