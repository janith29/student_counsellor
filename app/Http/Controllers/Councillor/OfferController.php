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

class OfferController extends Controller
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
        return view('councillor.offer.welcome',compact('apply','inquiry','offer'));
    }
    public function store(Request $request,Apply $apply,Offer $offer)
    {
        $offers=DB::table('offer')->where('app_id', $request->get('applys-id'))->count();
        // return $offer;
        $applys=Apply::findOrFail( $request->get('applys-id'));

        if($offers>0)
        {
            return back()->with('deletemessage', 'Inquiry ID '.$request->get('inquiry-id').' early add offer letter!');
        }
        foreach($applys as $apply)
        {
            $applyinq_id=$applys->inq_id;
        }

        $inquiryid=$applyinq_id;
        $file=$request ->file('file-name');
        $type=$file->guessExtension();
        $name=$inquiryid."offer_doc.".$type;
        $file->move('document/'.$inquiryid.'inquiry',$name);
        $path=$inquiryid.'inquiry/';

        $inquiry=Inquiry::findOrFail( $request->get('applys-id'));

        $inquiry->submit_offer=1;
        $inquiry->save();


        $offer->inq_id = $inquiryid;
        $offer->app_id = $request->get('applys-id');
        $offer->offer_doc =$path.$name;
        $offer->save();

        return redirect('/councillor/offer')->with('message', 'Inquiry ID '.$request->get('inquiry-id').' offer letter add successfully!');
    }
    public function show( Apply $apply)
    {
        $inquiry = Inquiry::orderBy('id')->get();
        return view('councillor.apply.show',compact('apply','inquiry'));
    }
    public function update( Request $request,Offer $offer)
    {
        $offers=Offer::findOrFail( $request->offersidd);
        File::delete('document/'.$offers->offer_doc);
      
        $inquiryid=$request->intid;
        $file=$request ->file('file-name');
        $type=$file->guessExtension();
        $name=$inquiryid."offer_doc.".$type;
        $file->move('document/'.$inquiryid.'inquiry',$name);

        $path=$inquiryid.'inquiry/';
        $offers->offer_doc =$path.$name;
        $offers->save();
        
        return back()->with('editmessage', $request->std_name."'s ".$request->titles." update successfully!");
    }
   


}
