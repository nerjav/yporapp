<?php

namespace App\Http\Requests\Admin\Pedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedido.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'fecha_pedido' => ['nullable'],
            'estado' => ['required'],
            'tipo_cliente' => ['required'],
            'metodo_pago' => ['required'],
            'total' => ['nullable'],
            'observacion' => ['nullable', 'string'],
            'cliente_id' => [''],

        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getmetodopagodId()
     {
       return $this->get('metodo_pago')['id'];
     }

    public function getestadopedidodId()
    {
       return $this->get('estado')['id'];
     }


     public function gettipodeclienteId()
    {
         return $this->get('tipo_cliente')['id'];
     }



}
