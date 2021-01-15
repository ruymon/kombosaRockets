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

                        @foreach($user_data as $user)
                            <form method="post" action="{{route('admin.updateUser', ['id' => $user->id] ) }}">
                            @csrf

                            <!-- Name -->
                                <div class="form-group">
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
                                        <input id="username" type="text" placeholder="Usuário"
                                               value="{{$user->username}}"
                                               class="form-control" required>


                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input id="email" type="email" placeholder="E-mail"
                                               class="form-control" name="email"
                                                value="{{$user->email}}"
                                                required autocomplete="email">

                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Member Role - Administrador" value="admin" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Administrador
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Member Role - Membro" value="" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Membro
                                    </label>
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

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
