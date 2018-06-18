<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'tb_detven';
	protected $primaryKey = 'Detv_codi';
	public $timestamps = false;

	protected $fillable = [
		'Detv_cant', 'Detv_prev', 'Detv_decu', 'Detv_movi', 'Arti_codi', 'Vent_codi'
	];

	protected $guarded =[
		
	];
}
