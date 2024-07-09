@extends('template')

@section('title', 'Meus dados')
@push('style')
    <style>
        .imagem_container img {
            width: 140px;
        }
    </style>
@endpush
@section('conteudo')

    <div class="row">

        <div class="col-12 col lg-12">
            <div class="card-header   align-items-baseline d-flex justify-content-between bg-primary-theme">
                <h3 class="card-title text-white mt-2"><i class="fas fa-arrow-alt-circle-right mr-2"></i>
                    Editar meus dados</h3>

            </div>
            <form role="form" method="POST" action="{{ route('admin.meusdados.save') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="mode" value="edit">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                @if ($user->image)
                                    <div class="imagem_container">
                                        <img src="{{ asset("users/{$user->image}") }}" alt="" class="img-thumbnail">
                                    </div>
                                    <label class="form-check" data-bs-toggle="collapse" data-bs-target="#collapsediv1"
                                        aria-expanded="false" aria-controls="collapsediv1">
                                        <input class="form-check-input" type="checkbox" value="false">
                                        <span class="form-check-label">
                                            Atualizar imagem
                                        </span>
                                    </label>
                                @endif
                                <div id='collapsediv1' class="collapse  my-4 {{ $user->image ? 'collapsed' : '' }}">
                                    <div class="d-flex flex-column">
                                        <label for="perfil">Imagem Perfil </label>
                                        <input type="file" accept="image/x-png,image/gif,image/jpeg"
                                            name="file"id="perfil">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-9 col-lg-8">
                                <div class="form-group">
                                    <label for="grupo">Nome</label>
                                    {{-- readonly="true" --}}
                                    <input type="text" name="name" value="{{ $user->name }}" minlength="5"
                                        maxlength="250" class="form-control" placeholder="Informe o nome do usuário">
                                </div>
                            </div>
                            @if (auth()->user()->permissao->permissao_parametro->where('nome', 'Permissão - Lista')->first())

                                <div class="col-12 col-sm-3 col-lg-3">
                                    <label>Grupo</label>
                                    {{-- readonly="true" --}}
                                    <select class="form-select mb-3" name="grupo">
                                        @foreach ($permissao_grupo as $g)
                                            <option
                                                {{ isset($user->grupo_id) && $user->grupo_id == $g->id ? "selected='true'" : '' }}
                                                value="{{ $g->id }}">{{ $g->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="grupo" value="{{ $user->grupo_id ?? 5 }}">
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-9 col-lg-9">
                                <div class="form-group">
                                    <label for="grupo">E-mail</label>
                                    {{-- readonly="true" --}}
                                    <input type="email" name="email" value="{{ $user->email }}" minlength="5"
                                        maxlength="80" class="form-control" placeholder="Informe o e-mail do usuário">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-9 col-lg-4">
                                <div class="form-group">
                                    <label for="grupo">Senha</label>
                                    <input type="password" name="senha" value="....." minlength="1" class="form-control"
                                        placeholder="Informe uma senha">
                                </div>
                            </div>
                            <div class="col-12 col-sm-9 col-lg-4">
                                <div class="form-group">
                                    <label for="group">Nova senha</label>
                                    <input type="password" name="n_senha" value="" id="n_senha" class="form-control"
                                        minlength="1" placeholder="Informe a nova senha">
                                </div>
                            </div>
                            <div class="col-12 col-sm-9 col-lg-4">
                                <div class="form-group">
                                    <label for="group">Confirmar senha</label>
                                    <input type="password" name="c_senha" value="" id="c_senha" class="form-control"
                                        minlength="1" placeholder="Confirme a nova senha">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-soft-primary text-center bg-primary-theme">
                    <button type="submit" class="btn btn-primary"><i class="far fa-edit mr-2"></i>Salvar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
