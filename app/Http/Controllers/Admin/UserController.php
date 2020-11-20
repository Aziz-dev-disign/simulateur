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
        $users = User::all();

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
        $mdp = $request['password'];
        $mdp2 = $request['password_confirmation'];

        if (request('password') === request('password_confirmation')) {
            User::create([
                'role_id'=>$request->role_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'status'=>$request->status,
                'password'=>Hash::make($request->password)
            ]);
            return redirect()->route('admin.user.create');
        }else {            
            return redirect()->route('admin.user.create')->with('message','mot de passe incorrect');
        }
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
