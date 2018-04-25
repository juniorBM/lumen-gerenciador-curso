<?php namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunosController extends Controller {

    public function __construct()
    {
        //
    }

    public function adicionarAluno(Request $request)
    {
        $aluno = Aluno::create([
            'nome' => $request->get('nome'),
            'sobrenome' => $request->get('sobrenome'),
            'email' => $request->get('email'),
            'data_nascimento' => $request->get('data_nascimento'),
            'sexo' => $request->get('sexo')
        ]);

        if ($aluno) {
            return response()->json(['status' => 'success', 'retorno' => $aluno], 200);
        }
        return response()->json(['status' => 'error'], 400);
    }

}
