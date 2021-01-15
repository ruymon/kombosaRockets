<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>PDF - Usuários</title>

</head>
<body>

    <img src="{{ public_path('images/logo_badge_new_upright.png') }}" class="float-left p-0 me-0 ml-2" alt="Logo Kombosa Rockets" width="70px">

    <div class="text-right" style="font-family: sans-serif !important;">
        
        <span style="font-size: 20px">Tabela - <samp>Usuários</samp></span>
        <br>
        <span class="text-muted">Portal Kombosa Rocket</span>
    </div>



<hr>

<table class="table table-striped table-bordered table-sm" style="font-size: 12px;">

    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Usuário</th>
            <th scope="col">Email</th>
            <th scope="col">Cargo</th>
            <th scope="col">D/ Criação</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->roles}}</td>
            <td><samp style="font-size: 10px;">{{$user->created_at}}</samp></td>
        </tr>
    @endforeach
    </tbody>
</table>


<footer class="fixed-bottom" style="bottom: 20;">
    <hr class="p-0 m-0">
    <div class="">
        <span style="font-size: 13px"> Usuários </span>
        <br>
        <span class="text-muted" style="font-size: 12px">
                <?php
            $dt = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
            echo 'Documento Emitido: ' . "<samp>" . $dt->format('m/d/Y, H:i:s') . "</samp>";
            ?>
            </span>
    </div>


</footer>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
