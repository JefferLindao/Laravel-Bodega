<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
	protected $table = 'tb_deting';
	protected $primaryKey = 'Deti_codi';

	public $timestamps = false;

	protected $fillable = [
		'Deti_cant', 'Deti_prec', 'Deti_prev', 'Deti_movi', 'Arti_codi', 'Ingr_codi'
	];

	protected $guarded =[
		
	];
}
