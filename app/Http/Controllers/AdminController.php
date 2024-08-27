<?php

// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jobs = Job::all();
        return view('admin.dashboard', compact('jobs'));
    }

    public function acceptJob(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Job accepted and deleted successfully.');
    }

    public function rejectJob(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Job rejected and deleted successfully.');
    }
}

