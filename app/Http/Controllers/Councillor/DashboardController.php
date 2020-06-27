<?php

namespace App\Http\Controllers\Councillor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notifications\RepliedToTread;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\User;


use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('councillor', ['except' => 'logout']);
    }

    public function index()
    {

        $counts = [
        'user' => \DB::table('users')->count(),
        'inquiry' => \DB::table('inquiry')->count(),
    ];
        return view('councillor.welcome',['counts' => $counts]);
    }
    public function markread()
    {
        auth()->user()->unreadnotifications->markAsRead();
        return back();
    }
    
}
