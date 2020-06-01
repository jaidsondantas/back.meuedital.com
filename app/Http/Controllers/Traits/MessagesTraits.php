<?php
namespace App\Http\Controllers\Traits;

trait MessagesTraits
{
    public  function getArrayMessagesValidate()
    {
        return [
            'required' => 'O :attribute é requerido',
            'email' => 'O :attribute estar em um formato inválido.',
            'string' => 'O :attribute precisa ser do tipo texto.',
            'same' => 'The :attribute and :other must match.',
            'size' => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute value :input is not between :min - :max.',
            'in' => 'The :attribute must be one of the following types: :values.',
            'confirmed' => 'O :attribute não está identico.',
            'unique' => 'O :attribute enviado já está cadastrado.',
            'exists' => 'O :attribute selecionado é inválido'
        ];
    }
}
