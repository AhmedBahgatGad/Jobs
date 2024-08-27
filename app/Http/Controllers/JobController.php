<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Show the form for creating a new job.
     *
     * @return \Illuminate\View\View
     */
  

    /**
     * Store a newly created job in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
   
    /**
     * Search for jobs based on the search query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('search');
        $jobs = Job::where('job_title', 'like', "%$query%")
                    ->orWhere('description', 'like', "%$query%")
                    ->paginate(10);

        return view('jobs.search', ['jobs' => $jobs]);
    }
    public function showApplyForm($id)
{
    $job = Job::findOrFail($id);
    return view('jobs.apply', compact('job'));
}
public function submitApplication($id)
{

    return redirect('/')->with('success', 'Application submitted successfully!');
}

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

    public function update($id){

        // request()->validate([
        //     'emp_id' => 'required|integer',
        //     'job_title' => 'required|string|max:255',
        //     'date' => 'required|date',
        //     'salary' => 'required|numeric',
        //     'location' => 'required|string|max:255',
        //     'description' => 'required|string',
        // ]);
        
        $job = Job::findOrFail($id);
        $job->emp_id = request()->emp_id;
        $job->job_title = request()->job_title;
        $job->date = request()->date;
        $job->salary = request()->salary;
        $job->location = request()->location;
        $job->description = request()->description;
        $job->save();

        return redirect()->route('job_posts.index')->with('success','Job Updated');
    }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('job_posts.index')->with('success', 'Job post deleted successfully.');
    }
}
