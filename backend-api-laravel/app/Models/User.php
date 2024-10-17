<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $guarded=[];


    //defining relationship 
    public function getProjects(){
        return $this->hasMany(Project::class);
    }
}

