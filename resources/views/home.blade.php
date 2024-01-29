@extends('layouts.app')

@section('content')

<body>
    @auth
    <section>
        @if(session('profileUpdated'))
        <div id="flash-message-update" class="bg-green-200 border-green-600 text-green-800 border-l-4 p-4 m-4" role="alert">
            <p class="font-bold">Éxito:</p>
            <p>{{ session('profileUpdated') }}</p>
        </div>
        <meta http-equiv="refresh" content="2;url={{ route('users.index') }}">
        @endif
        <div class="container mx-auto sm:px-4 py-5 h-full text-center">
            <h1>Ha iniciado sesion en a su gestor de usuarios</h1>
        </div>
    </section>
    @endauth

    @guest
    <section>
        <div class="container mx-auto sm:px-4 py-5 h-full text-center">
            <h3>Bienvenido, inicia sesion</h3>
        </div>
    </section>
    @endguest


</body>
@endsection