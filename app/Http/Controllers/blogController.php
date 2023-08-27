<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->slug = null;
        $blog->category_id = null;
        $blog->save();
        return redirect()->route('blog.index')->with('success', 'Saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findorfail($id);
        return view('blog.show', compact('blog'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findorfail($id);
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bolg = Blog::findorfail($id);
        $bolg->title = $request->title;
        if ($request->body) {
            $bolg->body = $request->body;
        }
        $bolg->save();
        return redirect()->route('blog.index')->with('success', 'Update completed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findorfail($id);
        $blog->delete();
        return redirect()->route('blog.index')->with('success', 'Delete completed successfully');
    }
}
