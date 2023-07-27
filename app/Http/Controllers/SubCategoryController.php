<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $subcategorys = SubCategory::all();
        return view('admin/subcategory/index', compact('subcategorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/subcategory/create');
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
            'name' => ['required'],
            'category' => ['required'],
        ]);
        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category = $request->category;
        $subcategory->save();

        return redirect()->route('SubCategoryManage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        return view('admin/subcategory/update', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'category' => ['required'],
        ]);

        $subcategory = SubCategory::find($request->id);
        $subcategory->name = $request->name;
        $subcategory->category = $request->category;
        $subcategory->save();

        return redirect()->route('SubCategoryManage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $subcategory = SubCategory::find($request->id);
        $subcategory->delete();
        return redirect()->route('SubCategoryManage');
    }
}
