<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Protfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class ProtfolioController extends Controller
{
    public function AllPortfolio(){

        $portfolio= Protfolio::latest()->get();

        return view('admin.portfolio.portfolio_view',compact('portfolio'));
    }

    public function AddPortfolio(){

        return view('admin.portfolio.portfolio_add');



    }

    public function StorePortfolio(Request $req){

        $req-> validate([
            'protfolio_name'=> 'required',
            'protfolio_title'=> 'required',
            'protfolio_image'=> 'required',
        ],[
            'protfolio_name.required'=>'PortFolio Name is requrired',
            'protfolio_title.required'=>'PortFolio title is requrired',
        ]);

        $img = $req->file('protfolio_image');
        $extension = $img->getClientOriginalExtension();
        $name_gen = hexdec(uniqid()) . '.' . $extension;

        Image::make($img)
        ->fit(1020, 519)
        ->save('upload/protfolio_image/' . $name_gen);

        $save_url = 'upload/protfolio_image/' . $name_gen;

        Protfolio::insert([
            'protfolio_name' => $req->protfolio_name,
            'protfolio_title' => $req->protfolio_title,
            'protfolio_description' => $req->protfolio_description,
            'protfolio_image' => $save_url,
            'created_at'=>Carbon::now()
        ]);

        $notification = [
            'message' => '  Portfolio Sucsefully Uploaded',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.portfolio')->with($notification);

    }
    public function EditPortfolio($id){
        $portfolio= Protfolio::findOrFail($id);

        return view('admin.portfolio.portfolio_edit',compact('portfolio'));

}//end method

public function UpdatePortfolio(Request $req){
       $prot_id = $req->id;

    if ($req->hasFile('protfolio_image')) {
        $img = $req->file('protfolio_image');
        $extension = $img->getClientOriginalExtension();
        $name_gen = hexdec(uniqid()) . '.' . $extension;

        Image::make($img)
        ->fit(1020, 519)
        ->save('upload/protfolio_image/' . $name_gen);

        $save_url = 'upload/protfolio_image/' . $name_gen;

        Protfolio::findOrFail($prot_id)->update([
            'protfolio_name' => $req->protfolio_name,
            'protfolio_title' => $req->protfolio_title,
            'protfolio_description' => $req->protfolio_description,
            'protfolio_image' => $save_url,
        ]);

        $notification = [
            'message' => 'Update Image successfully uploaded',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.portfolio')->with($notification);
    } else {
        Protfolio::findOrFail($prot_id)->update([
            'protfolio_name' => $req->protfolio_name,
            'protfolio_title' => $req->protfolio_title,
            'protfolio_description' => $req->protfolio_description,

        ]);

        $notification = [
            'message' => 'Update without Image successfully uploaded',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
public function DeletePortfolio($id){

    $delprot=  Protfolio::findOrFail($id);

    $img= $delprot->protfolio_image;
    unlink($img);

    Protfolio::findOrFail($id)->delete();

    $notification = [
        'message' => ' IMAGE successfully DELETE',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}//end method

public function Portfoliodetails($id){

    $PortDetails=  Protfolio::findOrFail($id);

    return view('frontend.portfolio_details',compact('PortDetails'));

}

public function HomePortfolio(){

    $portfolio= Protfolio::latest()->get();

    return view('frontend.portfolio',compact('portfolio'));
}
}
