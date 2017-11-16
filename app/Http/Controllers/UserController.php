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
        $this->validate($request,[
                                   'email'=> ['required','max:190', 'unique:users,email'],
                                   ]);
        $client = User::create($request->all());

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
