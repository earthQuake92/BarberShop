<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();

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
         $client = Client::create($request->all());
         return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Client::find($id);
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
    public function update(Request $request,$id)
    {
      
       $client = Client::find($id);
       $client->update($request->all());
       return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return response()->json(204);
    }


     
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showsAllPrenotazioniByClient($id)
    {
         return Client::find($id)->prenotazioni;
    }


       /**
     * Display the specified resource.
     *
     * @param  int  $id_client
     * @param  int  $id_prenotazione
     * @return \Illuminate\Http\Response
     */
    public function showPrenotazioneByClient($id_client,$id_prenotazione)
    {
        $prenotazioni = Client::find($id_client)->prenotazioni->keyBy('Id_Prenotazione');
      
      if(isset($services[$id_prenotazione]))
         return response()->json($prenotazioni[$id_prenotazione],200);
      else
        return response()->json("Errore elemento non presente (da aggiornare con cod 204) ",200);
    }
}
