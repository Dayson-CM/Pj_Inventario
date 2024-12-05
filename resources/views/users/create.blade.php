<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario Nuevo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .btn-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrar Usuario Nuevo</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            
            <label for="name">Nombre:</label>
            <input type="text" name="name" required>
            
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" required>
            
            <label for="role">Rol:</label>
            <select name="role" required>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
            
            <button type="submit">Guardar Usuario</button>
        </form>

        <a href="{{ route('users.usuarios') }}" class="btn-link btn-secondary">Volver a la lista de usuarios</a>
        <a href="{{ route('menu') }}" class="btn-link btn-success">Ir al Menú Principal</a>
    </div>
</body>
</html>
