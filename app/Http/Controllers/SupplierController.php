<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $suppliers = Supplier::all();
        return view('admin/supplier/index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/supplier/create');
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
            'idNo' => ['required'],
            'personal_contact_no' => ['required'],
        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->idNo = $request->idNo;
        $supplier->personal_contact_no = $request->personal_contact_no;
        $supplier->address = $request->address;
        $supplier->save();

        return redirect()->route('SupplierManage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin/supplier/update', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $supplier = Supplier::find($request->id);
        $supplier->name = $request->name;
        $supplier->idNo = $request->idNo;
        $supplier->personal_contact_no = $request->personal_contact_no;
        $supplier->address = $request->address;
        $supplier->save();

        return redirect()->route('SupplierManage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->delete();
        return redirect()->route('SupplierManage');
    }
}
