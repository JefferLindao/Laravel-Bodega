<?php

namespace SisBodega\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = 'tb_catego';
	protected $primaryKey = 'Cate_codi';

	public $timestamps = false;

	protected $fillable = [
		'Cate_nomb', 'Cate_desc', 'Cate_cond',
	];

	protected $guarded =[
		
	];
}
