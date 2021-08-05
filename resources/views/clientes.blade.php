@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Início Card Lista -->
                <div class="card mb-3">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Clientes
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCliente">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </h5>   

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->nome }}</td>
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

        </div>

        <!-- Início Modal Adição -->
        <div class="modal fade" id="modalAddCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('clientes.store') }}">
                            @csrf

                            <label for="inputNome" class="form-label">Nome do Cliente</label>
                            <input type="text" id="inputNome" class="form-control" name="nome" value="{{ old('nome') }}">
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
