@extends('layouts.app')

@section('content')

<body>
    <section>
        <div class="container mx-auto sm:px-4 py-5 h-full">
            <div class="flex flex-wrap  flex justify-center items-center h-full">
                <div class="w-full md:w-2/3 pr-4 pl-4 lg:w-1/2 pr-4 pl-4 xl:w-2/5 pr-4 pl-4">
                    <div class="relative flex flex-col min-w-0 break-words border bg-white border-1 border-gray-300 bg-gray-800 text-white" style="border-radius: 1rem;">
                        <div class=" bg-gray-800 flex-auto p-6 p-12 text-center">

                            <div class="md:mb-12 md:mt-6 pb-5">

                                <h2 class="font-bold text-2xl mb-2 uppercase">Iniciar Sesion</h2>
                                <p class="text-white-50 mb-5">Porfavor introduzca sus credenciales</p>

                                <form action="/login" method="POST">
                                    @csrf

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="email">Email</label>
                                            <input type="text" id="email" name="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('email')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <div>
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" name="password" id="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded py-2 px-4 text-lg leading-normal rounded" />
                                        </div>
                                        @error('password')
                                        <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <p class="text-xs mb-5 lg:pb-2"><a class="text-white-50" href="#!">Olvidaste tu
                                            contraseña?</a></p>

                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" value="Login" type="submit">Iniciar Sesion</button>

                                </form>
                            </div>

                            <div>
                                <p class="mb-0">No tienes una cuenta? <a href="#!" class="text-white-50 fw-bold" href="/register">Registrate</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection