<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giorno extends Model
{
    protected $fillable = ['Id_Giorno','Index','Template_Id_Template'];
	protected $primaryKey = 'Id_Giorno'; // or null
	protected $table ='giorno';
    public $timestamps = false;



    public function template()
    {
        return $this->belongsTo('App\Template', 'Template_Id_Template', 'Id_Template');
    }
    
    public function orario()
    {
        return $this->belongsToMany('App\Orario', 'giorno_has_orario', 'Giorno_Id_Giorno', 'Orario_Id_Orario');
    }

}
