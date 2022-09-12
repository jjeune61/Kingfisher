<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class AuditController extends Controller
{
    public function index(){
        $audits = article::find(1)->audits;
        // $audits = Article::with('Auditable')->get();
        return view('admin.audit.audits', compact('audits'));
    }
}
