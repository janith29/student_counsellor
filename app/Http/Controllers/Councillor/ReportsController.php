<?php

namespace App\Http\Controllers\Councillor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notifications\RepliedToTread;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\Apply;
use App\Inquiry;
use App\Offer;
use Hash;
use Illuminate\Support\Facades\File; 

use Carbon\Carbon;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('councillor', ['except' => 'logout']);
    }

    public function index()
    {
        $apply = Apply::orderBy('id')->get();
        $inquiry = Inquiry::orderBy('id')->get();
        $offer = Offer::orderBy('id')->get();

        //Get unique date
        $dates = DB::table('inquiry')->distinct('start_date')->select('start_date')->orderBy('start_date','ASC')->get();
        $dateslast = DB::table('inquiry')->distinct('start_date')->select('start_date')->orderBy('start_date','DESC')->first();
        $datesfist = DB::table('inquiry')->distinct('start_date')->select('start_date')->orderBy('start_date','ASC')->first();
        $dateslast= date('M Y',strtotime('+31 days',strtotime($dateslast->start_date)));
        $datesfist= date('M Y',strtotime('-29 days',strtotime($datesfist->start_date)));

        //Get unique age
        $age = DB::table('inquiry')->distinct('age')->select('age')->orderBy('age','ASC')->get();
        $agelast = DB::table('inquiry')->distinct('age')->select('age')->orderBy('age','DESC')->first();
        $agefist = DB::table('inquiry')->distinct('age')->select('age')->orderBy('age','ASC')->first();
        $agelast= ($agelast->age)+1;
        $agefist= ($agefist->age)-1;

        //Get unique course
        $course = DB::table('inquiry')->distinct('course')->select('course')->orderBy('id','ASC')->get();

        //Get unique university
        $university = DB::table('inquiry')->distinct('university')->select('university')->orderBy('id','ASC')->get();

        // SELECT DISTINCT ProductID FROM OrderDetails;
        return view('councillor.reports.welcome',compact('apply','inquiry','offer','dates','dateslast','age','agelast','agefist','datesfist','course','university'));
    }

    public function  age (Request $request)
    {
         $inquiry= Inquiry::orderBy('id')->whereBetween('age', [$request->first_age, $request->last_age])->get();
         return view('councillor.reports.age',compact('inquiry'));

    }
    public function dates(Request $request)
    {
         $inquiry= Inquiry::orderBy('id')->whereBetween('start_date', [$request->first_month, $request->last_month])->get();
         return view('councillor.reports.date',compact('inquiry'));

    }
    public function university(Request $request)
    {
        if($request->university=='all')
        {
            $inquiry = Inquiry::orderBy('id')->get();
        }
        else{
            $inquiry= Inquiry::orderBy('id')->where('university',$request->university)->get();

        }

         return view('councillor.reports.university',compact('inquiry'));

    }
    public function course(Request $request)
    {
        if($request->course=='all')
        {
            $inquiry = Inquiry::orderBy('id')->get();
        }
        else{
            $inquiry= Inquiry::orderBy('id')->where('course',$request->course)->get();

        }

         return view('councillor.reports.course',compact('inquiry'));

    }
    public function apply(Request $request)
    {
        if($request->doc=='all')
        {
            $inquiry = Inquiry::orderBy('id')->get();
        }
        else if($request->doc=='not'){
            $inquiry= Inquiry::orderBy('id')->where('submit_document',0)->get();

        }
        else{
            $inquiry= Inquiry::orderBy('id')->where('submit_document',1)->get();
        }

         return view('councillor.reports.apply',compact('inquiry'));

    }
    public function offer(Request $request)
    {
        if($request->doc=='all')
        {
            $inquiry = Inquiry::orderBy('id')->get();
        }
        else if($request->doc=='not'){
            $inquiry= Inquiry::orderBy('id')->where('submit_offer',0)->get();
        }
        else{
            $inquiry= Inquiry::orderBy('id')->where('submit_offer',1)->get();
        }
         return view('councillor.reports.apply',compact('inquiry'));

    }
    public function summary(Request $request)
    {
        if($request->doc=='all')
        {
            $inquiry = Inquiry::orderBy('id')->get();
        }
        else if($request->doc=='not'){
            $inquiry= Inquiry::orderBy('id')->where('submit_offer',0)->get();
        }
        else{
            $inquiry= Inquiry::orderBy('id')->where('submit_offer',1)->get();
        }
         return view('councillor.reports.summary',compact('inquiry'));

    }
    
}
