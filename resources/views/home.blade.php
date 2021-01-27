@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <h2 class="mb-2">Portal do Membro</h2>


                <h5 class=" mt-3 mb-2">Olá, {{ Auth::user()->name }} !</h5>
                <span class="text-muted">
                Aqui você pode criar e consultar relatórios.<br>
                Em caso de dúvida não hesite em entrar em contato com o desenvolvedor.
                </span>
                
                <hr class="mt-3 mb-4">


                <div class="row">

                    <!-- Avisos -->
                    <div class="col-md-3 col-sm-4">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="#">
                                <div class="wrimagecard-topimage_header"
                                     style="background-color:  rgba(250, 188, 9, 0.1)">
                                    <center><i class="fa fa-info-circle" style="color:#fabc09"> </i></center>
                                </div>
                                <div class="wrimagecard-topimage_title">
                                    <h4>Avisos
                                        <div class="pull-right badge" id="WrInformation"></div>
                                    </h4>
                                </div>

                            </a>
                        </div>
                    </div>

                    <!-- Calendar -->
                    <div class="col-md-3 col-sm-4">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="#">
                                <div class="wrimagecard-topimage_header"
                                     style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><i class="fa fa-calendar" style="color:#16A085"></i></center>
                                </div>
                                <div class="wrimagecard-topimage_title">
                                    <h4>Calendário
                                        <div class="pull-right badge" id="WrControls"></div>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Old Reports -->

                    <div class="col-md-3 col-sm-4">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="#">
                                <div class="wrimagecard-topimage_header"
                                     style="background-color:rgba(187, 120, 36, 0.1) ">
                                    <center><i class="fa fa-database" style="color:#BB7824"></i></center>
                                </div>
                                <div class="wrimagecard-topimage_title">
                                    <h4>Relatórios Antigos
                                        <div class="pull-right badge"></div>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>



                    <!-- Create New Report -->

                    <div class="col-md-3 col-sm-4">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="#">
                                <div class="wrimagecard-topimage_header"
                                     style="background-color:  rgba(51, 105, 232, 0.1)">
                                    <center><i class="fa fa-pencil-square-o" style="color:#3369e8"> </i></center>
                                </div>
                                <div class="wrimagecard-topimage_title">
                                    <h4>
                                        Novo Relatório
                                        <div class="pull-right badge" id="WrGridSystem"></div>
                                    </h4>
                                </div>

                            </a>
                        </div>
                    </div>

                @if($is_admin)

                    <!-- Admin Panel -->
                    <div class="col-md-3 col-sm-4">
                        <div class="wrimagecard wrimagecard-topimage">
                            <a href="{{route('admin')}}">
                                <div class="wrimagecard-topimage_header"
                                     style="background-color:  rgba(213, 15, 37, 0.1)">
                                    <center><i class="fa fa-shield" style="color:#d50f25"> </i></center>
                                </div>
                                <div class="wrimagecard-topimage_title">
                                    <h4>
                                        Painel Administrativo
                                        <div class="pull-right badge" id="WrForms"></div>
                                    </h4>
                                </div>

                            </a>
                        </div>
                    </div>

                @endif







                </div>

            </div>
        </div>
    </div>

    <style>
        .bg-lightRed {
            background-color: rgba(255, 179, 173, 0.1);
            border: 1px solid #e3342f;
        }

        .bg-lightBlue {
            background-color: rgba(128, 221, 255, 0.1);
            border: 1px solid #3490dc;
        }

        .bg-lightGreen {
            background-color: rgba(108, 244, 165, 0.1);
            border: 1px solid #38c172;
        }

        .wrimagecard {
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: left;
            position: relative;
            background: #fff;
            box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .wrimagecard .fa {
            position: relative;
            font-size: 70px;
        }

        .wrimagecard-topimage_header {
            padding: 20px;
        }

        a.wrimagecard:hover, .wrimagecard-topimage:hover {
            box-shadow: 2px 4px 8px 0px rgba(46, 61, 73, 0.2);
        }

        .wrimagecard-topimage a {
            width: 100%;
            height: 100%;
            display: block;
        }

        .wrimagecard-topimage_title {
            padding: 20px 24px;
            height: 80px;
            padding-bottom: 0.75rem;
            position: relative;
        }

        .wrimagecard-topimage a {
            border-bottom: none;
            text-decoration: none;
            color: #525c65;
            transition: color 0.3s ease;
        }


    </style>

@endsection
