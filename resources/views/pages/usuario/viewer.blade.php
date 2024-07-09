@extends('template')

@section('title', 'Perfil')
@push('style')
    <style>
        .table td {
            padding: 3px;
        }
    </style>
@endpush
@section('conteudo')
<div class="row">
    <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Detalhes</h5>
            </div>
            <div class="card-body text-center">
                <img src="{{ ($usuario->image) ?  asset("users/{$usuario->image}"):asset('img/avatars/avatar.png')}}" alt="{{$usuario->nome}}" class="img-fluid rounded-circle mb-2" width="128"
                    height="128">
                <h5 class="card-title mb-0">{{$usuario->nome}}</h5>
                <div class="text-muted mb-2">{{$usuario->email}}</div>

                <div>
                    <a class="btn btn-primary btn-sm" href="#">Follow</a>
                    <a class="btn btn-primary btn-sm" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg> Message</a>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">Skills</h5>
                <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
                <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
                <a href="#" class="badge bg-primary me-1 my-1">Sass</a>
                <a href="#" class="badge bg-primary me-1 my-1">Angular</a>
                <a href="#" class="badge bg-primary me-1 my-1">Vue</a>
                <a href="#" class="badge bg-primary me-1 my-1">React</a>
                <a href="#" class="badge bg-primary me-1 my-1">Redux</a>
                <a href="#" class="badge bg-primary me-1 my-1">UI</a>
                <a href="#" class="badge bg-primary me-1 my-1">UX</a>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">About</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home feather-sm me-1">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg> Lives in <a href="#">San Francisco, SA</a>
                    </li>

                    <li class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-briefcase feather-sm me-1">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                        </svg> Works at <a href="#">GitHub</a></li>
                    <li class="mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-map-pin feather-sm me-1">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg> From <a href="#">Boston</a></li>


                    <li class="mb-1">
                        <i class="far fa-address-card"></i>
                        <a href="#">
                            {{$usuario->cpf}}
                        </a>
                    </li>
                    <li class="mb-1">
                        <i class="fas fa-mobile-alt"></i>
                        <a href="#">
                            {{$usuario->celular}}
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <h5 class="h6 card-title">Elsewhere</h5>
                <ul class="list-unstyled mb-0">
                    <li class="mb-1"><span class="fas fa-globe fa-fw me-1"></span> <a href="#">staciehall.co</a></li>
                    <li class="mb-1"><span class="fab fa-twitter fa-fw me-1"></span> <a href="#">Twitter</a></li>
                    <li class="mb-1"><span class="fab fa-facebook fa-fw me-1"></span> <a href="#">Facebook</a></li>
                    <li class="mb-1"><span class="fab fa-instagram fa-fw me-1"></span> <a href="#">Instagram</a></li>
                    <li class="mb-1"><span class="fab fa-linkedin fa-fw me-1"></span> <a href="#">LinkedIn</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
