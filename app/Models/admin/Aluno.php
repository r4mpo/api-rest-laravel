<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    // Adicionando ao fillable pois assim podemos manipular os dados
    protected $fillable = [

        // Informações que irão na tabela
        'nome',
        
        // "Aluno"
        'cargo_id',
        'idade',
        'situacao',

        // Documento
        'cpf',
        'rg',

        // Endereço
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'cod_ibge',

        // Contatos
        'email',
        'telResidencia',
        'celular',

        // Informações adicionais
        'ano_aprovacao_concurso',
        'escolaridade',
        'area_formacao'
    ];

    // Situações
    const SITUACAO_APROVADO = 1;
    const SITUACAO_REPROVADO = 0;

    // Escolaridade
    const ESCOLARIDADE_FUNDAMENTAL_INCOMPLETO = 0;
    const ESCOLARIDADE_FUNDAMENTAL_COMPLETO = 1;
    const ESCOLARIDADE_MEDIO_INCOMPLETO = 2;
    const ESCOLARIDADE_MEDIO_COMPLETO = 3;
    const ESCOLARIDADE_SUPERIOR_INCOMPLETO = 4;
    const ESCOLARIDADE_SUPERIOR_COMPLETO = 5;

    // pegar cargo
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }

    // pegar situacao
    public function getSituacao()
    {
        switch ($this->situacao) {
            case self::SITUACAO_APROVADO:
                return 'Aprovado';
            case self::SITUACAO_REPROVADO:
                return 'Reprovado';
        }
    }

    // pegar escolaridade
    public function getEscolaridade()
    {
        switch ($this->escolaridade) {
            case self::ESCOLARIDADE_FUNDAMENTAL_INCOMPLETO:
                return 'Ensino fundamental incompleto';
            case self::ESCOLARIDADE_FUNDAMENTAL_COMPLETO:
                return 'Ensino fundamental completo';
            case self::ESCOLARIDADE_MEDIO_INCOMPLETO:
                return 'Ensino médio incompleto';
            case self::ESCOLARIDADE_MEDIO_COMPLETO:
                return 'Ensino médio completo';
            case self::ESCOLARIDADE_SUPERIOR_INCOMPLETO:
                return 'Ensino superior incompleto';
            case self::ESCOLARIDADE_SUPERIOR_COMPLETO:
                return 'Ensino superior completo';
        }
    }
}