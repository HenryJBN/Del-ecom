<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null|mixed $type
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        $data['PageTitle'] = 'All Staff';
        $data['type'] = 'admin';
        $data['users'] = User::where('type', '!=', 'customer')->orderby('created_at','desc')->get();

        if ($type == 'customer') {
            $data['PageTitle'] = 'All Customer';
            $data['type'] = 'customer';
            $data['users'] = User::where('type', 'customer')->orderby('created_at','desc')->get();
        }

        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['PageTitle'] = 'Create Admin';

        $data['roles'] = Role::orderBy('id', 'DESC')->pluck('name', 'name')->all();

        return view('admin.user.create', $data);
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

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm-password',
            'roles' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }

        // dd($request->roles[0]);
        $password = Hash::make($request->password);

        // $user = User::create($input);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'type' => $request->roles[0],
        ]);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users')
            ->with('success', 'User created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @param mixed     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $data['roles'] = Role::pluck('name', 'name')->all();
        // dd($data['roles']);
        $data['userRole'] = $user->roles->pluck('name', 'name')->all();
        $data['user'] = $user;
        $data['PageTitle'] = 'Edit ' . $user->name;

        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User                $user
     * @param mixed                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }

        $input = $request->all();

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
            $user->password = $input['password'];
        }
        $user->type = $input['roles'][0];
        $user->update();

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect('admin/users/' . strtolower($input['roles'][0]))
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        if (empty($user)) {
            return response('error', 200);
        }

        $user->delete($request->id);

        return response('success', 200);
    }

    //set profile
    public function profile($id)
    {

 $data['user'] = User::where('id', $id)->first();



        $data['PageTitle'] = 'Profile Information';

        $data['trans_PageTitle'] = "All Transaction";
        $data['trans'] = DB::table('transactions')
            ->leftJoin('users', 'transactions.email_address', '=', 'users.email')
            ->where('users.email', $data['user']->email)
            ->orderby('transactions.transaction_date', 'desc')->get();

        // dd($data['trans']);
        //get all orders from a users
        $data['orders_PageTitle'] = "All Orders";
        $data['orders'] = Order::where('user_id', $data['user']->id)->orderBy('created_at', 'desc')->get();

        return view('admin.user.profile', $data);
    }

    //set profile image
    public function profileLogo(Request $request, $id )
    {

            $user = User::where('id', $id)->first();


        $user
            ->addMedia($request->profile_logo)
            ->toMediaCollection('profile_logo');

        return redirect()->route('admin-user-profile', $id)
            ->with('success', 'Site logo Updated Successfully.');
    }
}
