<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Post;

class HalPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::latest()->paginate(5);
        // return view('halaman_depan.index',compact('posts'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);
        $data['posts'] = Post::orderBy('id','desc')->paginate(5);
        return view('halaman_depan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('halaman_depan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'detail' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        $post = new Post;
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->image = $path;
        $post->save();
        if($post){
            Session::flash('tersimpan', 'Data berhasil diubah'); 
            return redirect()->route('kelola_posts.index');
        }else{
            return redirect()->route('kelola_posts.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('halaman_depan.show',compact('post'));
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
        return view('halaman_depan.edit', compact('post'));
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
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
        ]);
        
        $post = Post::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->save();
        if($post){
            Session::flash('tersimpan', 'Data berhasil diubah'); 
            return redirect()->route('kelola_posts.index');
        }else{
            return redirect()->route('kelola_posts.index')->with(['error' => 'Data Gagal Disimpan!']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return back();
    }
}
