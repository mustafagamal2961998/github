<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::paginate(10);
        return view('dashboard.contents.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $content = new Content();
        $categories = Category::all();
        return view('dashboard.contents.create',compact('content','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentRequest $request)
    {
    

        $content = new Content();
        $content->title=[
            'ar'=>$request->title_ar,
            'en'=>$request->title_en,
        ];
        $content->slug = Str::slug($request->title_en);

        $content->content =[
            'ar'=>$request->content_ar,
            'en'=>$request->content_en,
        ];
        $content->category_id = $request->category_id;
        $content->status = $request->status;
        $content->save();
        return redirect()->route('contents.index')->with('success','Content created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        $categories = Category::all();
        return view('dashboard.contents.edit',compact('categories','content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentRequest $request, Content $content)
    {
        $content->update([
            'title'=>[
                'ar'=>$request->title_ar,
                'en'=>$request->title_en,
            ],
            'slug'=> Str::slug($request->title_en),
            'content'=>[
                'ar'=>$request->content_ar,
                'en'=>$request->content_en,
            ],
            'category_id'=>$request->category_id,
            'status'=>$request->status,
        ]);
        
        return redirect()->route('contents.index')->with('success','Content updated successfully!');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('contents.index')->with('success','Content deleted successfully!');

    }
}
