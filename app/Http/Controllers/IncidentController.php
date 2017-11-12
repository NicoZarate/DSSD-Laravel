<?php

namespace App\Http\Controllers;
use Auth;
use App\Incident;
use App\Objeto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Cookie\SessionCookieJar;
use GuzzleHttp\Cookie\CookieJar;

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
       try {  
            $cookieJar = new SessionCookieJar('MiCookie', true);    
            $client = new Client([
                'base_uri' => 'http://localhost:8080/bonita/',
                'timeout'  => 4.0,
                'cookies' => $cookieJar
            ]);   


            //logeo con bonita
            $response = $client->request('POST', 'loginservice', [
                    'form_params' => [
                    'username' => 'evaluador1',
                    'password' => 'bpm',
                    'redirect' => 'false',
                     'redirectURL' => '' 
                    ]
                ]);
            $token = $cookieJar->getCookieByName('X-Bonita-API-Token');
            $_SESSION['X-Bonita-API-Token'] = $token->getValue();
            //consegir el id proceso ,pasado por bonita
            $request = $client->request('GET', 'API/bpm/process?c=10&p=0');
            $tareas = $request->getBody();
            $idProceso=json_decode($tareas)[0]->id;
            //agregar caso a bonita
             $request = $client->request('POST', 'API/bpm/case',
                        ['headers' => [
                            'X-Bonita-API-Token' => $_SESSION['X-Bonita-API-Token']
                            ],
                         'json' => [
                            'processDefinitionId' => $idProceso,  
                             'variables' =>[
                                 "name"=>"incidenciaId",
                                 "value"=>"1"
                               ] 
                             ]              
                        ]);

            } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $error = Psr7\str($e->getResponse());
            } else {
                $error = "No se puede conectar al servidor de Bonita OS";
            }

            return $error;
        }
        /*
                            "variables" => [
                                "name"=>"incidenciaId",
                                "value"=>"1"
                                  ]
                            ]  */
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
