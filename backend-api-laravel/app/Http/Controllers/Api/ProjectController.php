<?php

namespace App\Http\Controllers\Api;


use App\Models\User;

use App\Http\Controllers\Controller;


class ProjectController extends Controller
{
    public function show($user_id) {
        $user = User::find($user_id); 

        if($user){
            return response()->json($user->getProjects);
    }
    else{
        return response()->json(['message' => 'User not found'], 404);
    }
    }
}
