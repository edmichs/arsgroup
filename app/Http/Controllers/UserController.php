<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\Permissions;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
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
        return view('Pages.Users.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('Pages.Users.add-edit',compact('roles'));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator  = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::whereEmail($request->input('email'))->first();
        if (!$user) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $role = Role::find($request->input('role_id'));
        $user->roles()->attach($role);
        return redirect()->route('utilisateurs_path');
     }
     return redirect()->back()->withErrors($validator)->withInput()->with(['message' => 'Utilisateur deja existant']);
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('Pages.Users.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('Pages.Users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user =  User::find($request->input('id'));
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        foreach ($user->roles as $role) {
            $user->roles()->detach($role);
        }
        $role = Role::find($request->input('role_id'));
        $user->roles()->attach($role);
        if ($user) {
            
        return redirect()->route('utilisateurs_path');            
        }
        
        return redirect()->back()->with(['message' => "Error "]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->back()->with(['message' => "Utilisateur supprimé avec success"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => "echec de suppression"]);

        }
    }

    public function getAllRole()
    {
        $roles = Role::all();
        return view('Pages.Users.role', compact('roles'));
    }
    public function editRole($id)
    {
        $role = Role::find($id);
      //  $permissions = Permission::all();
        return view('Pages.Users.edit-role',compact('role'));
    }
    public function newRole()
    {
        $permissions = Permissions::all();
        return view('Pages.Users.add-role', compact('permissions'));
    }
    public function postRole(Request $request)
    {
        $role = Role::create($request->all());
       return redirect()->route('roles_path');
    }
    public function updateRole(Request $request)
    {
        $role = Role::find($request->input('id'))->update([
            "libelle" => $request->input('libelle'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('roles_path');
    }
    public function destroyRole($id)
    {
        $role = Role::find($id)->delete();
        if ($role) {
            return redirect()->back()->with(['message' => "Role supprilé avec success"]);
        }
        return redirect()->back()->with(['message' => "Echec d'enregistrement"]);
    }
}
