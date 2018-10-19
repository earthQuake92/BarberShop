<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['Nome','Cognome','Partita_IVA','Cellulare'];
	protected $primaryKey = 'Id_Admin'; // or null
	protected $table ='admin';
    public $timestamps = false;



	public function impresa(){
		return $this->belongsTo('App\Impresa', 'Id_Admin','Admin_Id_Admin');
	}

    public function services()
    {
        return $this->hasMany('App\Service', 'Admin_Id_Admin');
    }
}

