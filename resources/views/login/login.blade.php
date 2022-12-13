@extends ('base.index')
@extends('components.navbar')
@extends('components.darkmode')


    <img src="img/gatologin.png" class="imgforms" class="rounded float-start" width="600" height="600" alt="Gato derrubando um vaso de plantas">

    <div class="mx-auto" style="width: 90%;" id="divforms">

        @section('container')
        @if(session('erro'))

        <div class="alert alert-danger my-5" role="alert">{{session('erro')}}</div>
        @endif
            <form action='{{route("login")}}' method='POST'>
                @csrf

    <div id="divnovaconta">
    <div class="forms_log">
        <div class="form-group row">
    <div class="d-flex align-items-center justify-content-center">
        <div class="d-flex flex-column my-5">
            <div class="my-5">
            <h1>Faça login e</h1>
            <h4>list it.</h4>

            <div class="form-floating mb-3">
                <input type="hidden" name="id" class="form-control" id="id" placeholder="" value="">
            </div>

    <div class="my-4">
            <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="email" placeholder="nome@exemplo.com" value="">
        <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="Senha" value="">
        <label for="password">Senha</label>
    </div>

    <div class="d-grid gap-2 col-8 mx-auto">
    @include('components.button', ['type' => 'submit', 'id' => 'btn', 'color' => 'btn btn-outline-dark  my-3', 'text' => 'Conectar-se'])
    </div>

    <p class="mt-3 text-center">Ainda não possui uma conta? <a class="bnt-link-primary text-decoration-none" style="color: #74b06d" href="/novaconta" title=""><b>Criar conta</b></a></p>
</form>
</div>
<div>
</div>
