<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'tb_person';
	protected $primaryKey = 'Pers_codi';

	public $timestamps = false;

	protected $fillable = [
		'Pers_tipe','Pers_nomb', 'Pers_tido', 'Pers_nudo','Pers_dire','Pers_tele','Pers_emai',
	];

	protected $guarded =[
		
	];
}
