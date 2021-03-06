@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Início Card Lista -->
                <div class="card mb-3">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Categorias
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCategoria">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </h5>   

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrição</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->nome }}</td>
                                        <td>{{ $categoria->descricao }}</td>
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
                    @if ($errors->has('descricao'))
                        {{ $errors->first('descricao') }}
                    @endif
                </div>
            @endif

        </div>

        <!-- Início Modal Adição -->
        <div class="modal fade" id="modalAddCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('categorias.store') }}">
                            @csrf

                            <label for="inputNome" class="form-label">Nome da Categoria</label>
                            <input type="text" id="inputNome" class="form-control" name="nome" value="{{ old('nome') }}">
                            <br>

                            <label for="inputDescricao" class="form-label">Descrição da Categoria</label>
                            <input type="text" id="inputDescricao" class="form-control" name="descricao" value="{{ old('descricao') }}">
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
