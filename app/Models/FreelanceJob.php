<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreelanceJob extends Model
{
    protected $fillable = ['job_name', 'client_name', 'deadline', 'status'];

    public function tasks()
    {
        return $this->hasMany(JobTask::class);
    }
}
