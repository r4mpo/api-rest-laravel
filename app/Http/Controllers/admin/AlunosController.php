<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\Cadastro\Store\AlunosRequest as Cadastrar;
use App\Http\Requests\api\Cadastro\Update\AlunosRequest as Atualizar;
use App\Models\admin\Aluno;

class AlunosController extends Controller
{
    public function index()
    {
        if (request('chave') == base64_encode('pcsp_')) {
            try {
                $buscarAlunosNoBancoDeDados = Aluno::all();
                $alunos = $buscarAlunosNoBancoDeDados->map(function ($aluno) {
                    return [
                        'id' => $aluno->id,
                        'nome' => $aluno->nome,
                        'cargo' => $aluno->cargo->nome,
                        'idade' => $aluno->idade,
                        'situacao' => $aluno->getSituacao(),
                        'cpf' => $aluno->cpf,
                        'rg' => $aluno->rg,
                        'cep' => $aluno->cep,
                        'logradouro' => $aluno->logradouro,
                        'numero' => $aluno->numero,
                        'bairro' => $aluno->bairro,
                        'cidade' => $aluno->cidade,
                        'estado' => $aluno->estado,
                        'cod_ibge' => $aluno->cod_ibge,
                        'email' => $aluno->email,
                        'telResidencia' => $aluno->telResidencia,
                        'celular' => $aluno->celular,
                        'ano_aprovacao_concurso' => $aluno->ano_aprovacao_concurso,
                        'escolaridade' => $aluno->getEscolaridade(),
                        'area_formacao' => $aluno->area_formacao,
                    ];
                });
                return response()->json([
                    'status' => true,
                    'mensagem' => 'Registros de alunos recuperados com sucesso.',
                    'alunos' => $alunos
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

    public function store(Cadastrar $request)
    {
        if (request('chave') == base64_encode('spcp_')) {
            try {
                $aluno = Aluno::create($request->all());
                return response()->json([
                    'aluno' => $aluno,
                    'mensagem' => 'Registro de aluno cadastrado com sucesso.',
                    'status' => true
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'situacao' => 'Houve um erro ao executar a operação.',
                    'mensagem' => $th->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'mensagem' => 'Chave de acesso incorreta. Acesso não autorizado.'
            ]);
        }
    }

    public function show($id)
    {
        if (request('chave') == base64_encode('pscp_')) {
            try {
                $aluno = Aluno::findOrFail(base64_decode($id));
                return response()->json([
                    'status' => true,
                    'mensagem' => 'Registro de aluno recuperado com sucesso.',
                    'aluno' => [
                        'id' => $aluno->id,
                        'nome' => $aluno->nome,
                        'cargo' => $aluno->cargo->nome,
                        'idade' => $aluno->idade,
                        'situacao' => $aluno->getSituacao(),
                        'cpf' => $aluno->cpf,
                        'rg' => $aluno->rg,
                        'cep' => $aluno->cep,
                        'logradouro' => $aluno->logradouro,
                        'numero' => $aluno->numero,
                        'bairro' => $aluno->bairro,
                        'cidade' => $aluno->cidade,
                        'estado' => $aluno->estado,
                        'cod_ibge' => $aluno->cod_ibge,
                        'email' => $aluno->email,
                        'telResidencia' => $aluno->telResidencia,
                        'celular' => $aluno->celular,
                        'ano_aprovacao_concurso' => $aluno->ano_aprovacao_concurso,
                        'escolaridade' => $aluno->getEscolaridade(),
                        'area_formacao' => $aluno->area_formacao,
                    ]
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'situacao' => 'Houve um erro ao executar a operação.',
                    'mensagem' => $th->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'mensagem' => 'Chave de acesso incorreta. Acesso não autorizado.'
            ]);
        }
    }

    public function update(Atualizar $request, $id)
    {
        if (request('chave') == base64_encode('ppsc_')) {
            try {
                Aluno::findOrFail(base64_decode($id))->update($request->all());
                return response()->json([
                    'aluno' => Aluno::findOrFail(base64_decode($id)),
                    'mensagem' => 'Registro de aluno atualizado com sucesso.',
                    'status' => true
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'situacao' => 'Houve um erro ao executar a operação.',
                    'mensagem' => $th->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'mensagem' => 'Chave de acesso incorreta. Acesso não autorizado.'
            ]);
        }
    }

    public function destroy($id)
    {
        if (request('chave') == base64_encode('scpp_')) {
            try {
                Aluno::findOrFail(base64_decode($id))->delete();
                return response()->json([
                    'status' => true,
                    'mensagem' => 'Registro de aluno excluído com sucesso.'
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'situacao' => 'Houve um erro ao executar a operação.',
                    'mensagem' => $th->getMessage()
                ]);
            }
        } else {
            return response()->json([
                'mensagem' => 'Chave de acesso incorreta. Acesso não autorizado.'
            ]);
        }
    }
}