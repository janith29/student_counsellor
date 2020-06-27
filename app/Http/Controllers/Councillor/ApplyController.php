<?php

namespace App\Http\Controllers\Councillor;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notifications\RepliedToTread;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use App\Apply;
use App\Inquiry;
use Hash;
use Illuminate\Support\Facades\File; 

use Carbon\Carbon;

class ApplyController extends Controller
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
        return view('councillor.apply.welcome',compact('apply','inquiry'));
    }
    public function store(Request $request,Apply $apply,Inquiry $inquiry)
    {
        $inquirye=DB::table('apply')->where('inq_id', $request->get('inquiry-id'))->count();
        if($inquirye>0)
        {
            return back()->with('deletemessage', 'Inquiry ID '.$request->get('inquiry-id').' early add apply documents!');
        }

        $inquiryid=$request->get('inquiry-id');

        //HED
        $filehed=$request ->file('apply-hed');
        $typehed=$filehed->guessExtension();
        $namehed=$inquiryid."heddoc.".$typehed;
        $filehed->move('document/'.$inquiryid.'inquiry',$namehed);
        //IELTS
        $fileIELTS=$request ->file('apply-IELTS');
        $typeIELTS=$fileIELTS->guessExtension();
        $nameIELTS=$inquiryid."IELTSdoc.".$typeIELTS;
        $fileIELTS->move('document/'.$inquiryid.'inquiry',$nameIELTS);
        //cl
        $filecl=$request ->file('apply-cl');
        $typecl=$filecl->guessExtension();
        $namecl=$inquiryid."cldoc.".$typecl;
        $filecl->move('document/'.$inquiryid.'inquiry',$namecl);
        //rl
        $filerl=$request ->file('apply-rl');
        $typerl=$filerl->guessExtension();
        $namerl=$inquiryid."rldoc.".$typerl;
        $filerl->move('document/'.$inquiryid.'inquiry',$namerl);
        //CV
        $filecv=$request ->file('apply-cv');
        $typecv=$filecv->guessExtension();
        $namecv=$inquiryid."cvdoc.".$typecv;
        $filecv->move('document/'.$inquiryid.'inquiry',$namecv);

        $inquiry=Inquiry::findOrFail( $inquiryid);

        $inquiry->submit_document = 1;
        $inquiry->save();

        $path=$inquiryid.'inquiry/';
        
        $apply->inq_id = $inquiryid;
        $apply->hd_doc = $path.$namehed;
        $apply->ielts_doc =$path.$nameIELTS;
        $apply->cl_doc =$path.$namecl;
        $apply->rl_doc = $path.$namerl;
        $apply->cv_doc = $path.$namecv;
        $apply->save();

        return redirect('/councillor/apply')->with('message', 'Inquiry ID '.$request->get('inquiry-id').' apply documents add successfully!');
    }
    public function show( Apply $apply)
    {
        $inquiry = Inquiry::orderBy('id')->get();
        return view('councillor.apply.show',compact('apply','inquiry'));
    }
    public function update( Request $request,Apply $apply)
    {

        $applyes=Apply::findOrFail( $request->apid);
        File::delete('document/'.$applyes->hd_doc);
      
        $inquiryid=$request->intid;
        $file=$request ->file('file-name');
        $type=$file->guessExtension();
        $name=$inquiryid.$request ->type.".".$type;
        $file->move('document/'.$inquiryid.'inquiry',$name);

        $path=$inquiryid.'inquiry/';
        if($request->type=="hd_doc")
        {
            $applyes->hd_doc =$path.$name;
            $applyes->save();
        }
        if($request->type=="ielts_doc")
        {
            $applyes->ielts_doc =$path.$name;
            $applyes->save();
        }
        if($request->type=="cl_doc")
        {
            $applyes->cl_doc =$path.$name;
            $applyes->save();
        }
        if($request->type=="rl_doc")
        {
            $applyes->rl_doc =$path.$name;
            $applyes->save();
        }
        if($request->type=="cv_doc")
        {
            $applyes->cv_doc =$path.$name;
            $applyes->save();
        }

        return back()->with('editmessage', $request->std_name."'s ".$request->titles." apply documents update successfully!");
    }
   


}
