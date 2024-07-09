<!DOCTYPE html>
<html>

<head>
    <title>Emprezaz | @yield('title') </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icon/icons.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <style>
        .card-body {
            background: #fff;
        }

        .bg-primary-theme {
            background-color: #222e3c;
        }
    </style>
    @stack('style')
</head>

<body>
    <div class="wrapper">
        @include('components.sidebar')
        <div class="main">
            @include('components.navigation')

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="mb-3">
                        <h1 class="h3 d-inline align-middle">@yield('title')</h1>
                    </div>
                    @yield('conteudo')
                </div>
            </main>

            @include('components.footer')
        </div>
    </div>
</body>
<script>
    const toastMixin = Swal.mixin({
        toast: true,
        icon: 'success',
        title: 'General Title',
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
</script>

{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        function toggleSidebar() {
            var sidebar = document.getElementsByClassName("js-sidebar")[0];
            var toggleButton = document.getElementsByClassName("js-sidebar-toggle")[0];

            if (sidebar && toggleButton) {
                toggleButton.addEventListener("click", function() {
                    sidebar.classList.toggle("collapsed");

                    sidebar.addEventListener("transitionend", function() {
                        window.dispatchEvent(new Event("resize"));
                    });
                });
            }
        }

        // Chama a função para ativar a funcionalidade de alternância da barra lateral
        toggleSidebar();
        (async () => {
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    await toastMixin.fire({
                        animation: false,
                        title: '{!! $error !!}',
                        icon: "error"
                    });
                @endforeach
            @endif

            @if (session()->has('success'))
                await toastMixin.fire({
                    animation: false,
                    title: "{!! session()->get('success') !!}",
                    icon: "success"
                });
            @endif
        })()

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        $('.action-deleted').click(function(e) {
            e.preventDefault();
            let href = $(e.currentTarget).attr('href');
            swalWithBootstrapButtons.fire({
                title: "Tem certeza que deseja Deletar? ",
                // text: "You won't be able to revert this!",
                icon: "error",
                showCancelButton: true,
                confirmButtonText: "Sim, deletar!",
                cancelButtonText: "Não, cancelar!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Deletado!",
                        text: "Aguarde enquanto carregamos as informações.",
                        icon: "success"
                    });
                    // debugger
                    setTimeout(() => {
                        window.location.href = href;
                    }, 2 * 1000);
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "Ação cancelada",
                        icon: "error"
                    });
                }
            });
        })
    })
</script>
@stack('script')


</html>
