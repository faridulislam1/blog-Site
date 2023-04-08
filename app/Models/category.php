<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\Dumper\getExtension;

class Category extends Model
{

    use HasFactory;
    private static $category, $image, $imageNewName, $directory, $imgUrl;
    public static function saveCategory($request){
        self::$category = new Category();
        self::$category->category_name = $request->category_name;
        self::$category->image = self::saveImage($request);
        self::$category->save();
    }

    private static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = 'category-'.rand().'.'.self::$image->Extension();
        self::$directory = 'admin-asset/upload-image/category/';
        self::$imgUrl = self::$directory.self::$imageNewName;
        self::$image->move(self::$directory,self::$imageNewName);
        return self::$imgUrl;
    }

    public static function categoryDelete($id){
        self::$category = Category::find($id);
        self::$category->delete();
    }

    public static function updateCategory($request){
        self::$category = Category::find($request->id);
        self::$category->category_name = $request->category_name;
        //self::$category->category_name = $request->category_name;
        if($request->file('image')){
            if(self::$category->image){
                if(file_exists(self::$category->image)){
                    unlink(self::$category->image);
                    self::$category->image = self::saveImage($request);
                }
            }else
                self::$category->image = self::saveImage($request);
        }

        //self::$category->image = self::saveImage($request);


        self::$category->save();
    }


    public static function categoryStatus($id){
        self::$category=category::find($id);

        if(self::$category->status == 1)
        {
            self::$category->status = 0;
        }else{
            self::$category->status = 1;
        }
        self::$category->save();

    }

}




//public static function studentUpdate($request){
//    self::$student=Student::find($request->id);
//    self::$student->seid = $request->seid;
//    self::$student->name = $request->name;
//    self::$student->email = $request->email;
//    self::$student->phone = $request->phone;
//    self::$student->address = $request->address;
//
//    if ($request->file('image')){
//        if(self::$student->image){
//            if (file_exists(self::$student->image)){
//                unlink(self::$student->image);
//                self::$student->image = self::saveImage($request);
//            }
//        }else{
//            self::$student->image = self::saveImage($request);
//        }
//    }
//
//    self::$student->department = $request->department;
//    self::$student->course_name = $request->course_name;
//
//    self::$student->save();
//}
