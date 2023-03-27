<?php

namespace App\Http\Requests\api\Cadastro\Store;

use Illuminate\Foundation\Http\FormRequest;

class AlunosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    // Regras para o request
    public function rules()
    {
        return [
            'chave' => ['required'],
            'nome' => ['required', 'max:100', 'string', 'min:10'],
            'cargo_id' => ['required', 'max:2', 'exists:cargos,id'],
            'idade' => ['required', 'max:2', 'min:2'],
            'situacao' => ['required', 'boolean'],
            'cpf' => ['required', 'max:11', 'min:11', 'unique:alunos'],
            'rg' => ['required', 'max:9', 'min:9', 'unique:alunos'],
            'cep' => ['required', 'max:10', 'min:8'],
            'logradouro' => ['required', 'max:100', 'string', 'min:10'],
            'numero' => ['required', 'max:10'],
            'bairro' => ['required', 'max:50', 'string', 'min:4'],
            'cidade' => ['required', 'max:30', 'string', 'min:4'],
            'estado' => ['required', 'max:2', 'min:2', 'string'],
            'cod_ibge' => ['required', 'max:30'],
            'email' => ['required', 'max:40', 'min:15', 'email', 'unique:alunos'],
            'telResidencia' => ['required', 'max:10', 'min:10'],
            'celular' => ['required', 'max:11', 'min:11'],
            'ano_aprovacao_concurso' => ['required', 'max:4', 'min:4'],
            'escolaridade' => ['required', 'max:1'],
            'area_formacao' => ['required', 'max:100', 'string', 'min:10'],
        ];
    }


    // Mensagens de retorno
    public function messages()
    {
        return [
            // Required
            'chave.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'nome.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'cargo_id.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'idade.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'situacao.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'cpf.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'rg.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'cep.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'logradouro.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'numero.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'bairro.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'cidade.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'estado.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'cod_ibge.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'email.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'telResidencia.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'celular.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'ano_aprovacao_concurso.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'escolaridade.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',
            'area_formacao.required' => 'Erro ao validar campos. O parâmetro :attribute não pode estar vazio.',

            // Max
            'nome.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'cargo.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'idade.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'cpf.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'rg.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'cep.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'logradouro.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'numero.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'bairro.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'cidade.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'estado.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'cod_ibge.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'email.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'telResidencia.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'celular.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'ano_aprovacao_concurso.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'escolaridade.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',
            'area_formacao.max' => 'Erro ao validar campos. O parâmetro :attribute não pode contar uma quantidade de caracteres superior a :max.',

            // Min
            'nome.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'idade.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'cpf.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.', 
            'rg.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.', 
            'cep.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'bairro.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'cidade.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'estado.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'email.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.', 
            'telResidencia.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'celular.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'ano_aprovacao_concurso.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
            'area_formacao.min' => 'Erro ao validar campos. O parâmetro :attribute deve ter ao menos :min caracteres.',
        
            // Boolean
            'situacao.boolean' => 'Erro ao validar campos. O parâmetro :attribute deve ser uma informação booleana.',
            
            // Unique
            'cpf.unique' => 'O campo :attribute já se encontra registrado.',
            'rg.unique' => 'O campo :attribute já se encontra registrado.',
            'email.unique' => 'O campo :attribute já se encontra registrado.',

            // E-mail
            'email.email' => 'O campo :attribute deve receber um e-mail válido.',
        ];
    }

    
    public function prepareForValidation()
    {
        $input = $this->all();

        if($this->has('idade'))
            $input['idade'] = preg_replace("/[^0-9]/", "", $this->get('idade'));

        if($this->has('cpf'))
            $input['cpf'] = preg_replace("/[^0-9]/", "", $this->get('cpf'));

        if($this->has('rg'))
            $input['rg'] = preg_replace("/[^0-9]/", "", $this->get('rg'));

        if($this->has('cep'))
            $input['cep'] = preg_replace("/[^0-9]/", "", $this->get('cep'));

        if($this->has('numero'))
            $input['numero'] = preg_replace("/[^0-9]/", "", $this->get('numero'));

        if($this->has('cod_ibge'))
            $input['cod_ibge'] = preg_replace("/[^0-9]/", "", $this->get('cod_ibge'));

        if($this->has('telResidencia'))
            $input['telResidencia'] = preg_replace("/[^0-9]/", "", $this->get('telResidencia'));

        if($this->has('celular'))
            $input['celular'] = preg_replace("/[^0-9]/", "", $this->get('celular'));

        if($this->has('ano_aprovacao_concurso'))
            $input['ano_aprovacao_concurso'] = preg_replace("/[^0-9]/", "", $this->get('ano_aprovacao_concurso'));

        if($this->has('escolaridade'))
            $input['escolaridade'] = preg_replace("/[^0-9]/", "", $this->get('escolaridade'));

        $this->replace($input);
    }
}