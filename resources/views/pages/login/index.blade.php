@extends('template')

@section('title', 'Acessar')
@section('conteudo')
    <style>
        .text-gray-600,
        .text-gray-600:hover {
            color: #4b5563 !important;
        }

        .btn-gray-800 {
            color: #fff;
            background-color: #1f2937;
            border-color: #1f2937;
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(17 24 39 / 8%);
        }

        .btn-gray-800:hover {
            background-color: #161d27;
            border-color: #161d27;
            color: #fff;
        }
    </style>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Bem-vindo</h1>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="{{ asset('img/avatars/avatar.png') }}" alt="User"
                                            class="img-fluid rounded-circle" width="132" height="132" />
                                    </div>
                                    <form method="POST" action="{{ route('login.save') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="email" class="form-label">E-mail</label>
                                            <div class="input-group">
                                                <span class="input-group-text" for="email">
                                                    <i class="fas fa-at"></i>
                                                </span>
                                                <input type="email" class="form-control" placeholder="examplo@email.com"
                                                    name="email" id="email" autofocus="" required="true">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Senha</label>
                                            <div class="input-group">
                                                <span class="input-group-text" for="password">
                                                    <i class="fas fa-lock "></i>
                                                </span>
                                                <input type="password" class="form-control" placeholder="******"
                                                    name="password" id="password" autofocus="" required="true">
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-gray-800">Acessar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>




@endsection
