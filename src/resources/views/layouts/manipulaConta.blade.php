@extends('layouts.site')

@section('content')
    <section class="pt-5 ml-4 mb-2">
        @yield('titulo')
    </section>
    <section>
        <h3 class="ml-4">Clientes:</h3>
        <div class="px-5">
            <table class="table">
                <tr>
                    <th scope="col">#</th>
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
    </section>
    @yield('dadosDaConta')
@endsection
