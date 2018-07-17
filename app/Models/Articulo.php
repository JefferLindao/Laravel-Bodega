<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'tb_articu';
	protected $primaryKey = 'Arti_codi';

	public $timestamps = false;

	protected $fillable = [
		'Arti_seri', 'Arti_nomb', 'Arti_fech', 'Arti_stoc', 'Arti_desc','Arti_tota', 'Arti_imag', 'Arti_esta', 'Cate_codi',
	];
	protected $guarded =[
		//
	];
}
