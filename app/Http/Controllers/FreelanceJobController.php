<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreelanceJob;
use App\Models\JobTask;

class FreelanceJobController extends Controller
{
    public function index()
    {
        $jobs = FreelanceJob::with('tasks')->orderBy('deadline')->get();
        return view('jobs.index', compact('jobs'));
    }

    public function store(Request $req)
    {
        $job = FreelanceJob::create($req->only('job_name', 'client_name', 'deadline', 'status'));

        if ($req->tasks) {
            foreach ($req->tasks as $task) {
                $job->tasks()->create(['task' => $task]);
            }
        }

        return back();
    }

    public function updateStatus(FreelanceJob $job, Request $req)
    {
        $job->update(['status' => $req->status]);
        return back();
    }

    public function toggleTask(JobTask $task)
    {
        $task->update(['is_done' => !$task->is_done]);
        return back();
    }

    public function destroy(FreelanceJob $job)
    {
        $job->delete();
        return back();
    }
}
