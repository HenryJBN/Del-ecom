<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['PageTitle'] = 'All Shipping';
        $data['shippings'] = Shipping::orderBy('id', 'desc')->get();

        return view('admin.shipping.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['PageTitle'] = 'Create Shipping';

        return view('admin.shipping.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'first_name'     => 'required|max:100',
            'last_name'      => 'required|max:100',
            'email'          => 'unique:shippings|required',
            'phone_number'   => 'unique:shippings|required|max:20',
            'address'        => 'required',
            'state'          => 'required',
            'shipping_method'=> 'required',
        ];
        $customs = [
            'phone_number.unique' => 'This Phone has already been taken.',
            'email.unique'        => 'This Email has already been taken.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }
        //--- Validation Section Ends
        //Logic
        $shipping = Shipping::create([
            'user_id'         => auth()->user() ? auth()->user()->id : null,
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'email'           => $request->email,
            'phone_number'    => $request->phone_number,
            'address'         => $request->address,
            'state'           => $request->state,
            'shipping_method' => $request->shipping_method,
        ]);

        return redirect()->route('admin-ship-index')
            ->with('success', 'New Shipping Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Shipping $shipping
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Shipping $shipping
     * @param mixed         $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['shipping'] = Shipping::findOrFail($id);
        $data['PageTitle'] = 'Edit '.$data['shipping']->name;

        return view('admin.shipping.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Shipping            $shipping
     * @param mixed                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'first_name'     => 'required|max:100',
            'last_name'      => 'required|max:100',
            'email'          => 'required|unique:shippings,email,'.$id,
            'phone_number'   => 'required|max:20|unique:shippings,phone_number,'.$id,
            'address'        => 'required',
            'state'          => 'required',
            'shipping_method'=> 'required',
        ];
        $customs = [
            'phone_number.unique' => 'This Phone has already been taken.',
            'email.unique'        => 'This Email has already been taken.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }
        //--- Validation Section Ends
        //Logic

        //updating shipping table

        $shipping = Shipping::findOrFail($id);
        $shipping->first_name = $request->first_name;
        $shipping->last_name = $request->last_name;
        $shipping->email = $request->email;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->state = $request->state;
        $shipping->shipping_method = $request->shipping_method;

        $shipping->update();

        return redirect()->route('admin-ship-index')
            ->with('success', ' Shipping Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Shipping $shipping
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $shipping = Shipping::findOrFail($request->id);
        $shipping->delete(); //delete billing

        //--- Redirect Section

        $msg = 'Shipping deleted Successfully !';

        return response()->json([
            'success' => true,
            'data'    => $msg,
        ]);
    }
}
