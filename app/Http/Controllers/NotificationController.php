<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = User::find(Auth::user()->id)->notifications;

        return view('notification.index',compact('notifications'));
    }
}
