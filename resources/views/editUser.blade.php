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
            Painel Admin - Editar Usuário
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
                    <h5 style="padding: 0; margin: 0;">{{ __('Editar Usuário') }}</h5>

                </div>

                    <div class="card-body">
                        <form method="post" action="{{route('admin.updateUser', $user->id) }}">
                        @csrf
                        <!-- Name -->
                            <div class="form-group">
                                <h6 class="text-muted">Nome:</h6>
                                <div class="form-label-group">
                                    <input id="name" type="text" placeholder="Nome"
                                           value="{{$user->name}}"
                                           class="form-control" name="name"
                                            autocomplete="name" autofocus>

                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <h6 class="text-muted">Usuário:</h6>
                                    <input id="username" type="text" placeholder="Usuário"
                                           value="{{$user->username}}"
                                           class="form-control" name="username"
                                           autocomplete="username" autofocus>


                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <h6 class="text-muted">Email:</h6>
                                    <input id="email" type="email" placeholder="E-mail"
                                           class="form-control" name="email"
                                            value="{{$user->email}}"
                                            required autocomplete="email">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="roles">Permissão</label>
                                <select name="roles" id="roles" class="form-control">
                                    <option value="" selected>Selecione</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{$role->id == $user->roles->first()->id ? 'selected' : ''}}>{{ucfirst($role->name)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="me-4">

                            <div class="container">
                                <div class="row">
                                    <div class="col">

{{--                                            <button type="button" href="{{route('admin.noFeature')}}" class="btn btn-danger btn-block m-2">--}}
{{--                                                Resetar Senha--}}
{{--                                            </button>--}}
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-success btn-block m-2">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
