<?php

namespace App\Http\Controllers;

use App\Models\ShopSettings;
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
    public function create(Request $request)
    {
        $ShopSettings = new ShopSettings();
        $ShopSettings->title = $request->title;
        $ShopSettings->value = $request->value;
        $ShopSettings->save();

        return $ShopSettings;
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
