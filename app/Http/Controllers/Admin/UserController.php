<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notifications\RepliedToTread;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\User;
use Hash;


use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator', ['except' => 'logout']);
    }

    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('admin.user.welcome',compact('users'));
    }
    public function store(Request $request,User $user)
    {
        $Inuser=DB::table('users')->where('email', $request->get('user-email'))->count();

        if($Inuser>0)
        {
            return redirect('/admin/user')->with('deletemessage','This email ( '.$request->get('user-email').' ) is aearly used!');
        }
        
        $lastid=0;
        $users=DB::select('select * from users ORDER BY id DESC LIMIT 1');

        
        foreach($users as $userss)
        {
            $lastid=$userss->id;
        }
        $lastid=$lastid+1;
        $file=$request ->file('user-image');
        
        $type=$file->guessExtension();
        $name=$lastid."usertpic.".$type;
        $file->move('image/user',$name);

        $user->name = $request->get('user-name');
        $user->email = $request->get('user-email');
        $user->password = Hash::make($request->get('user-pass'));
        $user->userrole = $request->get('user-type');
        $user->image = $name;
        $user->created_at =Carbon::now();
        $user->save();


        return redirect('/admin/user');
    }
    public function show( User $user)
    {
        
        return view('admin.user.show',['user' => $user]);
    }
    public function update( Request $request,User $user)
    {
        // return  $request;
        $user=User::findOrFail( $request->userid);
        $user->name = $request->get('user-name');
        $user->email = $request->get('user-email');
        $user->save();
        return redirect('/admin/user');
    }
    public function delete( Request $request,User $user)
    {
        $user=User::findOrFail( $request->userid);
        $user->delete();
        return redirect('/admin/user');
    }


}
