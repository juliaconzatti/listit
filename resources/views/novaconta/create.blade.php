@extends ('base.index')
@extends('components.navbar')


    <img src="img/teste.jpg" class="imgforms" class="rounded float-start" width="500" height="500" alt="...">


<form action='/novacontaconta/store' method='POST'>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' />



    <div id="divnovaconta">
    <div class="forms_log">
        <div class="form-group row">
    <div class="d-flex align-items-center justify-content-center">
        <div class="d-flex flex-column my-5">
            <div class="my-5">
            <h1>jghjnhgj</h1>
            <p>hmnhjm</p>


    @include('components.field', [
        'type' => 'hidden',
        'id' => 'id',
        'name' => 'id',
        'label' => '',
        'class' => '',
        'value' => '',
        'placeholder' => '',
    ])

    <div class="form-floating mb-3">
        <input type="email" name="password" class="form-control" id="email" placeholder="nome@exemplo.com" value="">
        <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="password" placeholder="Senha" value="">
        <label for="password">Senha</label>
    </div>

    <div class="d-grid gap-2 col-8 mx-auto">
    @include('components.button', ['type' => 'submit', 'id' => 'btn', 'color' => 'btn btn-outline-dark  my-3', 'text' => 'Criar conta'])
    </div>

    <p class="mt-3 text-center">Já possui uma conta? <a class="bnt-link-primary text-decoration-none" href="/login" title=""><b>Conecte-se</b></a></p>
</form>
</div>
<div>
