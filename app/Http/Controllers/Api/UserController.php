<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display listing of resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Get the user that is logged in
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthUser()
    {
        return response()->json(auth()->user());
    }
}
