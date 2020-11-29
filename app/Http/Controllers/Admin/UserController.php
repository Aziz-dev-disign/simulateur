<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use App\ROle;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titre = 'List des utilistateurs';
        $users = User::with('roles')->get();

        return view('contact.utilisateur.index', compact('users', 'titre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titre = 'Ajouter un utilisateur';
        $roles = Role::all();
        return view('contact.utilisateur.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'role_id'=>['required','integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'status'=>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'role_id'=>$data['role_id'],
            'name'=>$data['name'],
            'email'=>$data['email'],
            'status'=>$data['status'],
            'password'=>Hash::make($data['password'])
        ]);
        return redirect()->route('admin.user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $titre = 'Détail de ';
        return view('contact.utilisateur.show', compact('user', 'titre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {        
        $titre = 'Editer ';
        $roles = Role::all();
        return view('contact.utilisateur.edit', compact('user', 'titre','roles'));
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
        $user->update([
            'role_id'=>$request->role_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
