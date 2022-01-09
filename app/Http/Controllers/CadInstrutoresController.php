<?php

namespace App\Http\Controllers;

use App\Models\instrutore;
use Illuminate\Http\Request;

class CadInstrutoresController extends Controller
{
    public function index()
    {
        $tabela = instrutore::orderby('id', 'desc')->paginate();
        return view('painel-admin.instrutores.index', ['itens' => $tabela]);
    }

    public function create()
    {
        return view('painel-admin.instrutores.create');
    }

    public function insert(Request $request)
    {
        $instrutor = new instrutore();

        return redirect()->route('');
    }
}
