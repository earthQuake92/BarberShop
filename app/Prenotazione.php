<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    // 				

    protected $fillable = ['Data','Stato','Client_Id_Client'];
    protected $primaryKey = 'Id_Prenotazione';
    protected $table ='prenotazione';
    public $timestamps = false;
    

    public function client()
    {
        return $this->belongsTo('App\Client', 'foreign_key', 'Client_Id_Client');
    }
    
    public function service()
    {
        return $this->belongsToMany('App\Service', 'prenotazione_has_service', 'Prenotazione_Id_Prenotazione', 'Service_Id_Service');
    }

}
