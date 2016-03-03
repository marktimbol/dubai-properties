<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function rooms()
    {
    	$user = Auth::user();
    	$rooms = Auth::user()->rooms;
    
    	return view('public.users.rooms.index', compact('user', 'rooms'));
    }
}
