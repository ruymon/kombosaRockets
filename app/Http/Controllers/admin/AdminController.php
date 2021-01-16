<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use PDF;

class AdminController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $usersCount = DB::table('users')->count();        
        return view('admin', compact('usersCount'));
    }

    public function users()
    {
        $users = DB::table('users')->paginate(10);
        return view('usersadmin', compact('users'));
    }

    // Deletar Usuário
    public function delete($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        DB::table('users')->where('id', $id)->delete();
        alert()->html('Aviso!', "O usuário(a) <strong>{$user->name}</strong> foi deletado(a).", 'info');
        return redirect('admin');
    }

    // Editar Usuário
    public function editUser($id)
    {
        $user_data = DB::table('users')->where('id', $id)->get();
        return view('editUser', compact('user_data'));
    }

    // public function updateUser(Request $request, $id)
    // {
    //     return response()->json($request);
    // }


    //No Feature
    public function noFeature()
    {
        alert()->html('Aviso!', "Infelizmente este recurso ainda não está disponivel!", 'info');

        return redirect('admin');
    }


    // Gerar PDF
    public function pdf()
    {
        $users = DB::table('users')->get();
        $generate = PDF::loadView('pdf', compact('users'));
        return $generate->setPaper('A4')->stream('usuarios.pdf');
    }
}
