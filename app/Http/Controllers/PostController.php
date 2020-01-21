<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->get('id')) {
            $id = request()->get('id');
            $posts = Post::where('user_id', $id)->get();
            $user = User::find($id);
        } else {
            $posts = Auth::user()->posts;
            $user = Auth::user();
        }
        return view('post.index')->with('posts', $posts)->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'caption' => 'required|max:5000|min:3',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $filename = Auth::user()->id . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $location = 'post/' . Auth::user()->id;
        $path = Storage::disk('public')->putFileAs($location, $request->file('image'), $filename);

        $post = Post::create([
            'user_id' => Auth::user()->id,
            'caption' => $request->caption,
            'image' => $location . '/' . $filename
        ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with('post', $post);
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
        $this->validate($request, [
            'caption' => 'required|max:5000|min:3',
            'image' => 'sometimes|mimes:jpg,jpeg,png',
        ]);

        $post = Post::find($id);
        if ($request->hasFile('image')) {
            $oldPath = $post->image;
            Storage::disk('public')->delete($oldPath);
            $filename = Auth::user()->id . '-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $location = 'post/' . Auth::user()->id;
            $path = Storage::disk('public')->putFileAs($location, $request->file('image'), $filename);
            $post->image = $path;
        }
        $post->caption = $request->caption;
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Storage::disk('public')->delete($post->image);

        return redirect()->back();
    }
}
