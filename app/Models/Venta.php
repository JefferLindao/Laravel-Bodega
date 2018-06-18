<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'tb_venta';
	protected $primaryKey = 'Vent_codi';

	public $timestamps = false;

	protected $fillable = [
		'Vent_tico', 'Vent_seco', 'Vent_nuco', 'Vent_fech', 'Vent_impu', 'Vent_esta','Vent_tove', 'Clie_codi'
	];

	protected $guarded =[
		
	];
}
