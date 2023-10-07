<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contanct;
use Illuminate\Http\Request;

class ContactController extends Controller
{
         public function Contact(){

            return view('frontend.contact');
         }

         public function StoreContact(Request $req){

            Contanct::insert( [

                'name'=>$req->name,
                'email'=>$req->email,
                'subject'=>$req->subject,
                'phone'=>$req->phone,
                'message'=>$req->message,


            ]);
            return redirect()->back();
         }

         public function ContactInfo(){

            $info= Contanct::latest()->get();

            return view('admin.contact_info',compact('info'));
         }
}
