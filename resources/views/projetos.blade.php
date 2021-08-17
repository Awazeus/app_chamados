@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Início Card Lista -->
                <div class="card mb-3">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Projetos
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddProjeto">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </h5>   

                    {{-- <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                    Filtros
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                        <div class="btn-group-sm me-2" role="group" aria-label="First group">
                                            <button type="button" class="btn btn-outline-dark" disabled>Data de Início</button>
                                            <a class="btn btn-secondary" href="{{ route('projetos.index', ['ordem_data' => 'asc']) }}" role="button">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                            <a class="btn btn-secondary" href="{{ route('projetos.index', ['ordem_data' => 'desc']) }}" role="button">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-sm me-2" role="group" aria-label="Second group">
                                            <button type="button" class="btn btn-outline-dark" disabled>SLA</button>
                                            <a class="btn btn-secondary" href="{{ route('projetos.index', ['ordem_sla' => 'asc']) }}" role="button">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                            <a class="btn btn-secondary" href="{{ route('projetos.index', ['ordem_sla' => 'desc']) }}" role="button">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group-sm me-2" role="group">
                                            <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Situação
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                                @foreach($situacoes as $situacao)
                                                    <li><a class="dropdown-item" href="{{ route('projetos.index', ['situacao' => $situacao->id]) }}">{{ $situacao->nome }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="btn-group-sm me-2" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Categoria
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                @foreach($categorias as $categoria)
                                                    <li><a class="dropdown-item" href="{{ route('projetos.index', ['categoria' => $categoria->id]) }}">{{ $categoria->nome }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <a class="btn-sm btn-danger" href="{{ route('projetos.index') }}" role="button">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Nome do Projeto</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($projetos as $projeto)
                                    <tr>
                                        <td>{{ $projeto->user->name }}</td>
                                        <td>{{ $projeto->cliente->nome }}</td>
                                        <td>{{ $projeto->nome }}</td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </td> --}}
                                        {{-- <td>
                                            <div class="btn-group-sm" role="group">
                                                <a class="btn btn-primary" href="#" role="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" href="#" role="button">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>

                    </div>
                </div>
                <!-- Fim Card Lista -->
                
            </div>

            @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert" >
                    @if ($errors->has('cliente'))
                        {{ $errors->first('cliente') }}
                        <br><hr>
                    @endif
                    @if ($errors->has('nome'))
                        {{ $errors->first('nome') }}
                    @endif
                </div>
            @endif
            
        </div>

        <!-- Início Modal Adição -->
        <div class="modal fade" id="modalAddProjeto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Projeto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('projetos.store') }}">
                            @csrf

                            <label for="inputNome" class="form-label">Nome do Projeto</label>
                            <input type="text" id="inputNome" class="form-control" name="nome" value="{{ old('nome') }}">
                            <br>

                            <label for="inputCliente" class="form-label">Cliente</label>
                            <br>
                            <select name="cliente_id" id="inputCliente">
                                <option></option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }} >{{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                            <br>
                            <br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal Adição -->

    </div>
@endsection
