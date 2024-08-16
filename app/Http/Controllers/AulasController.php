<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;

class AulasController extends Controller
{
    public function index()
    {
        $aulas = Aula::all();
        return response()->json($aulas);
    }
    public function store(Request $request)
    {
        $aula = Aula::create($request->all());
        return response()->json($aula, 201);
    }
}
