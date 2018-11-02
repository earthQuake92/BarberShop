<?php

namespace App\Http\Controllers;
use App\Template;
use App\Giorno;
use App\Orario;
use Debugbar;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
      /**
     * Store a newly created resource in storage.
     *
     * @param string $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {     
       $template = Template::firstOrCreate(["Impresa_Cod_Impresa"=>$id]);
       foreach($request->Template as $value){
         $giorno = Giorno::updateOrCreate(["Index"=>$value['Index'],"Template_Id_Template"=>$template->Id_Template]);
            foreach($value['Orari'] as $orario){
               $id= !isset($orario['Id_Orario']) ? NULL : array('Id_Orario'=>$orario['Id_Orario']);
               $new_orario = self::createOrUpdateOrario([
                             "Nome"=>$orario['Nome'],
                             "Da"=>$orario['Da'],
                             "A"=>$orario['A'],
                             "Template_Id_Template"=>$template->Id_Template],$id,$giorno);
             }
         }
        return response()->json("Operazione avvenuta con successo", 201);
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param string $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {     
       $template = Template::where("Impresa_Cod_Impresa",$id)->first();
       foreach (Giorno::where('Template_Id_Template',$template->Id_Template)->cursor() as $giorno) {
            foreach($giorno->orario->keyBy('Orario_Id_Orario') as $orario){
                $orari[]=array("Nome"=>$orario['Nome'],"Da"=>$orario['Da'],"A"=>$orario['A']);
            }
            $giorni[]=array("Index"=>$giorno['Index'],"Orari"=>$orari);
            unset($orari);
        }
        $return['Template']=$giorni;
        return response()->json($return, 201);
    }

    
  
    public function createOrUpdateOrario($orario,$id,$giorno){
      !isset($id) ? $giorno->orario()->attach(Orario::create($orario)) : Orario::updateOrCreate($id,$orario);
    }

}
