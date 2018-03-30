<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        //Called on cms.local/posts
        //Check the URIs and Names using the php artisan route:list command in terminal window.
    {
//        $posts = Post::all();
        //$posts = Post::latest()->get();
        $posts = Post::orderBy('title', 'desc')->get();


        return view('posts.index', compact('posts'));
        //$ sign will be automatically added to posts parameter
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
    public function store(CreatePostRequest $request)
    {

        // Saving file to the database (posts table).
        // need to add 'file' field.
        $input = $request->all();

        if($file = $request->file('file'))
        {
            $name = $file->getClientOriginalName();

            $file->move('images', $name);
            //$file = move('images', $name);

            $input['path'] = $name;
        }

        Post::create($input);

        // Accepting file to upload file
//        $file = $request->file('file');
//
//        echo $file->getClientOriginalName();
//        echo "<br><br>";
//        echo $file->getClientSize();


        //return $request->all();
  //      return $request->get('title');  // or as follows (like property)
        //return $request->title;

        //Returns: {"title":"Suneet","_token":"PLDLvcdkHk4P4mtHqUYrDDvgqH9xlMgIafeg5P7q","submit":"Submit"}

        // Use own request, created using php artisan, instead of default
//        $this->validate($request, [
//                'title'=>'required|max:15'
//            ]);

//
        //Post::create($request->all()); // Will save the data to the database.

        // Another method to save/persist data to the database
//        $input = $request->all();
//        $input->title = $request->title;
//        Post::create($request->all());
//
        // Another method to save/persist data to the database
//        $post = new Post;
//        $post->title = $request->title;
//        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        return $request->all();
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->delete();

        return redirect('/posts');
    }

    public function contact()
    {
        $people = ['Suneet', 'Komalpreet', 'Sunil', 'Neel', 'Raju', 'Anjali', 'Vishal', 'Alka'];
        return view('contact', compact('people'));
    }

    public function show_post($id, $topic, $location)
    {
//        return view('post')->with('id', $id);
        return view('post', compact('id', 'topic', 'location'));
    }

}
