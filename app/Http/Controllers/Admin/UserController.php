<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use App\ROle;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Hash;
use Gate;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    /**
     * @OA\Get(
     *      path="/admin/user",
     *      operationId="getUserList",
     *      tags={"user"},
     * security={
     *  {"passport": {}},
     *   },
     *      summary="Get list of users",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
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
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        
        /**
         * @OA\Post(
         ** path="/admin/user",
        *   tags={"user"},
        *   summary="Store users",
        *   operationId="postUserStore",
        *   description="LA fonction index renvoie une liste des utilisateurs.",
        *
        * @OA\Parameter(
        *      name="role_id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="integer"
        *      )
        *   ),
        * 
        *  @OA\Parameter(
        *      name="name",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        *  @OA\Parameter(
        *      name="email",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        *   @OA\Parameter(
        *       name="status",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        *   @OA\Parameter(
        *      name="password",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        *      @OA\Parameter(
        *      name="password_confirmation",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="text"
        *      )
        *   ),
        *   @OA\Response(
        *      response=201,
        *       description="Success",
        *      @OA\MediaType(
        *           mediaType="application/json",
        *      )
        *   ),
        *   @OA\Response(
        *      response=401,
        *       description="Unauthenticated"
        *   ),
        *   @OA\Response(
        *      response=400,
        *      description="Bad Request"
        *   ),
        *   @OA\Response(
        *      response=404,
        *      description="not found"
        *   ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
        *)
        **/
        /**
         * User store
         *
         * @return \Illuminate\Http\Response
         */

        $data = request()->validate([
            'role_id'=>['required','integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'status'=>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'role_id'=>$data['role_id'],
            'name'=>$data['name'],
            'email'=>$data['email'],
            'status'=>$data['status'],
            'password'=>Hash::make($data['password'])
        ]);

        if ($user) {
            emotify('success','Les informations l\'utilisateur ont été enregistrer avec succès');
            return redirect()->route('admin.user.create');
        } else {
            return back();
            emotify('error','Les informations l\'utilisateur ,\'ont pas été enregistrer. Veillez Réessayer!!');
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
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    /**
     * @OA\Get(
     ** path="/admin/user/{user}",
     *   tags={"user"},
     *   summary="user Detail",
     *   operationId="userDetails",
     *   description="La fonction show() permet d'afficher les détails d'un utilisateur.",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
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
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        /**
     * @OA\Put(
     ** path="/admin/user/{user}",
     *   tags={"user"},
     *   summary="Update users",
     *   operationId="putUser",
     *   description="La fonction update() permet de mettre à jour les informations d'un utilisateur.",
     *
     * @OA\Parameter(
     *      name="role_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     * 
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="text"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="text"
     *      )
     *   ),
     *   @OA\Parameter(
     *       name="status",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="text"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="text"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="password_confirmation",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="text"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *       description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/
    
    /**
     * User Update
     *
     * @return \Illuminate\Http\Response
     */
        $data = request()->validate([
            'role_id'=>['required','integer'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'status'=>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        // $user->update([            
        //     'role_id'=>$data['role_id'],
        //     'name'=>$data['name'],
        //     'email'=>$data['email'],
        //     'status'=>$data['status'],
        // ]);

        dd($data);

        if ($user) {
            return redirect()->route('admin.user.index');
            emotify('success','Les informations l\'utilisateur ont été modifier avec succès');
        } else {
            return back();
            emotify('error','Les informations l\'utilisateur n\'ont pas été modifier. Veillez réessayer!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    /**
     * @OA\Delete(
     ** path="/admin/user/{user}",
     *   tags={"user"},
     *   summary="user delete",
     *   operationId="userDelete",
     *   description="La fonction delete() permet de supprimer les informations d'un utilisateur.",
     *
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *)
     **/

        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
