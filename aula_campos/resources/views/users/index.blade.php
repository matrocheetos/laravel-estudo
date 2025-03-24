<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aula Campos | Listar</title>
</head>

<body>

    <a href="{{ route('users.create') }}">Cadastrar</a>

    <h2>Listar Usuários</h2>

    {{-- Acrescentar o componente com os alertas --}}
    <x-alert />

    @forelse ($users as $user)
        ID: {{ $user->id }}<br>
        Nome: {{ $user->name }}<br>
        E-mail: {{ $user->email }}<br>
        Cidade: {{ $user->cidade->nome_cidade }}<br>
        <hr />
    @empty
        Nenhum usuário encontrado!
    @endforelse


</body>

</html>
