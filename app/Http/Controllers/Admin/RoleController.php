<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('admin')) {
            return view('admin.roles.index', [
                'roles' => Role::sortable()->paginate(10),
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
            return view('admin.roles.create');
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
            $role = Role::create([
                'name' => $request->name,
            ]);
            Alert::toast(__('Created'), 'success');
            return redirect(route('admin.roles.index'));
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
            return view('admin.roles.edit', [
                'role'  => Role::findOrFail($id)
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
            $role = Role::findOrFail($id);
            $role->update($request->except(['_token']));
            Alert::toast(__('Updated'), 'success');
            return redirect(route('admin.roles.index'));
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(url('/'));
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
            Role::destroy($id);
            Alert::toast(__('Deleted'), 'success');
            return redirect(route('admin.roles.index'));
        } else {
            Alert::toast(__('Access denied'), 'error');
            return redirect(route('admin.roles.index'));
        }
    }
}
