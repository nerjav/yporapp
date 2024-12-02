<?php

namespace App\Http\Requests\Admin\Venta;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateVenta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.venta.edit', $this->ventum);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cliente_id' => ['sometimes', 'string'],
            'total_vidones' => ['sometimes', 'integer'],
            'monto_total' => ['sometimes', 'numeric'],
            'metodo_pago' => ['sometimes', 'string'],
            'monto_abonado' => ['sometimes', 'numeric'],
            'fecha_venta' => ['sometimes', 'date'],
            'estado_venta' => ['sometimes', 'string'],
            'observaciones' => ['nullable', 'string'],
            
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
