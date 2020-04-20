<?php

namespace App\Http\Controllers;

use App\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['PageTitle'] = "All Billings";
        $data['billings'] = Billing::orderBy('id', 'desc')->get();
        return view('admin.billing.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['PageTitle'] = "Create Category";

        return view('admin.billing.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [

            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'email' =>  'unique:billings|required',
            'phone_number' => 'unique:billings|required|max:20',
            'address' => 'required',
            'state' => 'required',

        ];
        $customs = [

            'phone_number.unique' => 'This Phone has already been taken.',
            'email.unique' => 'This Email has already been taken.',

        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();

        }
        //--- Validation Section Ends
        //Logic

        $billing = Billing::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'state' => $request->state,
        ]);

        return redirect()->route('admin-bill-index')
        ->with('success', 'New Billing Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data['billing'] = Billing::findOrFail($id);
        $data['PageTitle'] = 'Edit ' . $data['billing']->name;
        return view('admin.billing.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        //--- Validation Section
        $rules = [

            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:billings,email,'. $id,
            'phone_number' => 'required|max:20|unique:billings,phone_number,'. $id,
            'address' => 'required',
            'state' => 'required',

        ];
        $customs = [

            'phone_number.unique' => 'This Phone has already been taken.',

        ];
        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();

        }
        //--- Validation Section Ends

        //updating billing table

        $billing = Billing::findOrFail($id);
        $billing->first_name = $request->first_name;
         $billing->last_name = $request->last_name;
         $billing->email = $request->email;
         $billing->phone_number = $request->phone_number;
         $billing->address = $request->address;
         $billing->state = $request->state;

        $billing->update();
        return redirect()->route('admin-bill-index')
        ->with('success', ' Billing Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $billing = Billing::findOrFail($request->id);
        $billing->delete(); //delete billing


        //--- Redirect Section

        $msg = 'Billing deleted Successfully !';
        return response()->json(array(
            'success' => true,
            'data'   => $msg
        ));
    }
}
