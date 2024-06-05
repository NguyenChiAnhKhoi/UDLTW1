<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use xIlluminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list=Category::where('status','!=',0)->orderBy('created_at','desc')->get();
        $htmlparentId="";
        $htmlsortOrder="";
        foreach($list as $item){
            $htmlparentId .="<option value='".$item->id."'>".$item->name."</option>";
            $htmlsortOrder .="<option value='".($item->sort_order+1)."'>Sau ".$item->name."</option>";
        }
        return view("backend.category.index",compact("list","htmlparentId","htmlsortOrder"));
    }

   
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category -> name=$request->name;
        $category -> slug = Str::of($request->name)->slug('_');
        $category -> parent_id = $request->parent_id;
        $category -> sort_order = $request->sort_order;
        $category -> description = $request->description;
        $category -> created_at = date('Y-m-d H:i:s');
        $category -> created_by = Auth::id()??1;
        $category -> status =$request -> status;
        $category -> save();
        return redirect()->route('admin.category.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
