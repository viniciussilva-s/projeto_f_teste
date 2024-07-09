@extends('template')

@section('title', 'Usuários')
@push('style')
    <style>
        .table td {
            padding: 3px;
        }
    </style>
@endpush
@section('conteudo')
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-12 mt-3">
            <div class="card card-primary">
                <div class="card-header align-items-baseline d-flex justify-content-between bg-primary-theme">
                    <h3 class="card-title text-white ">
                        <i class="fas fa-align-justify mr-2"></i>
                        Buscar usuários
                    </h3>
                    <a href="{{ route('usuarios.create') }}" class="btn-tumblr btn-rounded float-end text-white"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Novo"
                    >
                        <i class="fas fa-plus-circle"></i></a>
                </div>
                <form action="{{ route('usuarios.index') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" value="{{ $filters['nome'] ?? '' }}"
                                        placeholder="Informe o nome do usuário">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" value="{{ $filters['email'] ?? '' }}" class="form-control"
                                        placeholder="Informe o e-mail do usuário">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-soft-primary text-center bg-primary-theme">

                        <button type="submit" class="btn btn-primary"><i class="fas fa-search mr-3"></i>Pesquisar</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-lg-12 mt-3">
            <div class="card card-primary">
                <div class="card-header align-items-baseline d-flex justify-content-between bg-primary-theme">
                    <h3 class="card-title text-white ">
                        <i class="fas fa-align-justify mr-2"></i>
                        Lista usuarios
                    </h3>
                </div>

                <div class="card-body">
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-danger text-uppercase">
                                    <th class="py-2 px-0">Nome do Usuário</th>
                                    <th>E-mail</th>
                                    <th style="text-align: center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($usuarios as $u)
                                    <tr>
                                        <td>
                                            <a class="text-info"
                                                href="{{ route('usuarios.edit', ['id' => $u->id]) }}">
                                                {{ $u->nome }}
                                            </a>

                                        </td>
                                        <td>
                                            <a class="text-info"
                                                href="{{ route('usuarios.edit', ['id' => $u->id]) }}">
                                                {{ $u->email }}
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <a class="btn btn-outline-info mr-4"
                                                href="{{ route('usuarios.viewer', ['id' => $u->id]) }}">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="btn btn-outline-danger action-deleted"
                                                href="{{ route('usuarios.delete', ['id' => $u->id]) }}">

                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                @if ($usuarios->hasPages())
                    <div class="card-footer bg-soft-primary text-right bg-primary-theme">

                        {!! $usuarios->links('components.pagination') !!}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
