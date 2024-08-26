<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\FlareClient\Api;

class ApplicationController extends Controller
{
    // Show the application form
    public function showApplyForm(Job $job)
    {
        return view('applications.apply', compact('job'));
    }

    // Submit the application
    public function submitApplication(Request $request, Job $job)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        $application = new Application([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'resume' => $request->file('resume')->store('resumes'),
            'cover_letter' => $request->input('cover_letter'),
        ]);

        $application->save();

        return redirect()->route('applications.manage')->with('success', 'Application submitted successfully');
    }

    // Manage applications (show list of user's applications)
    public function manageApplications()
    {
        // $applications = Application::where('user_id', Auth::id())->with('job')->get();
        $applications = Application::all();
        return view('manage', compact('applications'));
    }
}