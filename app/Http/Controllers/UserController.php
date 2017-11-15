<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('manager');
    
    }


    public function index(Request $request)
    {   //$roles = Role::all();
        //$users = User::name($request->get('username'),$request->get('role_id'))
        //              ->where('up',1)
        //              ->paginate($this->paginado);
        //return view('user/list', compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        echo($request->name);
        $this->validate($request,['name'=> ['required','max:190'],
                                   'email'=> ['required','max:190', 'unique:users,email'],
                                   'password'=> ['required','max:190', 'confirmed'],
                                   'password_confirmation'=> ['required','max:190'],
                                   'lastname'=> ['required','max:190'],
                                   'dni'=> ['required','max:190'],
                                   'phone'=> ['required','max:190'],
                                   ]);
        $client = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'lastname'=> $request->lastname,
                        'dni'=> $request->dni,
                        'phone'=> $request->phone,                    
                        ]);
        $client->roles()->attach(Role::where('name', 'client')->first());
       
        return redirect('/')
            ->with('status', 'success')
            ->with('message', 'Usuario creado exitosamente');
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

}
