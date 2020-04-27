<?php

namespace App\Http\Controllers;

use App\Product_Settings;
use Illuminate\Http\Request;

class ProductSettingsController extends Controller
{
    public function index()
    {
        $data['PageTitle'] = ' Product Setting';
        $data['settings'] = Product_Settings::orderBy('id', 'desc')->get();


        return view('admin.productsetting.index', $data);
    }

    public function edit( $id)
    {
        $data['PageTitle'] =" Edit Product Setting";
        $data['setting']=Product_Settings::find($id);

        // dd($data);
        return view('admin.productsetting.edit',$data);
    }

    public function update(Request $request,  $id)
    {
        $setting =Product_Settings::find($id)->update($request->all());
        return redirect()->route('admin-set-prod-index')
        ->with('success', 'Product Setting Updated Successfully.');
    }
}
