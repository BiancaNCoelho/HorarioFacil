<?php
namespace App\Http\Controllers;
use App\Models\Turma;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Matricula;
use App\Models\Notificacao;

class TurmasController extends Controller
{
    public function index()
    {
        // Lógica para exibir todas as turmas
    }

    public function show($id)
    {
        // Lógica para exibir uma turma específica com base no ID
    }

    public function store(Request $request)
    {
        // Lógica para criar uma nova turma com base nos dados fornecidos no request
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar uma turma específica com base no ID e nos dados fornecidos no request
    }

    public function destroy($id)
    {
        // Lógica para excluir uma turma específica com base no ID
    }
    
}