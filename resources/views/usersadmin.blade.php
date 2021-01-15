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
                Painel Administrativo
            </h3>

            <a class="" href="{{route('home')}}" role="button">
                <i class="fa fa-undo" aria-hidden="true"></i>
                Voltar
            </a>
        </div>


        <hr>

        <div class="row justify-content-right">
            <div class="col">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 style="padding: 0; margin: 0;">{{ __('Usuários') }}</h5>

                        <div>
                            <a class="btn btn-outline-primary btn-sm" data-toggle="modal"
                               id="createUserButton" data-target="#createUser" data-attr=""
                               title="Criar um usuário">
                                Novo Usuário
                            </a>
                            <a href="{{ url('admin/pdf') }}" class="btn btn-sm btn-outline-success">Gerar PDF</a>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">

                                <caption></caption>

                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Data de Criação</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row" style="width: 3%">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->email}}</td>

                                        <td style="width: 20%;">
                                            <samp>
                                                {{$user->created_at}}
                                            </samp>
                                        </td>
                                        <td>{{$user->roles}}</td>
                                        <td style="width: 3%; padding: 0.2em; padding-left:0.5em">

                                            <button type="submit" style="padding: 0;border: none;background: none;">
                                                <a onclick="return confirm('Tem certeza que quer deletar esse usuário(a)?')"
                                                   href="{{route('admin.delete', ['id' => $user->id] )}}"
                                                   class="badge badge-danger text-light">Deletar</a>
                                            </button>

                                            <br>

                                            <button type="submit" style="padding: 0;border: none;background: none;">
                                                <a href="{{route('admin.editUser', ['id' => $user->id] )}}"
                                                   class="badge badge-success text-light editbtn"
                                                    title="Editar um usuário">Editar
                                                </a>
                                            </button>





                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <ul class="pagination pagination-sm justify-content-end">
                                                                <!--  -->
                                {{$users->links()}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Create New User Modal -->
    <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>
                        {{ __('Criar Usuário') }}
                    </h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="createUserBody">

                    <div class="mx-auto">
                        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="name" type="text" placeholder="Nome"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror

                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="username" type="text" placeholder="Usuário"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                    @endif

                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="email" type="email" placeholder="E-mail"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror

                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="password" type="password" placeholder="Senha"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Confirmation -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="password-confirm" type="password" placeholder="Confirme a senha"
                                           class="form-control" name="password_confirmation" required
                                           autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Create User Button -->
                            <button type="submit" class="btn btn-primary btn-block mb-2">
                                Criar Usuário
                            </button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>




    <!-- Edit User Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>
                        {{ __('Editar Usuário') }}
                    </h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="createUserBody">

                    <div class="mx-auto">
                        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="name" type="text" placeholder="{{$user->id}}"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{$user->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror

                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="username" type="text" placeholder="Usuário"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                    @endif

                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="email" type="email" placeholder="E-mail"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror

                                </div>
                            </div>

                            <h5 class="text-muted mt-2">Resetar Senha</h5>

                            <hr class="mt-0">
                            <!-- Password -->
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input id="password" type="password" placeholder="Senha"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Create User Button -->
                            <button type="submit" class="btn btn-success btn-block mb-2">
                                Editar
                            </button>

                            <button type="button" class="btn btn-primary btn-block mb-2" data-dismiss="modal"
                                    aria-label="Close">
                                Voltar
                            </button>

                        </form>

                    </div>

                </div>
            </div>
        </div>

    </div>




@endsection



