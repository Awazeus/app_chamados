@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Início Card Lista -->
                <div class="card mb-3">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        SLA
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddSLA">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </h5>   

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Valor</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($slas as $sla)
                                    <tr>
                                        <td>{{ $sla->id }}</td>
                                        <td>{{ $sla->valor }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                    </div>
                </div>
                <!-- Fim Card Lista -->
            
            </div>

            @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert" >
                    @if ($errors->has('valor'))
                        {{ $errors->first('valor') }}
                    @endif
                </div>
            @endif

        </div>

        <!-- Início Modal Adição -->
        <div class="modal fade" id="modalAddSLA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Adicionar SLA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('sla.store') }}">
                            @csrf

                            <label for="inputValor" class="form-label">Valor</label>
                            <input type="text" id="inputValor" class="form-control" name="valor" value="{{ old('valor') }}">
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
