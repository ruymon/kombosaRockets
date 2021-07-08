<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RequestCreate;
use App\Notifications\NewAccount;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use PDF;
use App\News;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function dataCount()
    {
        $usersCount = User::count();
        $newsCount = News::count();

        return view('admin', compact('usersCount', 'newsCount'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('create', compact('roles'));
    }

    public function store(RequestCreate $request)
    {
        $user = User::create($request->validated());
        $user->roles()->attach($request->roles);
        $user->notify(new NewAccount());

        return back();
    }

    public function users()
    {
        $roles = Role::all();
        $users = User::paginate(10);
        return view('usersadmin', compact('users','roles'));
    }

    // Deletar Usuário
    public function delete(User $user)
    {
        $user->delete();
        alert()->html('Aviso!', "O usuário(a) <strong>{$user->name}</strong> foi deletado(a).", 'info');
        return redirect('admin/users');
    }

    // Editar Usuário
    public function editUser(User $user)
    {
        $roles = Role::all();
        return view('editUser', compact('user','roles'));
    }

    public function updateUser(Request $request, User $user)
     {
//         $updatedUser = User::find($id);
//         $updatedUser->name = $request->name;
//         $updatedUser->email = $request->email;
//         $updatedUser->username = $request->username;
//         $updatedUser->roles = $request->roles;
//
//         $updatedUser->save();
        $user->update($request->all());

        if($request->roles) {
            $user->roles()->sync($request->roles);
        }

         alert()->html('Aviso!', "O usuário(a) <strong>{$user->name}</strong> foi atualizado(a).", 'success');
         return redirect('admin/users');

     }

    // Gerar PDF de Usuários
    public function pdf()
    {
        $users = User::all();
        $generate = PDF::loadView('pdf', compact('users'));
        return $generate->setPaper('A4')->stream('usuarios.pdf');
    }
}
