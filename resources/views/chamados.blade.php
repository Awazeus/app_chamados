@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Início Card Lista -->
                <div class="card mb-3">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Chamados
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddChamado">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </h5>   

                    <div class="accordion" id="accordionFlushExample">
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
                                            <a class="btn btn-secondary" href="{{ route('chamados.index', ['ordem_data' => 'asc']) }}" role="button">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                            <a class="btn btn-secondary" href="{{ route('chamados.index', ['ordem_data' => 'desc']) }}" role="button">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        </div>
                                        {{-- <div class="btn-group-sm me-2" role="group" aria-label="Second group">
                                            <button type="button" class="btn btn-outline-dark" disabled>SLA</button>
                                            <a class="btn btn-secondary" href="{{ route('chamados.index', ['ordem_sla' => 'asc']) }}" role="button">
                                                <i class="fas fa-arrow-up"></i>
                                            </a>
                                            <a class="btn btn-secondary" href="{{ route('chamados.index', ['ordem_sla' => 'desc']) }}" role="button">
                                                <i class="fas fa-arrow-down"></i>
                                            </a>
                                        </div> --}}
                                        <div class="btn-group-sm me-2" role="group">
                                            <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Projeto
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                                @foreach($projetos as $projeto)
                                                    <li><a class="dropdown-item" href="{{ route('chamados.index', ['projeto' => $projeto->id]) }}">{{ $projeto->nome }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="btn-group-sm me-2" role="group">
                                            <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Situação
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                                @foreach($situacoes as $situacao)
                                                    <li><a class="dropdown-item" href="{{ route('chamados.index', ['situacao' => $situacao->id]) }}">{{ $situacao->nome }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="btn-group-sm me-2" role="group">
                                            <button id="btnGroupDrop2" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                SLA
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                                @foreach($slas as $sla)
                                                    <li><a class="dropdown-item" href="{{ route('chamados.index', ['sla' => $sla->id]) }}">{{ $sla->valor }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="btn-group-sm me-2" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Categoria
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                @foreach($categorias as $categoria)
                                                    <li><a class="dropdown-item" href="{{ route('chamados.index', ['categoria' => $categoria->id]) }}">{{ $categoria->nome }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <a class="btn-sm btn-danger" href="{{ route('chamados.index') }}" role="button">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Projeto</th>
                                    <th scope="col">Data de Início</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">SLA</th>
                                    <th scope="col">Categoria</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($chamados as $chamado)
                                    <tr>
                                        <td>{{ $chamado->projeto->nome }}</td>
                                        <td>{{ $chamado->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $chamado->situacao->nome }}</td>
                                        <td>{{ $chamado->titulo }}</td>
                                        <td>{{ $chamado->sla->valor }}</td>
                                        <td>{{ $chamado->categoria->nome }}</td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fas fa-times-circle"></i>
                                            </button>
                                        </td> --}}
                                        <td>
                                            <div class="btn-group-sm" role="group">
                                                <a class="btn btn-primary" role="button" data-bs-toggle="modal" data-bs-target="#modalEditChamado{{ $chamado->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" role="button" data-bs-toggle="modal" data-bs-target="#modalDeleteChamado{{ $chamado->id }}">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                    </div>
                </div>
                <!-- Fim Card Lista -->
                
            </div>

            @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert" >
                    @if ($errors->has('nome'))
                        {{ $errors->first('nome') }}
                        <br><hr>
                    @endif
                    @if ($errors->has('titulo'))
                        {{ $errors->first('titulo') }}
                        <br><hr>
                    @endif
                    @if ($errors->has('sla'))
                        {{ $errors->first('sla') }}
                        <br><hr>
                    @endif
                    @if ($errors->has('categoria_id'))
                        {{ $errors->first('categoria_id') }}
                    @endif
                </div>
            @endif
            
        </div>

        <!-- Início Modal Adição -->
        <div class="modal fade" id="modalAddChamado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Abrir Chamado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('chamados.store') }}">
                            @csrf

                            <label for="inputTitulo" class="form-label">Título do Chamado</label>
                            <input type="text" id="inputTitulo" class="form-control" name="titulo" value="{{ old('titulo') }}">
                            <br>

                            <label for="inputProjeto" class="form-label">Projeto</label>
                            <br>
                            <select name="projeto_id" id="inputProjeto">
                                <option></option>
                                @foreach($projetos as $projeto)
                                    <option value="{{ $projeto->id }}" {{ old('projeto_id') == $projeto->id ? 'selected' : '' }} >{{ $projeto->nome }}</option>
                                @endforeach
                            </select>
                            <br><br>

                            <label for="inputSLA" class="form-label">SLA</label>
                            <br>
                            <select name="sla_id" id="inputSLA">
                                <option></option>
                                @foreach($slas as $sla)
                                    <option value="{{ $sla->id }}" {{ old('sla_id') == $sla->id ? 'selected' : '' }} >{{ $sla->valor }}</option>
                                @endforeach
                            </select>
                            <br><br>
                                
                            <label for="inputCategoria" class="form-label">Categoria</label>
                            <br>
                            <select name="categoria_id" id="inputCategoria">
                                <option></option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }} >{{ $categoria->nome }}</option>
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

        <!-- Início Modal Edição -->
        @foreach($chamados as $chamado)
            <div class="modal fade" id="modalEditChamado{{ $chamado->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Chamado</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('chamados.update', ['chamado' => $chamado->id]) }}">
                            {{-- <form method="post" action="{{ route('chamados.store') }}"> --}}
                                @csrf
                                @method('PUT')

                                <label for="inputTitulo" class="form-label">Título do Chamado</label>
                                <input type="text" id="inputTitulo" class="form-control" name="titulo" value="{{ $chamado->titulo ?? old('titulo') }}">
                                <br>

                                <label for="inputSituacao" class="form-label">Situação</label>
                                <br>
                                <select name="situacao_id" id="inputSituacao">
                                    <option></option>
                                    @foreach($situacoes as $situacao)
                                        <option value="{{ $situacao->id }}" {{ ($chamado->situacao_id ?? old('situacao_id')) == $situacao->id ? 'selected' : '' }} >{{ $situacao->nome }}</option>
                                    @endforeach
                                </select>
                                <br><br>

                                <label for="inputSLA" class="form-label">SLA</label>
                                <br>
                                <select name="sla_id" id="inputSLA">
                                    <option></option>
                                    @foreach($slas as $sla)
                                        <option value="{{ $sla->id }}" {{ ($chamado->sla_id ?? old('sla_id')) == $sla->id ? 'selected' : '' }} >{{ $sla->valor }}</option>
                                    @endforeach
                                </select>
                                <br><br>
                                    
                                <label for="inputCategoria" class="form-label">Categoria</label>
                                <br>
                                <select name="categoria_id" id="inputCategoria">
                                    <option></option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ ($chamado->categoria_id ?? old('categoria_id')) == $categoria->id ? 'selected' : '' }} >{{ $categoria->nome }}</option>
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
        @endforeach
        <!-- Fim Modal Edição -->

        <!-- Início Modal Deleção -->
        @foreach($chamados as $chamado)
            <div class="modal fade" id="modalDeleteChamado{{ $chamado->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluir Chamado "{{ $chamado->titulo }}"</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Você tem certeza de que deseja excluir este chamado?</p>
                            <form id="form_{{$chamado->id}}" method="post" action="{{ route('chamados.destroy', ['chamado' => $chamado->id]) }}">
                                @csrf
                                @method('DELETE')

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{$chamado->id}}').submit()">Excluir</a>
                                </div>                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- Fim Modal Deleção -->

    </div>
@endsection
