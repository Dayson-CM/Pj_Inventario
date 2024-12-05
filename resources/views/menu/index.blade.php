<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Inventario_PJ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor principal */
        .container {
            text-align: center;
            width: 90%;
            max-width: 1000px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.5s ease-in-out;
            position: relative;
        }

        /* Botón de Cerrar Sesión */
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 8px 16px;
            font-size: 0.9em;
            color: #fff;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #c82333;
        }

        /* Título principal */
        h1 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        /* Efecto de entrada */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Contenedor del menú */
        .menu-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Estilos para cada tarjeta de menú */
        .menu-item {
            width: 220px;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            color: white;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        /* Estilos específicos de color para cada tarjeta */
        .menu-item.blue { background-color: #007bff; }
        .menu-item.gray { background-color: #6c757d; }
        .menu-item.cyan { background-color: #17a2b8; }
        .menu-item.teal { background-color: #20c997; }

        /* Efecto de hover */
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.2);
        }

        /* Estilo del título y descripción en cada tarjeta */
        .menu-item p {
            margin: 0;
            font-size: 1.1em;
        }

        .menu-item small {
            display: block;
            margin-top: 5px;
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.9);
        }

        /* Estilo del botón dentro de cada tarjeta */
        .menu-item button {
            margin-top: 15px;
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .menu-item button:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* Adaptación para pantallas pequeñas (móviles) */
        @media (max-width: 100%) {
            .menu-container {
                flex-direction: column;
                gap: 15px;
            }
            .menu-item {
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
            }
            h1 {
                font-size: 1.8em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Botón de Cerrar Sesión -->
        <a href="{{ route('logout') }}" class="logout-button"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Salir
        </a>
        
        <!-- Formulario de Cerrar Sesión Oculto -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <h1>INVENTARIO_PJ</h1>
        <div class="menu-container">
            <a href="{{ route('inventory.create') }}" class="menu-item blue">
                <p>Agregar Material</p>
                <small>Añadir nuevos materiales al inventario.</small>
                <button>Ir a Agregar Producto</button>
            </a>
            <a href="{{ route('inventory.index') }}" class="menu-item cyan">
                <p>Ver Inventario General</p>
                <small>Consulta el inventario general de todos los materiales.</small>
                <button>Ir al Inventario General</button>
            </a>
            
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.usuarios') }}" class="menu-item teal">
                    <p>Registrar Usuario Nuevo</p>
                    <small>Registra nuevos usuarios para que puedan acceder al inventario.</small>
                    <button>Ir a Gestión de Usuarios</button>
                </a>
            @endif
        </div>
    </div>
</body>
</html>
