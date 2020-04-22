<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $data['users'] = User::where('type', '!=', 'customer')->get();

        if ($type == 'customer') {
            $data['PageTitle'] = 'All Customer';
            $data['type'] = 'customer';
            $data['users'] = User::where('type', 'customer')->get();
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
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm-password',
            'roles'    => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->withInput();
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        // $user = User::create($input);
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $input['password'],
            'type'     => $input['roles'][0],
        ]);

        $user->assignRole($request->input('roles'));

        return redirect()->route('users')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
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
        $data['userRole'] = $user->roles->pluck('name', 'name')->all();
        $data['user'] = $user;
        $data['PageTitle'] = 'Edit '.$user->name;

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
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles'    => 'required',
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

        return redirect('admin/users/'.strtolower($input['roles'][0]))
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
}
