@extends('layouts.site')

@section('nav')
    <li class="nav-item">
        <a class="nav-link mr-2 ml-4 active" href="{{ route('painelAdministrativo')  }}">Painel Administrativo</a>
    </li>
    <li class="nav-item">
        <a class="nav-link mr-2 ml-4" href="{{ route('contaBancaria') }}">Conta bancária</a>
    </li>
    <li class="nav-item">
        <a class="nav-link mr-2 ml-4" href="{{ route('investimentos') }}">Investimentos</a>
    </li>
@endsection

@section('content')
    <section>
        <h1 class="pt-5 ml-4">Clientes:</h1>
        <div class="p-5">
            <table class="table">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Conta bancária (R$)</th>
                    <th scope="col">Investimentos (R$)</th>
                </tr>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <th scope="row" class="align-middle">{{ $cliente->id }}</th>
                        <td><img src="{{ asset($cliente->avatar) }}" class="img-fluid" alt="Responsive image"/></td>
                        <td class="align-middle">{{ $cliente->first_name }}</td>
                        <td class="align-middle">{{ $cliente->last_name }}</td>
                        <td class="align-middle">{{ $cliente->email }}</td>
                        <td class="align-middle">{{ number_format($cliente->contaBancaria, 2, ',', '.') }}</td>
                        <td class="align-middle">{{ number_format($cliente->investimentos, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <form class="d-grid col-10 mx-auto mb-5" action="{{ route('fetchUsers')  }}" method="post">
            @csrf
            <button type="submit" class="btn btn-dark"><strong>Importar clientes PigBank</strong></button>
            <span class="text-center">(A importação ocorre uma unica vez)</span>
        </form>
    </section>
@endsection
