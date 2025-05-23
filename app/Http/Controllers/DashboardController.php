<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\Faq;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $newsCount = News::count();
        $faqCount = Faq::count();

        return view('dashboard', compact('user', 'newsCount', 'faqCount'));
    }
}
