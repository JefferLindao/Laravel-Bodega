<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table = 'tb_ingres';
	protected $primaryKey = 'Ingr_codi';
	public $timestamps = false;

	protected $fillable = [
		'Ingr_tico', 'Ingr_seco', 'Ingr_nuco', 'Ingr_fech', 'Ingr_impu', 'Ingr_esta', 'Ingr_tota','Ingr_resp','Prov_codi'
	];

	protected $guarded =[
		
	];
}
