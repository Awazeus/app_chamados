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
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($projetos as $projeto)
                                    <tr>
                                        <td>{{ $projeto->nome }}</td>
                                        <td>{{ $projeto->created_at }}</td>
                                        <td>{{ $projeto->situacao->nome }}</td>
                                        <td>{{ $projeto->titulo }}</td>
                                        <td>{{ $projeto->sla }}</td>
                                        <td>{{ $projeto->categoria->nome }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                    </div>
                </div>
                <!-- Fim Card Lista -->
                
            </div>

            @if ($errors->has('nome'))
                <div class="alert alert-danger" role="alert" >
                    {{ $errors->first('nome') }}
                </div>
            @endif
            @if ($errors->has('titulo'))
                <div class="alert alert-danger" role="alert" >
                    {{ $errors->first('titulo') }}
                </div>
            @endif
            @if ($errors->has('sla'))
                <div class="alert alert-danger" role="alert" >
                    {{ $errors->first('sla') }}
                </div>
            @endif
            @if ($errors->has('categoria_id'))
                <div class="alert alert-danger" role="alert" >
                    {{ $errors->first('categoria_id') }}
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

                            <label for="inputTitulo" class="form-label">Título do Projeto</label>
                            <input type="text" id="inputTitulo" class="form-control" name="titulo" value="{{ old('titulo') }}">
                            <br>

                            <label for="inputSLA" class="form-label">SLA do Projeto</label>
                            <input type="text" id="inputSLA" class="form-control" name="sla" value="{{ old('sla') }}">
                            <br>
                                
                            <label for="inputCategoria" class="form-label">Categoria do Projeto</label>
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

    </div>
@endsection
