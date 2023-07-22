<?php

namespace App\Http\Controllers;

use App\Models\ShopSettings;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShopSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ShopSettings = ShopSettings::all();
        return view('admin/shop_settings/index', compact('ShopSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'shop_name' => ['required','regex:/^[a-zA-Z .]+$/'],
            'phone' => ['required', 'regex:/^(?:\\+88|88)?(01[3-9]\\d{8})$/'],
            'email' => ['required', 'regex:/\S+@\S+\.\S+/'],
            'address' => ['required','regex:/^[a-zA-Z0-9 ,.-]+$/'],
            'logo' => ['required','image'],
        ],[
            'shop_name.required' => 'Shop Name must be given',
            'shop_name.regex' => 'Shop Name need to be string. No special characters are allowed',
            'phone.required' => 'Phone Number must be given',
            'phone.regex' => 'Only bangladeshi phone numbers are allowed with 11 digits',
            'email.required' => 'email Address must be given',
            'email.regex' => 'Please enter a valid email address',
            'address.required' => 'Shop Address must be given',
            'address.regex' => 'Shop Address need to be string. No special characters are allowed',
            'logo.required' => 'Logo must be given',
            'logo.image' => 'Only logo images are allowed',
        ]);

        $filename = imageSavePublicFolder(request()->logo);
        $ShopSettings = new ShopSettings();
        $ShopSettings->shop_name = $request->shop_name;
        $ShopSettings->address = $request->address;
        $ShopSettings->phone = $request->phone;
        $ShopSettings->email = $request->email;
        $ShopSettings->logo =$filename;
        $ShopSettings->save();

        return redirect()->route('ShopSettings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopSettings  $shopSettings
     * @return \Illuminate\Http\Response
     */
    public function show(ShopSettings $shopSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopSettings  $shopSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopSettings $shopSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopSettings  $shopSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopSettings $shopSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopSettings  $shopSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopSettings $shopSettings)
    {
        //
    }
}
