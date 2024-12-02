<?php

namespace App\Http\Requests\Admin\Pedido;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePedido extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pedido.edit', $this->pedido);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'fecha_pedido' => ['sometimes', 'date'],
            'estado_id' => ['sometimes', 'string'],
            'tipo_cliente_id' => ['sometimes', 'string'],
            'metodo_pago' => ['nullable', 'string'],
            'total' => ['sometimes', 'numeric'],
            'observacion' => ['nullable', 'string'],
            'cliente_id' => ['sometimes', 'string'],

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
}
