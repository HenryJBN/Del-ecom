<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $data['PageTitle'] = 'Setting';
        $data['setting'] = Setting::first();


        return view('admin.setting.index', $data);
    }

    public function create()
    {
        $data['PageTitle'] = " Edit Global Setting";

        return view('admin.setting.create', $data);
    }

    public function store(Request $request)
    {

        //  dd($request->all());
        $setting = Setting::create($request->all());
        return redirect()->route('admin-set-gen-index');
    }

    public function edit($id)
    {
        $data['PageTitle'] = " Edit Global Setting";
        $data['setting'] = Setting::find($id);

        // dd($data);
        return view('admin.setting.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $setting = Setting::find($id)->update($request->all());
        return redirect()->route('admin-set-gen-index')
            ->with('success', 'Setting Updated Successfully.');
    }

    public function siteLogo(Request $request)
    {
        $setting = Setting::first();


        $setting
            ->addMedia($request->site_logo)
            ->toMediaCollection('site_logo');

        return redirect()->route('admin-set-gen-index')
            ->with('success', 'Site logo Updated Successfully.');
    }



}
