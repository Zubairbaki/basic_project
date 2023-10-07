<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function AboutPage(){
        $aboutpage= About::find(1);
        return view('admin.about_page.about_page_all',compact('aboutpage'));
      }//end method
      public function UpdateAbout(Request $req){
        $about_id = $req->id;

        if ($req->hasFile('about_image')) {
            $img = $req->file('about_image');
            $extension = $img->getClientOriginalExtension();
            $name_gen = hexdec(uniqid()) . '.' . $extension;

            Image::make($img)
            ->fit(523, 605)
            ->save('upload/about_images/' . $name_gen);

            $save_url = 'upload/about_images/' . $name_gen;

            About::findOrFail($about_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'short_description' => $req->short_description,
                'long_description' => $req->long_description,

                'about_image' => $save_url,
            ]);

            $notification = [
                'message' => 'About Page Update  successfully uploaded',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'short_description' => $req->short_description,
                'long_description' => $req->long_description,

            ]);

            $notification = [
                'message' => 'About Page is not Update ',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }//end method
    public function HomeAbout(){

        $aboutpage= About::find(1);
        return view('frontend.about_page_all.home_about',compact('aboutpage'));
    }

    public function AboutMultiImage(){

        return view('admin.about_page.multi_images');
    }

    public function StoreMultiImage(Request $request){


        // dd($request->file('multi_image'));
        $image= $request-> file('multi_image');

        foreach ($image as $multi_image) {

            $extension = $multi_image->getClientOriginalExtension();
            $name_gen = hexdec(uniqid()) . '.' . $extension;

            Image::make($multi_image)
            ->fit(220, 220)
            ->save('upload/about_multi_images/' . $name_gen);

            $save_url = 'upload/about_multi_images/' . $name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }

            $notification = [
                'message' => 'Multipele Images successfully uploaded',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);


    }

    public function AllMultiImage(){
        $allMultImage=MultiImage::all();
        return view('admin.about_page.all_multi_images',compact('allMultImage'));
    }

    public function EditMultiImages($id){

        $MultImage=MultiImage::findOrFail($id);

        return view('admin.about_page.edit_multi_images',compact('MultImage'));


    }//End Method

    public function UpdateMultiImages(Request $req){
        $multi_id = $req->id;

        if ($req->hasFile('multi_image')) {
            $img = $req->file('multi_image');
            $extension = $img->getClientOriginalExtension();
            $name_gen = hexdec(uniqid()) . '.' . $extension;

            Image::make($img)
            ->fit(220, 220)
            ->save('upload/about_multi_images/' . $name_gen);

            $save_url = 'upload/about_multi_images/' . $name_gen;

            MultiImage::findOrFail($multi_id)->update([


                'multi_image' => $save_url,
            ]);

            $notification = [
                'message' => 'Multi IMAGE successfully uploaded',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.multi.image')->with($notification);
}
    }

    public function DeletMultiImages($id){

        $multi=  MultiImage::findOrFail($id);

        $img= $multi->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = [
            'message' => ' IMAGE successfully DELETE',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
}

    }


