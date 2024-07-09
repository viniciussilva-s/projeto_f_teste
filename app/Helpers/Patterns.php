<?php

use Illuminate\Validation\Rule;

// use Auth;

if(!function_exists('responsePattern')) {
    function responsePattern()
    {
        return ['status' => 'error', 'message' => 'Ocorreu um erro.'];
    }
}

if(!function_exists('messages')) {
    function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute deve ser um e-mail válido',
            'file' => 'O campo :attribute deve ser um arquivo',
            'image' => 'O campo :attribute deve ser uma imagem (png, jpg, jpeg, gif, webp)',
            'integer' => 'O campo :attribute é numérico inteiro',
            'max' => 'O campo :attribute deve possuir um valor menor ou igual a :value',
            'min' => 'O campo :attribute deve possuir um valor maior ou igual a :value',
            'mimes' => 'O campo :attribute de possuir arquivos dos tipos: :values',
            'numeric' => 'O campo :attribute é numérico',
            'password' => 'O campo :attribute é uma senha válida',
            'size' => 'O campo :attribute deve possuir seu tamanho igual a :value',
            'string' => 'O campo :attribute é do tipo texto',
            'bool' => 'O campo :attribute deve ser verdadeiro ou falso, 0 ou 1, sim ou não',
            'unique' => "O campo :attribute deve ser exclusivo"
        ];
    }
}

if(!function_exists('modeRules')) {
    function modeRules()
    {
        return ['mode'=>['required', Rule::in(['create','edit'])]];
    }
}
