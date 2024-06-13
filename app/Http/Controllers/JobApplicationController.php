<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Policies\JobPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Career $job)
    {
        // $this->authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Career $job, Request $request)
    {
        // $this->authorize('apply', $job);
        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:100000',
            'cv' => 'required|file|mimes:png,jpg,jpeg,pdf|max:2048',

        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path,
        ]);

        return redirect()->route('jobs.show', $job)->with('success', 'Job application submitted successfully');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
