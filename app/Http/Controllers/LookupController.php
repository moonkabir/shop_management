<?php

namespace App\Http\Controllers;

use App\Models\Lookup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LookupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $lookups = Lookup::all();
        return view('admin/lookup/index', compact('lookups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/lookup/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $value = $request->value;
        $messages = [
            'name.unique' => 'Given Name and Value are not unique',
            'title.required' => 'Title must be given',
        ];
        $request->validate([
            'name' => [
                'required',
                Rule::unique('lookups')->where(function ($query) use($name,$value) {
                return $query->where('name', $name)->where('value', $value);
                })
            ],
            'title' => ['required'],
        ],
            $messages
        );
        $lookup = new Lookup();
        $lookup->name = $name;
        $lookup->value = $value;
        $lookup->title = $request->title;
        $lookup->save();

        return redirect()->route('LookupManage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookup  $lookup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lookup = Lookup::find($id);
        return view('admin/lookup/update', compact('lookup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookup  $lookup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $name = $request->name;
        $value = $request->value;
        $id = $request->id;
        $request->validate([
            'name' => [
                'required',
                 Rule::unique('lookups')->where(function ($query) use($name,$value) {
                   return $query->where('name', $name)->where('value', $value);
                 })->ignore($id)
            ],
        ]);

        $lookup = Lookup::find($id);
        $lookup->name = $name;
        $lookup->value = $value;
        $lookup->title = $request->title;
        $lookup->save();

        return redirect()->route('LookupManage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookup  $lookup
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $lookup = Lookup::find($request->id);
        $lookup->delete();
        return redirect()->route('LookupManage');
    }
}
