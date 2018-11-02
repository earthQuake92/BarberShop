<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['Id_Template','Impresa_Cod_Impresa'];
	protected $primaryKey = 'Id_Template'; // or null
	protected $table ='template';
    public $timestamps = false;


    public function impresa()
    {
        return $this->belongsTo('App\Impresa', 'Impresa_Cod_Impresa', 'Id_Template');
    }
  
}
