<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = Post::all();
        $data = Post::paginate(3);
        return view("Blog.index")->with("posts",$data);

    }

    public function faq(){
        return view("Blog.faq");

    }

    public function my_post()
    {
        //Article::where(‘user_id’ , Auth::id())->get();
        $data = Post::all()->where('user_id',Auth::id());
        return view("Blog.my_post")->with("posts",$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Blog.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=>"required",
            "description"=>"required",
            "photo_1"=>"required",
            
        ]);
        $data = $request->all();

        //this is for saving the picture
        
        if( key_exists("photo_1",$data)){
        $fileName=time().$request->file('photo_1')->getClientOriginalName();
        $path=$request->file("photo_1")->storeAs("images",$fileName,"public");
        $data["photo_1"]= "/storage/".$path;
        }

        if(key_exists("photo_2",$data)){
        $fileName=time().$request->file('photo_2')->getClientOriginalName();
        $path=$request->file("photo_2")->storeAs("images",$fileName,"public");
        $data["photo_2"]= "/storage/".$path;
        }

        if(key_exists("photo_3",$data)){
        $fileName=time().$request->file('photo_3')->getClientOriginalName();
        $path=$request->file("photo_3")->storeAs("images",$fileName,"public");
        $data["photo_3"]= "/storage/".$path;
        }
        Post::create($data);
        return redirect('/post')->with("success","You have created a new post");
        
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::find($id);
        return view("Blog.show")->with("post",$data);
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data = Post::find($id);
       return view("Blog.edit")->with("post",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title"=>"required",
            "description"=>"required",            
        ]);
        $post = Post::find($id);
        $data = $request->all();
        if( key_exists("photo_1",$data)){
            $fileName=time().$request->file('photo_1')->getClientOriginalName();
            $path=$request->file("photo_1")->storeAs("images",$fileName,"public");
            $data["photo_1"]= "/storage/".$path;
        }
    
        if(key_exists("photo_2",$data)){
            $fileName=time().$request->file('photo_2')->getClientOriginalName();
            $path=$request->file("photo_2")->storeAs("images",$fileName,"public");
            $data["photo_2"]= "/storage/".$path;
        }
    
        if(key_exists("photo_3",$data)){
            $fileName=time().$request->file('photo_3')->getClientOriginalName();
            $path=$request->file("photo_3")->storeAs("images",$fileName,"public");
            $data["photo_3"]= "/storage/".$path;
        }

        $post->update($data);

        return redirect("/post")->with("success","post updated successfully");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect("/post")->with("success","post deleted successfully");
    }
}
