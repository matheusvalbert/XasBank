@extends('layouts.manipulaConta')

@section('nav')
    <li class="nav-item">
        <a class="nav-link mr-2 ml-4" href="{{ route('painelAdministrativo')  }}">Painel Administrativo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link mr-2 ml-4 active" href="{{ route('contaBancaria')  }}">Conta bancária</a>
    </li>
    <li class="nav-item">
        <a class="nav-link mr-2 ml-4" href="{{ route('investimentos')  }}">Investimentos</a>
    </li>
@endsection

@section('titulo')
    <h1>Manipular saldo conta bancária:</h1>
@endsection

@section('dadosDaConta')
    <section class="mb-4">
        <h3 class="pt-3 ml-4">Dados da conta:</h3>
        <form class="pt-2 px-5" action="{{ route('updateContaBancaria') }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <div class="mb-3">
                    <label for="emailInput">Selecione o email:</label>
                    <select name="email" class="form-select" aria-label="Default select example">
                        <option selected>Selecione o email</option>
                        @foreach($clientes as $cliente)
                            <option>{{ $cliente->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ValueInput">Tipo:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="deposito" value="deposito" checked>
                        <label class="form-check-label" for="deposito">
                            Depósito
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo" id="saque" value="saque">
                        <label class="form-check-label btn-dank" for="saque">
                            Saque
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="ValueInput">Valor:</label>
                    <input name="valor" type="number" step="0.01" class="form-control" id="ValueInput" placeholder="1,00" min="0.01">
                </div>
                <button type="submit" class="col-12 btn btn-dark"><strong>Realizar operação</strong></button>
            </div>
        </form>
    </section>
@endsection
