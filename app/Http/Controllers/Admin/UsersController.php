<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use App\Property;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $properties = Property::all();
        //return view('admin.users.index')->with('users', $users);
        return view('admin.index', compact('users', 'properties'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        /*
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }
        $roles = Role::all();
        return view('admin.users.edit')->with([
            'user'=>$user,
            'roles'=>$roles
        ]);
        */
        if(Gate::denies('edit-users')){
            return redirect(route('admin.index'));
        }
        $roles = Role::all();
        return view('admin.index')->with([
            'user'=>$user,
            'roles'=>$roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        if($user->save()){
            $request->session()->flash('success', $user->name .' has been updated' );
        }else{
            $request->session()->flash('error', 'There was an error updating the user '. $user->name );
        }
        //return redirect()->route('admin.users.index');
        return redirect()->route('admin.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
           // return redirect(route('admin.users.index'));
            return redirect()->route('admin.index');

        }
        $user->roles()->detach();
        $user->delete();
        //return redirect()->route('admin.users.index');
        return redirect()->route('admin.index');

    }
}
