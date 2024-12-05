<x-guest-layout>
    <style>
        /* Fondo de la pantalla */
        .bg-cover {
            background-image: url('/images/fondo-login.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }

        /* Contenedor principal */
        .main-container {
            display: flex;
            justify-content: center; /* Centrado horizontal */
            align-items: center; /* Centrado vertical */
            height: 100%;
        }

        /* Formulario */
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 350px;
        }

        /* Título */
        .form-title {
            color: #1d4ed8;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Logo */
        .form-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Inputs */
        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Botón */
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1d4ed8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
        }

        button:hover {
            background-color: #2563eb;
        }

        /* Enlace */
        a {
            color: #1d4ed8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Fondo de pantalla -->
    <div class="bg-cover">
        <div class="main-container">
            <!-- Contenedor del formulario -->
            <div class="form-container">
                <!-- Logo -->
                <div class="form-logo">
                    <img src="/images/logo-institucion.png" alt="Logo" class="h-16 mx-auto">
                </div>

                <!-- Título -->
                <h1 class="form-title">INVENTARIO_PJ</h1>

                <!-- Formulario -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                        @error('email')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Recordar sesión -->
                    <div class="flex items-center mt-4">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">Recuérdame</label>
                    </div>

                    <!-- Botón de inicio de sesión -->
                    <div class="mt-4">
                        <button type="submit">Iniciar Sesión</button>
                    </div>

                    <!-- Recuperar contraseña -->
                    @if (Route::has('password.request'))
                        <div class="mt-4 text-center">
                            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
