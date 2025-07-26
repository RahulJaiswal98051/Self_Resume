<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
     protected $primaryKey = 'education_id';
    protected $fillable = ['user_id', 'institute', 'degree', 'start_date', 'end_date', 'description'];
    public $timestamps = false;
}
