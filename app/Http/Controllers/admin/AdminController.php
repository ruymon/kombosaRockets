<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use PDF;
use App\News;
use Illuminate\Support\Facades\Auth;

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
        return redirect('admin/users');
    }

    // Editar Usuário
    public function editUser($id)
    {
        $user_data = DB::table('users')->where('id', $id)->get();
        return view('editUser', compact('user_data'));
    }

    public function updateUser(Request $request, $id)
     {
         $updatedUser = User::find($id);
         $updatedUser->name = $request->name;
         $updatedUser->email = $request->email;
         $updatedUser->username = $request->username;
         $updatedUser->roles = $request->roles;

         $updatedUser->save();

         alert()->html('Aviso!', "O usuário(a) <strong>{$updatedUser->name}</strong> foi atualizado(a).", 'success');
         return redirect('admin/users');

     }

    // Gerar PDF de Usuários
    public function pdf()
    {
        $users = DB::table('users')->get();
        $generate = PDF::loadView('pdf', compact('users'));
        return $generate->setPaper('A4')->stream('usuarios.pdf');
    }

    //News -> ADMIN 
    public function indexNews()
    {
        $newsList = News::all();

        return view('manageNews', compact('newsList'));
    }

    public function createNews(Request $request) 
    {

        $insert = new News();
        $insert->title = $request->title;
        $insert->article = $request->article;
        $insert->author = Auth::user()->id;

        
        $insert->save();

        alert()->html('Aviso!', "O aviso: <strong>{$insert->title}</strong> foi criado.", 'success');
         return redirect('admin/manageNews');
        
    }

}
