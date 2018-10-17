<?php

namespace App\Http\Controllers;
use App\Impresa;
use Illuminate\Http\Request;

class ImpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

     /*
        Attivita_commerciale::create([
            'Cod_Attivita' =>'Fireee',
            'Nome' => "Peppino",
            'Indirizzo' => "Di Capri",
            'Telefono' => 3292403737,
            'Ora_apertura' => "jgvgcv",
            'Ora_chiusura'=> "sd",
            'Giorno_libero' => "sd",
            'Facebook_link' => "sd",
            'Instagram_link' => "sd",
            'Personal_site' => "sd",
            'Admin_Id_Admin' => 3
        ]);
       */

        return Impresa::all();
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
        $impresa = Impresa::create($request->all());
        return response()->json($impresa, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Impresa::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $impresa = Impresa::find($id);
        $impresa->update($request->all());
        return response()->json($impresa, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return response()->json(204);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showsAllClientByImpresa($id)
    {
         return Impresa::find($id)->clients;
    }


       /**
     * Display the specified resource.
     *
     * @param  int  $id_impresa
     * @param  int  $id_client
     * @return \Illuminate\Http\Response
     */
    public function showClientByImpresa($id_impresa,$id_client)
    {
      $clients = Impresa::find($id_impresa)->clients->keyBy('Id_Client');
      
      if(isset($clients[$id_client]))
         return response()->json($clients[$id_client],200);
      else
        return response()->json("Errore elemento non presente (da aggiornare con cod 204) ",200);
    }
}
