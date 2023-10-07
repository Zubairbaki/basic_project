<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\footer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class footerController extends Controller
{
    public function FooterSetup(){
        $footer = footer::find(1);

        return view('admin.footer.footer_view',compact('footer'));
    }

    public function UpdateFooter(Request $req){

        $update_id= $req->id;

        footer::findOrFail($update_id)->update([
            'number' => $req->number,
            'short_descreption' => $req->short_descreption,
            'address' => $req->address,
            'email' => $req->email,
            'facebook' => $req->facebook,
            'twitter' => $req->twitter,
            'copyright' => $req->copyright,

            'created_at'=>Carbon::now()
        ]);

         $notification = [
             'message' => 'Update successfully uploaded',
             'alert-type' => 'success'
         ];

         return redirect()->route('footer.setup')->with($notification);
    }
}
