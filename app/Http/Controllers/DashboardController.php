<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latestAssessment = Assessment::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->latest()
            ->first();

        $totalAssessments = Assessment::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->count();

        $recentAssessments = Assessment::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->latest()
            ->paginate(10); // Changed from get() to paginate()

        return view('dashboard.index', compact('latestAssessment', 'totalAssessments', 'recentAssessments'));
    }
}