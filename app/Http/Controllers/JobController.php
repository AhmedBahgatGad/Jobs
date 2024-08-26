<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Show the form for searching jobs and return results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = Job::query();

        if ($request->has('job_title') && $request->input('job_title') != '') {
            $query->where('job_title', 'like', '%' . $request->input('job_title') . '%');
        }

        if ($request->has('cat_id') && $request->input('cat_id') != '') {
            $query->where('cat_id', $request->input('cat_id'));
        }

        $jobs = $query->get();

        return view('jobs.search', compact('jobs'));
    }
}
