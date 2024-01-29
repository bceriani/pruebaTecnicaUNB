@extends('layouts.app')

@section('content')

<body class="bg-white">
    <section>

        @if(session('userUpdated'))
        <div id="flash-message-update" class="bg-green-200 border-green-600 text-green-800 border-l-4 p-4 m-4" role="alert">
            <p class="font-bold">Éxito:</p>
            <p>{{ session('userUpdated') }}</p>
        </div>
        <meta http-equiv="refresh" content="2;url={{ route('users.index') }}">
        @endif

        @if(session('userCreated'))
        <div id="flash-message-update" class="bg-green-200 border-green-600 text-green-800 border-l-4 p-4 m-4" role="alert">
            <p class="font-bold">Éxito:</p>
            <p>{{ session('userCreated') }}</p>
        </div>
        <meta http-equiv="refresh" content="2;url={{ route('users.index') }}">
        @endif

        @if(session('userRestored'))
        <div id="flash-message-update" class="bg-green-200 border-green-600 text-green-800 border-l-4 p-4 m-4" role="alert">
            <p class="font-bold">Éxito:</p>
            <p>{{ session('userRestored') }}</p>
        </div>
        <meta http-equiv="refresh" content="2;url={{ route('users.index') }}">
        @endif

        @if(session('userDelete'))
        <div id="flash-message-update" class="bg-red-200 border-red-600 text-red-800 border-l-4 p-4 m-4" role="alert">
            <p class="font-bold">Éxito:</p>
            <p>{{ session('userDelete') }}</p>
        </div>
        <meta http-equiv="refresh" content="2;url={{ route('users.index') }}">
        @endif



        <div class="flex justify-center">
            <h1 class="text-2xl font-bold m-4">Usuarios Activos</h1>
        </div>

        <a href="new-user" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Nuevo Usuario</a>
        <div class="overflow-x-auto mt-5">
            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 text-center">ID</th>
                        <th class="py-2 px-4 border border-gray-300 text-center">Nombre</th>
                        <th class="py-2 px-4 border border-gray-300 text-center">Apellido</th>
                        <th class="py-2 px-4 border border-gray-300 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border border-gray-300 text-center">{{ $user->id }}</td>
                        <td class="py-2 px-4 border border-gray-300 text-center">{{ $user->first_name }}</td>
                        <td class="py-2 px-4 border border-gray-300 text-center">{{ $user->last_name }}</td>
                        <td class="py-2 px-4 border border-gray-300 text-center">
                            <div class="flex justify-evenly">
                                <a href="users/{{$user->id}}/edit/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Editar</a>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                                        Deshabilitar
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

    <section>

        <div class="flex justify-center mt-5">
            <h1 class="text-2xl font-bold m-4">Usuarios Deshabilitados</h1>
        </div>

        <div class="overflow-x-auto mt-5">

            <table class="min-w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border border-gray-300 text-center">ID</th>
                        <th class="py-2 px-4 border border-gray-300 text-center">Nombre</th>
                        <th class="py-2 px-4 border border-gray-300 text-center">Apellido</th>
                        <th class="py-2 px-4 border border-gray-300 text-center">Habilitar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersTrashed as $user)
                    <tr>
                        <td class="py-2 px-4 border border-gray-300 text-center">{{ $user->id }}</td>
                        <td class="py-2 px-4 border border-gray-300 text-center">{{ $user->first_name }}</td>
                        <td class="py-2 px-4 border border-gray-300 text-center">{{ $user->last_name }}</td>
                        <td class="py-2 px-4 border border-gray-300 text-center">
                            <div class="flex justify-evenly">
                                <form action="{{ route('users.restore', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH') <!-- Cambiado de DELETE a PATCH -->
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                                        Habilitar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
</body>
@endsection