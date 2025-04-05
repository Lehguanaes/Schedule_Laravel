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
                    <a class="nav-link" href="/consultar">Consultar</a>
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
        <!-- Conteúdo -->
        <div class="container mt-4">
            <h3>
                <img src="{{asset('imgs/Listar.png')}}" alt="Logo" width="32" height="32" class="d-inline-block align-text-top">
                Cliente
            </h3>
            <p class="mb-4">informações cadastradas do cliente</p>
            <!-- Formulário de Exibição -->
            <form>
                <div class="mb-4">
                    <label for="nomeInput" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome_cliente" value="{{ $clientes->nome_cliente }}"  readonly>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="telefoneInput" class="form-label">Telefone:</label>
                        <input type="text" class="form-control" id="telefone_cliente" name="telefone_cliente" value="{{ $clientes->telefone_cliente }}"  readonly>
                    </div>
                    @php
                        $tiposTelefone = [
                            1 => 'Celular',
                            2 => 'Telefone Fixo',
                            3 => 'Whatsapp'
                        ];
                    @endphp
                    <div class="col-md-6">
                        <label for="origemInput" class="form-label">Origem:</label>
                        <input type="text" class="form-control" id="tipo_telefone_cliente" name="tipo_telefone_cliente" value="{{ $tiposTelefone[$clientes->tipo_telefone_cliente] ?? 'Desconhecido' }}" readonly>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="dataInput" class="form-label">Data de Cadastro:</label>
                    <input type="date" class="form-control" name="data_cadastro_cliente" value="{{ $clientes->data_cadastro_cliente }}"  readonly>
                </div>
                <div class="mb-4">
                    <label for="observacaoInput" class="form-label">Observação:</label>
                    <textarea class="form-control" name="observacao_cliente" rows="4"  readonly>{{ $clientes->observacao_cliente }}</textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" onclick="window.location.href='/consultar'">OK</button>
                </div>
            </form>
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