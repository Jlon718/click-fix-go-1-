<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('user')) {
            return view('admin.users.index', [
                'users' => User::with('roles')->sortable()->paginate(13),
            ]);
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(url('/'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('admin')) {
            return view('admin.users.create', ['roles' => Role::all()]);
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(url('/'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('admin')) {
            $user = User::create([
                'personal_number' => $request->personal_number,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->roles()->sync($request->roles);
            Alert::toast(__('Created'), 'success');
            return redirect(route('admin.users.index'));
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(url('/'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::allows('admin')) {
            //
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(url('/'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('admin')) {
            return view('admin.users.edit', [
                'roles' => Role::all(),
                'user'  => User::findOrFail($id)
            ]);
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(url('/'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('admin')) {
            $user = User::findOrFail($id);
            $user->update($request->except(['_token', 'roles']));
            $user->roles()->sync($request->roles);
            Alert::toast(__('Updated'), 'success');
            return redirect(route('admin.users.index'));
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(route('admin.users.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('admin')) {
            User::destroy($id);
            Alert::toast(__('Deleted'), 'success');
            return redirect(route('admin.users.index'));
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(route('admin.users.index'));
        }
    }
}
