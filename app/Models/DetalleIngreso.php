<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
	protected $table = 'tb_deling';
	protected $primaryKey = 'Deli_codi';

	public $timestamps = false;

	protected $fillable = [
		'Deli_cant', 'Deli_prec', 'Deli_prev', 'Arti_codi', 'Ingr_codi',
	];

	protected $guarded =[
		
	];
}
