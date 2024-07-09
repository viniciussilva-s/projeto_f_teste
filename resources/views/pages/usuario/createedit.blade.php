@extends('template')

@section('title', 'Usuários')
@push('style')
    <style>

    </style>
@endpush
@section('conteudo')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card-header align-items-baseline d-flex justify-content-between bg-primary-theme">
                <h3 class="card-title text-white ">
                    <i class="fas fa-align-justify mr-2"></i>
                    {{ isset($usuario->id) ? 'Editar' : 'Adicionar' }}
                </h3>
                <a href="{{ route('usuarios.index') }}" class="btn-tumblr btn-rounded float-end text-white">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
            <form method="POST" action="{{ route('usuarios.save', ['id' => $usuario->id ?? null]) }}"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="mode" value="{{ isset($usuario->id) ? 'edit' : 'create' }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="form-group mb-2">
                                        <label for="nome">Nome</label>
                                        <input type="text" id="nome" name="nome"
                                            value="{{ old('nome') ?? $usuario->nome ?? '' }}" minlength="5" maxlength="250"
                                            class="form-control" placeholder="Informe o nome do usuário">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group mb-2">
                                        <label for="cpf">CPF</label>
                                        <input type="text" id="cpf" name="cpf"
                                            value="{{ old('cpf') ?? $usuario->cpf ?? '' }}" minlength="5" maxlength="20"
                                            class="form-control cpf" placeholder="Informe o CPF do usuário">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-2">
                                        <label for="datanascimento">Data de nascimento</label>
                                        <input type="date" id="datanascimento" name="datanascimento"
                                            value="{{ old('datanascimento') ?? $usuario->datanascimento ?? '' }}" minlength="5" maxlength="10"
                                            class="form-control" placeholder="Informe a data de nascimento do usuário">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-2">
                                        <label for="celular">Celular</label>
                                        <input type="text" id="celular" name="celular"
                                            value="{{ old('celular') ?? $usuario->celular ?? '' }}" minlength="5" maxlength="20"
                                            class="form-control sp_celphones" placeholder="Informe o celular do usuário">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <label for="email">E-mail</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ old('email') ?? $usuario->email ?? '' }}" minlength="5" maxlength="200"
                                            class="form-control" placeholder="Informe o e-mail do usuário">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group mb-2 col-lg-6">
                            @if (isset($usuario->image) && $usuario->image != "")
                                <div class="imagem_container">
                                    <img id="thumbnail_prev" class="img-fluid img-thumbnail image w-50"
                                        src="{{ asset("users/{$usuario->image}") }}">
                                </div>
                                <div class="form-group clearfix">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="update" name="update" value="true">
                                        <label for="update">Atualizar imagem</label>
                                    </div>
                                </div>
                            @else
                                <div class="mb-2 text-center">
                                    <img id="thumbnail_prev" class="img-fluid img-thumbnail image w-50" src="">
                                </div>
                            @endif
                            <div id="image-fields" @if (isset($usuario->image) && $usuario->image != "") hidden='true' @endif>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="image" id="label-image">Escolha uma
                                        imagem (PNG|JPG|JPEG)...</label>
                                    <input class="form-control" type="file" id="image" name="image"
                                        accept="image/*">
                                </div>

                            </div>

                            {{-- <div id='collapsediv1' class="  my-4 {{  empty($usuario->image )  ?  : 'collapse collapsed' }}">
                                <div class="d-flex flex-column">
                                    <label for="perfil">Imagem Perfil </label>
                                    <input type="file" accept="image/x-png,image/gif,image/jpeg"
                                        name="file"id="perfil">
                                </div>
                            </div> --}}
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
@push('script')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/js-mascaras.js') }}"></script>
    <script>
        $(document).on(`change`, `#update`, function(e) {
            e.preventDefault();
            if (document.getElementById(`update`).checked === true) {
                $(`#image-fields`).removeAttr(`hidden`);
                $(`input[id^='image']`).attr('required', '');
            } else {
                $(`#image-fields`).attr('hidden', '');
                $(`input[id^='image']`).removeAttr('required');
            }
        });

        $(document).on(`change`, `#unlimited`, function(e) {
            e.preventDefault();
            change_unlimited();
        });
        $(document).on(`change`, `#image`, function(e) {
            e.preventDefault();
            if ($(`#image`)[0].files && $(`#image`)[0].files[0]) {
                let image = $(`#image`)[0].files[0];
                let reader = new FileReader;
                reader.onload = function(open) {
                    $(`#thumbnail_prev`).attr(`src`, open.target.result);
                }
                reader.readAsDataURL(image);
            }
        })
    </script>
@endpush
