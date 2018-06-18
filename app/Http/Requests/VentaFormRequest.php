<?php

namespace SisBodega\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'serie_comprobante'=>'max:7',
            'numero_comprobante'=>'required|max:10',
            'cliente'=>'required',
            'articulo' => 'required',
            'cantidad' => 'required',
            'precio_venta' => 'required',
            'descuento' => 'required',
            'total_venta' => 'required',
        ];
    }
}
