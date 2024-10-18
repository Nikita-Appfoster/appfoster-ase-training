<?php

namespace App\Http\Controllers;

use App\Jobs\SendTestMail;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function sendEmails()
    {
        $users = User::all();


        foreach ($users as $user) {

            SendTestMail::dispatch($user);
        }
    
        return "Email jobs have been dispatched to all users!";
}}
