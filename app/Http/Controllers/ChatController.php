<?php

namespace App\Http\Controllers;

class ChatController extends Controller
{
    /**
     * Default method call
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        return view('chat');
    }
}
