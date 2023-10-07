<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogCagetoryController extends Controller
{
   public function AllBlog(){

    $blogcategory= BlogCategory::latest()->get();

    return view('admin.blog_category.blog_category_all',compact('blogcategory'));
   }

   public function AddBlog(){

    return view('admin.blog_category.blog_category_add');
   }
   public function StoreBlogCategory(Request $req){

    $req-> validate([
        'Blog_category'=> 'required',

    ],[
        'Blog_category.required'=>'Blog_category is requrired',

    ]);



    BlogCategory::insert([
        'Blog_category' => $req->Blog_category,

        'created_at'=>Carbon::now()
    ]);

    $notification = [
        'message' => '  Blog Category insert Sucsefully Uploaded',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.blog.category')->with($notification);

}

public function EditBlogCategory($id){
    $editblog= BlogCategory::findOrFail($id);

    return view('admin.blog_category.blog_category_edit',compact('editblog'));

}//end method

public function UpdateBlog(Request $req ,$id){




    BlogCategory::findOrFail($id)->update([
         'Blog_category' => $req->Blog_category,

     ]);

     $notification = [
         'message' => 'Update Blog  successfully uploaded',
         'alert-type' => 'success'
     ];

     return redirect()->route('all.blog.category')->with($notification);
 }
 public function DeleteBlog($id){

    $delBlog=  BlogCategory::findOrFail($id);


    BlogCategory::findOrFail($id)->delete();

    $notification = [
        'message' => ' IMAGE successfully DELETE',
        'alert-type' => 'success'
    ];

    return redirect()->back()->with($notification);
}//end method
}





