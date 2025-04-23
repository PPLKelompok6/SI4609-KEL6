<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessment::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('assessment.index', compact('assessments'));
    }

    public function start()
    {
        $assessment = Assessment::create([
            'user_id' => auth()->id(),
            'status' => 'pending'
        ]);

        return view('assessment.form', compact('assessment'));
    }

    public function show(Assessment $assessment)
    {
        return view('assessment.form', compact('assessment'));
    }

    public function submit(Request $request, Assessment $assessment)
    {
        $score = 0;
        $results = [];
        
        // Process question 1 (max 35 points)
        if ($request->q1 === 'excellent') $score += 30;
        elseif ($request->q1 === 'good') $score += 25;
        elseif ($request->q1 === 'fair') $score += 15;
        $results['q1'] = $request->q1;
    
        // Process question 2 (max 30 points)
        if ($request->q2 === 'no') $score += 15;
        elseif ($request->q2 === 'yes') $score += 35;
        $results['q2'] = $request->q2;
    
        // Process question 3 (max 35 points)
        if ($request->q3 === 'daily') $score += 35;
        elseif ($request->q3 === 'weekly') $score += 25;
        elseif ($request->q3 === 'rarely') $score += 10;
        $results['q3'] = $request->q3;
    
        $assessment->update([
            'status' => 'completed',
            'score' => $score,
            'results' => $results
        ]);
    
        return redirect()->route('assessment.result', $assessment);
    }

    public function result(Assessment $assessment)
    {
        return view('assessment.result', compact('assessment'));
    }

    public function destroy(Assessment $assessment)
    {
        // Check if user owns this assessment
        if ($assessment->user_id !== auth()->id()) {
            return redirect()->back()
                ->with('error', 'You are not authorized to delete this assessment.');
        }
    
        try {
            // Delete the assessment
            $assessment->delete();
            
            // Redirect with success message
            return redirect()->route('dashboard')
                ->with('success', 'Assessment has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()
                ->with('error', 'Failed to delete assessment. Please try again.');
        }
    }
}
