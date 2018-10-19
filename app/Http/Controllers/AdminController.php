<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;

//  php artisan migrate:generate admin ricordare
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Admin::all();

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
         $admin = Admin::create($request->all());
         return response()->json($admin, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Admin::find($id);
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
      
       $admin = Admin::find($id);
       $admin->update($request->all());
       return response()->json($admin, 200);
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
    public function showsAllServiceByAdmin($id)
    {
         return Admin::find($id)->services;
    }


       /**
     * Display the specified resource.
     *
     * @param  int  $id_admin
     * @param  int  $id_service
     * @return \Illuminate\Http\Response
     */
    public function showServiceByAdmin($id_admin,$id_service)
    {
      $services = Admin::find($id_admin)->services->keyBy('Id_Service');
      
      if(isset($services[$id_service]))
         return response()->json($services[$id_service],200);
      else
        return response()->json("Errore elemento non presente (da aggiornare con cod 204) ",200);
    }


         /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showImpresaByAdmin($id){
    
     $impresa = Admin::find($id)->impresa;
      
      if(isset($impresa))
         return response()->json($impresa,200);
      else
        return response()->json("Errore elemento non presente (da aggiornare con cod 204) ",200);
    }
}
