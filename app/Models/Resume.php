<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resume extends Model
{
    protected $table = 'resumes'; // Confirm this matches your actual table
    protected $primaryKey = 'resume_id';

    protected $fillable = [
        'user_id',
        'title',
        'templet_id',
        'status',
        'resumecol'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
