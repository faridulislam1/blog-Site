<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use function PHPUnit\Framework\setBackupGlobalsExcludeList;

class BlogController extends Controller
{
//    Start frontend home

    private static $blog,$authors;
    public function index(){
        return view('frontEnd.home.home',[
            'blogs'=>Blog::with('category:id,category_name','author:id,author_name,image')->get()
        ]);
    }
    //  End frontend home


    public function blogDetails($slug){
        $blogDetails = Blog::where('slug',$slug)->first();
        $blogCategory = $blogDetails->category_id;
        $relatedBlogs = Blog::where('category_id',$blogCategory)->get();
//        return $relatedBlogs;
        return view('frontEnd.blog.blog-details',[
            'blogDetails' =>$blogDetails,
            'relatedBlogs' => $relatedBlogs,
            'blogs'=>$blogDetails
        ]);
    }


//    public function blogDetails($slug){
////        return Blog::where('slug',$slug)->first();
//        return view('frontEnd.blog.blog-details',[
//            'blogs'=>Blog::where('slug',$slug)->first()
//        ]);
//    }


//    This is the file for home frontend


    public function addBlog(){
        return view('admin.blog.add-blog',[
            'categories'=>Category::where('status', 1)->orderby('id','desc')->get(),
            'authors'=>Author::where('status', 1)->orderby('id','desc')->get()
        ]);
    }

    public function saveBlog(Request $request){
        //return $request;
        Blog::saveBlog($request);
        return back();

    }

    public function manageBlog()
    {
        $blogs=Blog::with('category:id,category_name','author:id,author_name')->get();
//        return $blogs;
        return view('admin.blog.manage-blog', [
            'blogs'=>$blogs
        ]);
    }

    public function deleteBlog(Request $request){
        Blog::deleteBlog($request->id);
        return back()->with('message', 'Info deleted');
    }

    public function editBlog($id)
    {
        self::$blog = Blog::find($id);
        return view('admin.blog.edit-blog',[
            'blog' => self::$blog
        ]);
    }
    public function updateBlog(Request $request){
        Blog::updateBlog($request);
        return back()->with('message', 'Info updated');
    }
}
