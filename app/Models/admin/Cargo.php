<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'escolaridade',
        'remuneracao'
    ];

    public function alunos()
    {
        return $this->hasMany(Aluno::class, 'cargo_id');
    }

    public function formatarMoedaEmReais()
    {
        return 'R$ ' . number_format(($this->remuneracao / 100), 2, ',', '.');
    }
}