<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
      
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $category = new Category();
        return view('dashboard.categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {  
  
        $category = new Category();
        $category->name = [
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ];
        $category->slug = Str::slug($category->name['en']);
        $category->description = [
            'ar'=>$request->description_ar,
            'en'=>$request->description_en
        ];
        $category->status = $request->status;
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $category->addMediaFromRequest('image')->toMediaCollection('category');
        }
        $category->save();
        return redirect()->route('categories.index')->with('success','Category created successfully!');
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
    public function edit(Category $category)
    {
        
        return view('dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
     
        $category->update([
            'name' => [
                'ar'=>$request->name_ar,
                'en'=>$request->name_en
            ],
            'description'=>[
                'ar'=>$request->description_ar,
                'en'=>$request->description_en
            ],
            'status'=>$request->status
        ]);
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if(File::exists($category->getFirstMediaUrl('category'))){
                $category->clearMediaCollection('category');
            }
            $category->addMediaFromRequest('image')->toMediaCollection('category');
        }

        
        return redirect()->route('categories.index')
                         ->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    function softDeleteMethod($id){
        Category::findOrFail($id)->delete();
        
        return redirect()->route('categories.index')->with('success','Category deleted successfully!');
    }
    public function destroy(string $id)
    {
        //
    }
}
