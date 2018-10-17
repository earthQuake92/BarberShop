<?php

namespace App\Http\Controllers;
use App\Prenotazione;
use App\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PrenotazioneController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Prenotazione::all();
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
     * service[0]=1 service[1]=4...
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
       
        try{
             $prenotazione = Prenotazione::create($request->all());
             $prenotazione->service()->attach($request->service);
             if($prenotazione->service()->count()==count($request->service))
               return response()->json($prenotazione, 201);
             else
              throw Exception;
        }catch(\Exception $ex){ 
          return response()->json('ERRORE'.$ex, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Prenotazione::find($id);
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
      
       $prenotazione = Prenotazione::find($id);
       $prenotazione->update($request->all());
       return response()->json($prenotazione, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
       try{
            $prenotazione = Prenotazione::find($id);
            $prenotazione->service()->detach();;
            if($prenotazione->service()->count()==0){
              Prenotazione::destroy($id);
              return response()->json("ELIMINATA", 201);
            }
            else
             throw Exception;
       }catch(\Exception $ex){ 
         return response()->json('ERRORE'.$ex, 201);
       }
    }


}
