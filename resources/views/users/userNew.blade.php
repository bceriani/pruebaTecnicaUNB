@extends('layouts.app')

@section('content')

<body>
    <section>
        <div class="container mx-auto sm:px-4 py-5 h-full">
            <div class="flex flex-wrap  flex justify-center items-center h-full">
                <div class="w-full md:w-2/3 pr-4 pl-4 lg:w-1/2 pr-4 pl-4 xl:w-2/5 pr-4 pl-4">
                    <div class="relative flex flex-col min-w-0 rounded break-words border bg-gray-800 border-1 border-gray-300 bg-gray-800 text-white" style="border-radius: 1rem;">
                        <div class="flex-auto p-6 p-12 text-center">

                            <div class="md:mb-12 md:mt-6 pb-5">

                                <h2 class="font-bold text-2xl mb-2 uppercase">Crear Nuevo Usuario</h2>

                                <form action="/users" method="POST">
                                    @csrf
                                    @method('POST')

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="first_name">Nombre</label>
                                            <input type="text" id="first_name" name="first_name" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('first_name')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="last_name">Apellido</label>
                                            <input type="text" id="last_name" name="last_name" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('last_name')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" name="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('email')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="phone_number">Numero De Telefono</label>
                                            <input type="text" id="phone_number" name="phone_number" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('phone_number')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="password">Contraseña</label>
                                            <input type="password" id="password" name="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('password')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="password_confirmation">Confirmar
                                                Contraseña</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('password_confirmation')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" value="Crear Usuario" type="submit">Crear Usuario</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

@endsection