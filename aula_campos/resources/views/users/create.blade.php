<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/js/app.js')

    <title>Aula Campos | Cadastrar</title>
</head>

<body>

    <a href="{{ route('users.index') }}">Listar</a>

    <h2>Cadastrar Usuário</h2>

    {{-- Acrescentar o componente com os alertas --}}
    <x-alert />

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <label>Estado: </label>
        <select name="estado_id" id="estado_id">
            <option value="">Selecione</option>
            @forelse ($estados as $estado)
                <option value="{{ $estado->id }}" {{ old('estado_id') == $estado->id ? 'selected' : '' }}>
                    {{ $estado->nome_estado }}</option>
            @empty
            @endforelse
        </select><br><br>

        {{-- Quando não cadastrar corretamente verificar se o estado está selecionado e recuperar as cidades do estado --}}
        @if (old('estado_id'))
            @php
                $cidades = \App\Models\Cidade::where('estado_id', old('estado_id'))->orderBy('nome_cidade')->get();
            @endphp
        @else
            @php
                $cidades = [];
            @endphp
        @endif

        <label>Cidade: </label>
        <select name="cidade_id" id="cidade_id">
            <option value="">Selecione</option>
            @forelse ($cidades as $cidade)
                <option value="{{ $cidade->id }}" {{ old('cidade_id') == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome_cidade }}</option>
            @empty
            @endforelse
        </select><br><br>

        <label>Nome: </label>
        <input type="text" name="name" id="name" placeholder="Nome completo" value="{{ old('name') }}"><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" id="email" placeholder="Melhor e-mail" value="{{ old('email') }}"><br><br>

        <label>Senha: </label>
        <input type="password" name="password" id="password" placeholder="Senha com mínimo de 6 caracteres" value="{{ old('password') }}"><br><br>

        <button type="submit">Salvar</button><br><br>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Receber os seletores do HTML
            var inputSelectEstado = document.querySelector('#estado_id');
            var inputSelectCidade = document.querySelector('#cidade_id');

            // Aguardar o usuário selecionar o estado
            inputSelectEstado.addEventListener('change', () => {
                pesquisarCidade();
            });

            function pesquisarCidade() {
                inputSelectCidade.innerHTML = `<option value="">Carregando...</option>`;

                var selectCidades = "{{ route('cidades.select') }}";

                axios.post(selectCidades, {
                    estado_id: inputSelectEstado.value,
                }).then(response => {

                    inputSelectCidade.innerHTML = `<option value="">Selecione</option>`;

                    response.data.forEach(row => {
                        inputSelectCidade.innerHTML +=
                            `<option value="${row.id}">${row.nome_cidade}</option>`;
                    })

                }).catch(error => {
                    inputSelectCidade.innerHTML = `<option value="">Nenhuma cidade encontrada</option>`;
                });
            }
        });
    </script>

</body>

</html>
