<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobTask extends Model
{
    protected $fillable = ['freelance_job_id', 'task', 'is_done'];

    public function job()
    {
        return $this->belongsTo(FreelanceJob::class, 'freelance_job_id');
    }
}
