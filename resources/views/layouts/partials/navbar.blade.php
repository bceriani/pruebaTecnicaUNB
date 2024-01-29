@guest
<header class="text-gray-100 body-font bg-gray-800">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a href="/" class="flex title-font font-medium items-center text-gray-100 mb-4 md:mb-0">
      <span class="ml-3 text-xl">UNB Collections</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-100" href="/login">Iniciar Sesion</a>
      <a class="mr-5 hover:text-gray-100" href="/register">Registrarse</a>
    </nav>
  </div>
</header>
@endguest
@auth
<header class="text-gray-100 body-font bg-gray-800">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a href="/" class="flex title-font font-medium items-center text-gray-100 mb-4 md:mb-0">
      <span class="ml-3 text-xl">UNB Collections</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a href="/users" class="mr-5 hover:text-gray-100">Usuarios</a>
      <a href="/profile" class="mr-5 hover:text-gray-100">Mi Perfil</a>
      <a href="/logout" class="mr-5 hover:text-gray-100">Cerrar Sesion</a>
    </nav>
  </div>
</header>
@endauth