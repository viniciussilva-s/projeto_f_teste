@extends('template')

@section('title', 'Home')
@push('style')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Courier+Prime:wght@700&display=swap');

        body,
        html {
            height: 100vh;
            margin: 0;
            font-family: 'Courier Prime', monospace;
            overflow: hidden;
        }

        .bgimg {
            background: url('{{ asset('img/forestbridge.jpg') }}');
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
        }

        h1 {
            color: white;
            font-size: 50px;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        hr {
            margin: auto;
            width: 40%;
            height: 5px;
            background: #fff;
        }
    </style>
@endpush
@section('conteudo')


    <div class="bgimg">
        <div class="middle">
            <h1>Em breve</h1>
            <hr>
        </div>
    </div>
@endsection
