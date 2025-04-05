<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema Web</title>
        <!-- Link Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Link das Fontes -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
        <!-- Ícone da Página -->
        <link rel="icon" href="{{asset('imgs/Logo.png')}}" type="image/x-icon">
        <!-- Ícones Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <!-- Link para Máscara de Campo -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <!-- Link para Máscara de Campo -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <!-- Link para o CSS externo -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('imgs/Logo_Navbar.png')}}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    <strong>Sistema Web</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Consultar</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <!-- Avisos para o Usuário -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="container" style="max-width: 900px;">
            <!-- Título Principal -->
            <h3><img src="{{asset('imgs/Consultar.png')}}" alt="Logo" width="32" height="32" class="d-inline-block align-text-top"> Consultar</h3>
            <p class="mb-4">informações de todos os clientes</p>
            @section('content')
            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Origem</th>
                        <th>Data de Cadastro</th>
                        <th>Observação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome_cliente }}</td>
                            <td>{{ $cliente->telefone_cliente }}</td>
                            <td>
                                @switch($cliente->tipo_telefone_cliente)
                                    @case(1)
                                        Celular
                                        @break
                                    @case(2)
                                        Telefone Fixo
                                        @break
                                    @case(3)
                                        WhatsApp
                                        @break
                                    @default
                                        -
                                @endswitch
                            </td>
                            <td>{{ \Carbon\Carbon::parse($cliente->data_cadastro_cliente)->format('d/m/Y') }}</td>
                            <td>{{ $cliente->observacao_cliente }}</td>
                            <td>
                                <!-- Botão de Editar -->
                                <a href="{{ url('/editar-cliente/' . $cliente->id) }}" class="btn btn-sm btn-editar-verde me-1">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>
                                <!-- Botão de Excluir -->
                                <form id="formExcluir{{ $cliente->id }}" action="{{ route('clientes.excluir', $cliente->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="btn btn-sm btn-excluir-verde"
                                        onclick="confirmarExclusao({{ $cliente->id }}, '{{ $cliente->nome_cliente }}', '{{ $cliente->telefone_cliente }}')">
                                        <i class="bi bi-trash-fill"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Nenhum cliente cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Rodapé -->
        <div id="footer">
            &copy 2025 Todos os direitos reservados | Letícia
        </div>
        <!-- SweetAlert2 (deve vir antes do script que o usa) -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Script de confirmação -->
        <script src="{{ asset('js/confirmacao.js') }}"></script>
        <!-- Script Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>