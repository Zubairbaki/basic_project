<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function AllBlog(){

        $blog= Blog::latest()->get();

        return view('admin.blog.blog_all',compact('blog'));
       }
       public function ADDBlog(){

        $category= BlogCategory::orderBy('Blog_category','ASC')->get();

        return view('admin.blog.blog_add',compact('category'));
       }//end method


        public function StoreBlog(Request $req){



            $img = $req->file('Blog_image');
            $extension = $img->getClientOriginalExtension();
            $name_gen = hexdec(uniqid()) . '.' . $extension;

           Image::make($img)
            ->fit(430,327 )
            ->save('upload/blog/' . $name_gen);

            $save_url = 'upload/blog/' . $name_gen;

            Blog::insert([
                'Blog_categoryid' => $req->Blog_categoryid,
                'Blog_title' => $req->Blog_title,
                'Blog_tags' => $req->Blog_tags,
                'Blog_description' => $req->Blog_description,
                'Blog_image' => $save_url,
                'created_at'=>Carbon::now()
            ]);

            $notification = [
                'message' => '  Blog  Sucsefully Uploaded',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.blog')->with($notification);

        }

        public function EditBlog($id){
            $Blog= Blog::findOrFail($id);
            $category= BlogCategory::orderBy('Blog_category','ASC')->get();
             return view('admin.blog.blog_edit',compact('Blog','category'));

    }//end method

    public function UpdateBlog(Request $req){
        $blog_id = $req->id;

     if ($req->hasFile('Blog_image')) {
         $img = $req->file('Blog_image');
         $extension = $img->getClientOriginalExtension();
         $name_gen = hexdec(uniqid()) . '.' . $extension;

         Image::make($img)
         ->fit(430,327 )
         ->save('upload/blog/' . $name_gen);

         $save_url = 'upload/blog/' . $name_gen;

         Blog::findOrFail($blog_id)->update([
            'Blog_categoryid' => $req->Blog_categoryid,
            'Blog_title' => $req->Blog_title,
            'Blog_tags' => $req->Blog_tags,
            'Blog_description' => $req->Blog_description,
            'Blog_image' => $save_url,
            'created_at'=>Carbon::now()
        ]);

         $notification = [
             'message' => 'Update Image successfully uploaded',
             'alert-type' => 'success'
         ];

         return redirect()->route('all.blog')->with($notification);
     } else {
             Blog::findOrFail($blog_id)->update([
                'Blog_categoryid' => $req->Blog_categoryid,
                'Blog_title' => $req->Blog_title,
                'Blog_tags' => $req->Blog_tags,
                'Blog_description' => $req->Blog_description,

         ]);

         $notification = [
             'message' => 'Update without Image successfully uploaded',
             'alert-type' => 'success'
         ];

         return redirect()->route('all.blog')->with($notification);
     }

 }
 public function DeleteBlog($id){

    $del=  Blog::findOrFail($id);

    $img= $del->Blog_image;
    unlink($img);

    Blog::findOrFail($id)->delete();

    $notification = [
        'message' => ' Blog  successfully DELETE',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}//end method

public function DetailsBlog($id){

    $allbog= Blog::latest()->limit(5)->get();

    $category= BlogCategory::orderBy('Blog_category','ASC')->get();

    $blogs= Blog::findOrFail($id);

    return view ('frontend.blog.blog_details',compact('blogs','allbog','category'));
}

public function CategoryBlog($id){

    $blogpost= Blog::where('Blog_categoryid',$id)->orderBy('id','DESC')->get();

    $allbog= Blog::latest()->limit(5)->get();

    $category= BlogCategory::orderBy('Blog_category','ASC')->get();

    $categoryname= BlogCategory::findOrFail($id);

   return   view('frontend.blog.cat_blog_details',compact('blogpost','allbog','category','categoryname'));
}

public function HomeBlog(){

    $allblogs=Blog::latest()->get();

    $category=BlogCategory::orderBy('Blog_category','ASC')->get();

    return view('frontend.blog.home_blog',compact('allblogs','category'));
}
}
