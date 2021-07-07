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
        $this->middleware('role:admin');
    }



    public function indexNews()
    {
        $newsList = News::with('author')->get();

        return view('manageNews', compact('newsList'));
    }

    public function createNews(Request $request)
    {

//        $insert = new News();
//        $insert->title = $request->title;
//        $insert->article = $request->article;
//        $insert->author = Auth::user()->id;
//
//        $insert->save();

        $request['user_id'] = auth()->user()->id;

        $article = News::create($request->all());

        alert()->html('Aviso!', "O aviso: <strong>{$article->title}</strong> foi criado.", 'success');

        return redirect('admin/manageNews');

    }

    public function deleteNews(News $news)
    {
        $news->delete();

        alert()->html('Aviso!', "O aviso <strong>{$news->title}</strong> foi deletado.", 'info');
        return redirect('admin/manageNews');
    }
}
