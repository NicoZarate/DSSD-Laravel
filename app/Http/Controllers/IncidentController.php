<?php

namespace App\Http\Controllers;
use Auth;
use App\Incident;
use App\Objeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id = Auth::user()->id;
        $incidents = Incident::all()->where('user_id',$id);
        return view('incidents/incidents', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incidents/agregarIncidente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      /*  $this->validate($request,['fecha'=> ['required'],
                                   'tipo'=> ['required'],
                                   'cantidad'=> ['required'],
                                   'descripcion'=> ['required','max:250']
                                   ]);
*/        $objetos = $request->get('objetos');
          $incidente=Incident::create(['user_id'=> Auth::user()->id,
                           'tipo'=> $request->get('tipo'),
                           'fecha'=> $request->get('from'),
                           'cantidad'=> count($objetos)/3,
                           'descripcion'=> $request->get('descripcion'),
                           'estado'=> 'Nuevo'
                           ]);
         $id= $incidente->id;
        for( $i= 0 ; $i < count($objetos) ; $i=$i + 3) {

               
                   Objeto::create([
                           'nombre'=> $objetos[$i],
                           'descripcionObjeto'=>$objetos[$i+1] ,
                           'cantidadObjeto'=> $objetos[$i+2],
                           'incident_id'=> $id           
                          ]);
            
            }
       
       return redirect('incidents')
            ->with('status', 'success')
            ->with('message', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        //
        return view('incidents/incidente', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Incident  $incident
     * @return \Illuminate\Http\Response
     */

    public function peticiones()
    {
        //'username=evaluador1&password=bpm&redirect=false&redirectURL='
        $client = new Client([
   
            'base_uri' => 'http://localhost:8080/bonita/',
            
            'timeout'  => 2.0,
             ]);
        $headers = ['Content-Type' => 'application/x-www-form-urlencoded'];
        $body = ['username' => 'evaluador1',
                 'password' => 'bpm',
                 'redirect' => false];
                 
        $response = $client->request('GET', '/API/bpm/process?p=0&c=10');
        dd($response);
    }






    public function edit(Incident $incident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        //
    }
}
