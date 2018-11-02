<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orario extends Model
{
    
    protected $fillable = ['Id_Orario','Nome','Da','A','Template_Id_Template'];
	protected $primaryKey = 'Id_Orario'; 
	protected $table ='orario';
    public $timestamps = false;



    
    public function template()
    {
        return $this->belongsTo('App\Template', 'Template_Id_Template', 'Id_Template');
    }

    public function giorno()
    {
        return $this->belongsToMany('App\Giorno', 'giorno_has_orario', 'Giorno_Id_Giorno', 'Orario_Id_Orario');
    }


}


