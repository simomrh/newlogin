<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class PostController extends Controller
{


    public function __construct()
    {
            $this->middleware('auth');
    }


    public function index()
    {
        $post = Post::OrderBy('created_at' , 'DESC')->get();
        return view('posts.index')->with('post', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        if ($tags->count() == 0) {
            return   redirect()->route('tags.create');
        }
        return view('posts.create')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required',
            'content' =>  'required',
            'photo' =>  'required| image:jpeg,jpg,png',
            'tags' =>  'required',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);

        $post = Post::create([
            'user_id' =>  Auth::id(),
            'title' =>  $request->title,
            'content' =>   $request->content,
            'photo' =>  'uploads/posts/'.$newPhoto,
            'slug' =>   str_slug($request->title),
        ]);
        $post->tag()->attach($request->tags);


        return redirect()->back() ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug )
    {
        $tags = Tag::all();
     $post = Post::where('slug' , $slug )->first();
       // dd($post);
        // if ($post === null) {
        //     return redirect()->back() ;
        // }
        return view('posts.show')->with('post',$post)
        ->with('tags',$tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function Edit($id)
    {
       $tags = Tag::all();
        $post = Post::where('id' , $id )->where('user_id', Auth::id())->first();
        if ($post === null) {
           return redirect()->back() ;
       }
       return view('posts.edit')->with('post',$post)
       ->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',

        ]);
        if ($request->has('photo')) {
         $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('posts/uploads',$newPhoto);
          $post->photo =  'posts/uploads'.$newPhoto;
        }

        $post->title = $request->title ;
        $post->content = $request->content ;
        $post->save();
        $post->tag()->sync($request->tags);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function postsTrashed( )
    {
       $post = Post::onlyTrashed()->get();
        return view('posts.trashed')->with('post', $post);
    }
    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first;
        $post->forceDelete();
        return redirect()->back();

    }
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id' ,  $id )->first() ;
        $post->restore();
        return redirect()->back() ;
    }
}
