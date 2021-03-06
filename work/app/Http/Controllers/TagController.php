<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
class tagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
       
    }
    public function index()
    {
        $tags = Tag::get();
        return view('admin.tag.index', compact('tags'));
    }
    public function create()
    {
        return view('admin.tag.create');
    }
    public function store(StoreRequest  $request,Tag $tag)
    {
        $tag->my_story($request);
        return redirect()->route('tags.index');
    }
    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->my_update($request);
        return redirect()->route('tags.index');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
