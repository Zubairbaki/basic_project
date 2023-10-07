<?php

namespace App\Http\Controllers\Home;



use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    public function HomeSlider(){
      $homeslide= HomeSlide::find(1);
      return view('admin.home-slider.home_slide_all',compact('homeslide'));
    }//end method

    public function UpdateSlider(Request $req){
        $slide_id = $req->id;

        if ($req->hasFile('home_slider')) {
            $img = $req->file('home_slider');
            $extension = $img->getClientOriginalExtension();
            $name_gen = hexdec(uniqid()) . '.' . $extension;

            Image::make($img)
            ->fit(636, 825)
            ->save('upload/home_slider/' . $name_gen);

            $save_url = 'upload/home_slider/' . $name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'video_url' => $req->video_url,
                'home_slider' => $save_url,
            ]);

            $notification = [
                'message' => 'Update Image successfully uploaded',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        } else {
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $req->title,
                'short_title' => $req->short_title,
                'video_url' => $req->video_url,
            ]);

            $notification = [
                'message' => 'Update without Image successfully uploaded',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }

}
