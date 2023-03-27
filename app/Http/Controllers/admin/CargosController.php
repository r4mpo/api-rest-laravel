<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Cargo;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    public function index()
    {
        if (request('chave') == base64_encode('pcsp_')) {
            try {
                $buscarCargosNoBancoDeDados = Cargo::all();
                $cargos = $buscarCargosNoBancoDeDados->map(function ($cargo) {
                    return [
                        'id' => $cargo->id,
                        'nome' => $cargo->nome,
                        'escolaridade' => $cargo->escolaridade,
                        'remuneracao' => $cargo->formatarMoedaEmReais(),
                        'alunos' => $cargo->alunos,
                    ];
                });
                return response()->json([
                    'status' => true,
                    'mensagem' => 'Registros de cargos recuperados com sucesso.',
                    'cargos' => $cargos
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'situacao' => 'Houve um erro ao executar a operação.',
                    'mensagem' => $th->getMessage()
                ]);
            }
        } else {
            return response()->json(['mensagem' => 'Chave de acesso incorreta. Acesso não autorizado.']);
        }
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
