<?php

namespace App\Http\Controllers\Councillor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notifications\RepliedToTread;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\Inquiry;
use Hash;


use Carbon\Carbon;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('councillor', ['except' => 'logout']);
    }

    public function index()
    {
        $inquiry = Inquiry::orderBy('id')->get();
        return view('councillor.inquiry.welcome',compact('inquiry'));
    }
    public function store(Request $request,Inquiry $inquiry)
    {

        $date_str=date("Y-m-d",strtotime($request->get('inquiry-start_date')));
        
        $inquiry->std_name = $request->get('inquiry-std_name');
        $inquiry->email = $request->get('inquiry-std_email');
        $inquiry->address = $request->get('inquiry-address');
        $inquiry->age = $request->get('inquiry-std_age');
        $inquiry->phone_num = $request->get('inquiry-std_tel');
        $inquiry->course = $request->get('inquiry-course');
        $inquiry->university = $request->get('inquiry-university');
        $inquiry->start_date =$date_str;
        $inquiry->submit_document = 0;
        $inquiry->submit_offer = 0;
        $inquiry->save();

        
        auth()->user(0)->notify(new RepliedToTread());
        return redirect('/councillor/inquiry')->with('message', 'New inquiry add successfully!');
    }
    public function show( Inquiry $inquiry)
    {
        
        return view('councillor.inquiry.show',['inquiry' => $inquiry]);
    }
    public function update( Request $request,Inquiry $inquiry)
    {
        $date_str=date("Y-m-d",strtotime($request->get('inquiry-start_date')));
        $inquiry=Inquiry::findOrFail( $request->inquiryid);

        if(($inquiry->std_name == $request->get('inquiry-std_name')) &&($inquiry->email == $request->get('inquiry-std_email'))&&($inquiry->address == $request->get('inquiry-address'))&&($inquiry->phone_num == $request->get('inquiry-std_tel'))&&($inquiry->course == $request->get('inquiry-course'))&&($inquiry->university == $request->get('inquiry-university'))&&($inquiry->start_date ==$date_str)){

            return back()->with('deletemessage', 'Inquiry ID '.$request->inquiryid.' nothing update!');
        }

        $inquiry->std_name = $request->get('inquiry-std_name');
        $inquiry->email = $request->get('inquiry-std_email');
        $inquiry->address = $request->get('inquiry-address');
        $inquiry->phone_num = $request->get('inquiry-std_tel');
        $inquiry->course = $request->get('inquiry-course');
        $inquiry->university = $request->get('inquiry-university');
        $inquiry->start_date =$date_str;
        $inquiry->save();
        return back()->with('editmessage', 'Inquiry ID '.$request->inquiryid.' edit successfully!');
    }
    public function delete( Request $request,User $user)
    {
        $user=User::findOrFail( $request->userid);
        $user->delete();
        return redirect('/councillor/inquiry');
    }


}
