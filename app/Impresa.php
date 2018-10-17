<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impresa extends Model
{
    protected $fillable = ['Cod_Impresa','Nome','Indirizzo','Telefono','Ora_apertura','Ora_chiusura','Giorno_libero','Facebook_link','Instagram_link','Personal_site','Admin_Id_Admin'];
    protected $primaryKey = 'Cod_Impresa';
    protected $table ='impresa';
    public $timestamps = false;
    public $incrementing = false;
    

    public function admin(){
        return $this->hasOne('App\Admin', 'foreign_key','Admin_Id_Admin');
    }

    public function clients()
    {
        return $this->hasMany('App\Client', 'Impresa_Cod_Impresa');
    }
}
