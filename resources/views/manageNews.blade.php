@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h3>
            Gerenciar Avisos
        </h3>

        <a class="" href="{{route('admin')}}" role="button">
            <i class="fa fa-undo" aria-hidden="true"></i>
            Voltar
        </a>
    </div>


    <hr>

    <div class="row justify-content-right">
        <div class="col">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 style="padding: 0; margin: 0;">{{ __('Avisos') }}</h5>

                    <div>
                        <a class="btn btn-outline-success btn-sm" data-toggle="modal" id="createNewsButton" data-target="#createNews" data-attr="" title="Criar um usuário">
                            Novo Aviso
                        </a>
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">

                            <caption></caption>

                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Conteúdo</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Publicado em</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                @foreach($newsList as $news)
                                    <th scope="row" style="width: 3%">{{$news->id}}</th>
                                    <td>{{$news->title}}</td>
                                    <td style="padding:0;">
                                        <textarea style="width:100%; height:100%;" class="form-control" readonly>{{$news->article}}</textarea> 
                                    </td>
                                    <td style="width: 11%;">{{$news->name}}</td>

                                    <td style="width: 11%; padding-left: 0.5em; padding-right: 0.5em;">
                                        <samp>{{$news->updated_at}}</samp>
                                    </td>
                                    
                                    <td style="width: 3%; padding: 0.2em; padding-left:0.5em">

                                        <button type="submit" style="padding: 0;border: none;background: none;">
                                            <a href="{{route('admin.deleteNews', ['id' => $news->id] )}}" class="badge badge-danger text-light">Deletar</a>
                                        </button>

                                        <br>

                                        <button type="submit" style="padding: 0;border: none;background: none;">
                                            <a href="#" class="badge badge-success text-light editbtn" title="Editar uma Notícia">Editar
                                            </a>
                                        </button>

                                    </td>
                                </tr>
                                @endforeach
                               


                            </tbody>
                        </table>

                        <ul class="pagination pagination-sm justify-content-end">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Create New News Modal -->
<div class="modal fade" id="createNews" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>
                    {{ __('Criar Aviso') }}
                </h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" id="createUserBody">

                <div class="mx-auto">
                    <form method="POST" action="{{route('admin.createNews')}}">
                        @csrf

                        <!-- Título da Notícia -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <input id="newsTitle" type="text" placeholder="Título" class="form-control" name="title" required autofocus>
                            </div>
                        </div>

                        <!-- Conteúdo -->
                        <div class="form-group">
                            <div class="form-label-group">
                                <textarea id="article" class="form-control" placeholder="Corpo" rows="3" name="article" required></textarea>
                            </div>
                        </div>

                        <!-- Create News Button -->
                        <button type="submit" class="btn btn-primary btn-block mb-2">
                            Criar Aviso
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

