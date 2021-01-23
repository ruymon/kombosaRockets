<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\News;
use Illuminate\Support\Facades\Auth;

class AdminNewsController extends Controller
{
    // Auth
    public function __construct()
    {
        $this->middleware('admin');
    }



    public function indexNews()
    {
        $newsList = DB::table('table_news')
                    ->join('users', 'table_news.author', '=', 'users.id')
                    ->select('table_news.id', 'table_news.title', 'table_news.article', 'users.name', 'table_news.updated_at')
                    ->get();
            
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

    public function deleteNews($id)
    {
        $news = DB::table('table_news')->where('id', $id)->first();
        DB::table('table_news')->where('id', $id)->delete();

        alert()->html('Aviso!', "O aviso <strong>{$news->title}</strong> foi deletado.", 'info');
        return redirect('admin/manageNews');
    }
}
