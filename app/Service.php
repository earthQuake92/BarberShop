<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{  			
    protected $fillable = ['Nome','Prezzo','Admin_Id_Admin'];
	protected $primaryKey = 'Id_Service'; // or null
	protected $table ='service';
    public $timestamps = false;



    public function admin()
    {
        return $this->belongsTo('App\Admin', 'foreign_key', 'Admin_Id_Admin');
    }
    
    public function prenotazione()
    {
        return $this->belongsToMany('App\Prenotazione', 'prenotazione_has_service', 'Service_IdService', 'Prenotazione_IdPrenotazione');
    }
}
