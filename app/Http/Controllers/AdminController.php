<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = [
            'message' => 'Admin succusfully Logout',
            'alert-type'=>'success'
        ];

          return redirect('/login')->with($notification);
    }
    //end mathod
    public function Profile(){

        $adminData= Auth::user();
        return view('admin.admin_profile_view' ,compact('adminData'));

    }
    //end mathod
    public function dashboard(){

        $adminData= Auth::user();
        return view('admin.index' ,compact('adminData'));

    }//end mathod

    public function Edit(){

        $editData= Auth::user();
        return view('admin.admin_profile_edit' ,compact('editData'));

    }//end mathod

    public function StoreProfile(Request $req){
        $storeData= Auth::user();
        $storeData->name=$req->name;
        $storeData->email=$req->email;
        $storeData->username=$req->username;
        

        if ($req->File('profile_image')) {
            $file=$req->File('profile_image');

            $filename=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $storeData['profile_image']=$filename;

            # code...
        }
        $storeData->save();
        $notification = [
            'message' => 'Admin profile successfully uploaded',
            'alert-type'=>'success'
        ];
        [
            'message' => 'Admin profile is not  uploaded',
            'alert-type'=>'error'
        ];

        return redirect()->route('admin.profile')->with($notification);
    }

    public function Change(){
        return view('admin.change_password');
    }

    public function Update(Request $request){
        $validateData=$request ->validate([
          'oldpassword'=> 'required',
          'newpassword'=> 'required',
          'comfirmpassword'=> 'required|same:newpassword',

        ]);
        $hasPassowrd= Auth::user()->password;
        if (Hash::check($request->oldpassword,$hasPassowrd)) {
            $users =User::find(Auth::id());
            $users->password=bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password succusfully Updated');
            return redirect()->back();

            # code...
        }else {
            session()->flash('message','Old password is not match ');
            return redirect()->back();
        }
    }

}


