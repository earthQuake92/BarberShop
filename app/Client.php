<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['Nome','Impresa_Cod_Impresa'];
    protected $primaryKey = 'Id_Client'; // or null
    protected $table ='client';
    public $timestamps = false;



    public function prenotazioni()
    {
        return $this->hasMany('App\Prenotazione', 'Client_Id_Client');
    }
}
