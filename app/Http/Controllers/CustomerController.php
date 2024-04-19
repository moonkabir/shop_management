<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $customers = Customer::all();
        return view('admin/customer/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/customer/create');
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
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->idNo = $request->idNo;
        $customer->personal_contact_no = $request->personal_contact_no;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('CustomerManage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin/customer/update', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->idNo = $request->idNo;
        $customer->personal_contact_no = $request->personal_contact_no;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('CustomerManage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->delete();
        return redirect()->route('CustomerManage');
    }
}
