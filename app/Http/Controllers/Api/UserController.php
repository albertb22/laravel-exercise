<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
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

    /**
     * Get all messages for a channel
     *
     * @param User $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMessages(User $user)
    {
        $messages = Message::where(function($query) use ($user) {
            $query->where('send_by', auth()->user()->id)->where('messageable_id', $user->id)
                  ->where('messageable_type', 'like', '%User');
        })->orWhere(function($query) use ($user) {
            $query->where('send_by', $user->id)->where('messageable_id', auth()->user()->id)
                  ->where('messageable_type', 'like', '%User');
        })->with([
            'sendBy' => function ($query) {
                $query->select(['id', 'name']);
            }
        ])->orderBy('created_at')->get();

        return response()->json($messages);
    }
}
