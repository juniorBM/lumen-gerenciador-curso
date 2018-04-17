<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{

    public function __construct()
    {
        //
    }

    public function adicionarCurso(Request $request)
    {
        $curso = Curso::create([
            'nome' => $request->get('nome'),
            'descricao' => $request->get('descricao')
        ]);

        if ($curso) {
            return response()->json(['status' => 'success', 'retorno' => $curso], 200);
        }
        return response()->json(['status' => 'error'], 400);
    }

    public function todosCursos()
    {
        $cursos = Curso::all();

        return response()->json(['status' => 'success', 'retorno' => $cursos], 200);
    }

    public function editarCurso($id)
    {
        if ($id) {
            $curso = Curso::find($id);
            return response()->json(['status' => 'success', 'retorno' => $curso], 200);
        } else {
            return response()->json(['status' => 'error', 'retorno' => 'Curso não encontrado'], 404);
        }
    }

    public function salvarCurso($id, Request $request)
    {
//        return response()->json(['status' => 'success', 'retorno' => $id], 200);
        if ($id) {
            $curso_alterado = Curso::find($id);
//            return response()->json(['status' => 'success', 'retorno' => $request->get('id')], 200);
            if ($curso_alterado) {
                $curso_alterado->nome = $request->get('nome');
                $curso_alterado->descricao = $request->get('descricao');
                $curso_alterado->save();
                return response()->json(['status' => 'success', 'retorno' => 'Curso alterado com suceso!'], 200);
            } else {
                return response()->json(['status' => 'error', 'retorno' => 'Esse curso não existe!'], 401);
            }
        } else {
            return response()->json(['status' => 'error', 'retorno' => 'Erro'], 400);
        }
    }

    public function deletarCurso($id)
    {
        if ($id) {
            Curso::find($id)->delete();
            return response()->json(['status' => 'success', 'retorno' => 'Curso deletado com suceso!'], 200);
        }

        return response()->json(['status' => 'error', 'retorno' => 'Erro!'], 400);
    }

}
