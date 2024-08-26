<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use App\Models\Candidate;

class DashboardController extends Controller
{
    public function index()
    {
        $jobsCount = Job::count();
        $employersCount = Employer::count();
        $candidatesCount = Candidate::count();

        return view('dashboard', compact('jobsCount', 'employersCount', 'candidatesCount'));
    }
}

