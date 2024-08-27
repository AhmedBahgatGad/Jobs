<?php

namespace App\Http\Controllers;



    //

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                return redirect('/')->with('error', 'Access denied');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $jobs = Job::all();
        $applications = Application::all();
        return view('admin.dashboard', compact('jobs', 'applications'));
    }

    public function editJob($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.edit-job', compact('job'));
    }

    public function updateJob(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        $job->update($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Job updated successfully');
    }

    public function deleteJob($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Job deleted successfully');
    }

    public function acceptApplication($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'accepted';
        $application->save();
        return redirect()->route('admin.dashboard')->with('success', 'Application accepted');
    }

    public function rejectApplication($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();
        return redirect()->route('admin.dashboard')->with('success', 'Application rejected');
    }
}


