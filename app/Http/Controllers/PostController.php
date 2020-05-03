<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Purifier;
use Session;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }


    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'category_id'    => 'required|integer',
            'body'           => 'required',
            'featured_image' => 'sometimes|image'
        ));

        $post = new Post();

        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;
        if (!$request->slug) {
            $post->slug = str_slug($request->title);
        } else {
            $post->slug = $request->slug;
        }

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $localtion = public_path('images/'. $filename);
            Image::make($image)->resize(800)->save($localtion);

            $post->image = $filename;
        }

        $post->save();
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog was saved successful');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category)
        {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }
        $tagsForThisPost = json_encode($post->tags->pluck('id'));
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2)->withTagsForThisPost($tagsForThisPost);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title'         => 'required|max:255',
            'category_id'   => 'required|integer',
            'body'          => 'required',
            'featured_image'=> 'sometimes|image'
        ));

        $post = Post::find($id);

        $post->title = $request->input('title');
        if (!$request->slug) {
            $post->slug = str_slug($request->title);
        } else $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image'))
        {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $localtion = public_path('images/'. $filename);
            Image::make($image)->resize(800)->save($localtion);
            $oldFileName = $post->image;
            $post->image = $filename;
            Storage::delete($oldFileName);
        }

        $post->save();

        $post->tags()->sync($request->tags);
        Session::flash('success', 'The blog was updated successful');

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->image);
        $post->delete();

        Session::flash('success', 'Post has been deleted successful');
        return redirect()->route('posts.index');
    }
}
