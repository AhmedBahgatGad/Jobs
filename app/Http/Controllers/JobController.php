<?php

namespace App\Http\Controllers;

use App\Models\Job;

use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function create(){
        return view('job_posts/create');
    }


    public function store(){


        $request = request();
        $validatedData = $request->validate([
            "job_title" => 'required|string|max:255',
            "date"=> 'required|date',
            "salary" => 'required|numeric',
            "location"=> 'required|string|max:255',
            "description"=> 'required|string',
            "emp_id" => 'required|numeric'
        ]);

        $job = new Job();
        $job->job_title = request()->job_title;
        $job->date = request()->date;
        $job->salary =  request()->salary;
        $job->location = request()->location;
        $job->description = request()->description;
        $job->emp_id = request()->emp_id;

        Job::create($request->all());

        return redirect()->route('job_posts.create')->with('success', 'Job created successfully');
    }

    

    public function index()
    {
        // Assuming jobs table has a 'user_id' field to track the creator
        $jobs = Job::all();
        return view('job_posts.index', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('job_posts.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
                $request->validate([
            'emp_id' => 'required|integer',
            'job_title' => 'required|string|max:255',
            'date' => 'required|date',
            'salary' => 'required|numeric',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // $job = Job::findOrFail($id);
        $job->update($request->all());

        return redirect()->route('job_posts.index')->with('success', 'Job post updated successfully.');
    }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('job_posts.index')->with('success', 'Job post deleted successfully.');
    }

}