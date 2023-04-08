<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    private static $author,$authors;
    public function addAuthor(){
        return view('admin.author.add-author');
    }


    public function saveAuthor(Request $request){
        Author::saveAuthor($request);
        return back();
    }

    public function manageAuthor(){
        return view('admin.author.manage-author',[
            'authors'=>Author::all()
        ]);
    }

    public function deleteAuthor(Request $request){
        Author::deleteAuthor($request->id);
        return back()->with('message', 'Info deleted');
    }

    public function editAuthor($id)
    {
        self::$author = Author::find($id);
        return view('admin.author.edit-author',[
            'author' => self::$author
        ]);
    }
    public function updateAuthor(Request $request){
        Author::updateAuthor($request);
        return back()->with('message', 'Info updated');
    }
    public function statusAuthor($id){
        Author::statusAuthor($id);
        return back();
    }


}
