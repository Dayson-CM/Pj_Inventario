<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Material - Inventario_PJ</title>
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
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 1.8em;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            color: white;
            background-color: #6c757d;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-link:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Material</h1>
        <form action="{{ route('inventory.store') }}" method="POST">
            @csrf

            <label for="name">Nombre del Material</label>
            <input type="text" id="name" name="name" required>

            <label for="brand">Marca</label>
            <input type="text" id="brand" name="brand">

            <label for="model">Modelo</label>
            <input type="text" id="model" name="model">

            <label for="serial_number">Número de Serie</label>
            <input type="text" id="serial_number" name="serial_number">

            <label for="color">Color</label>
            <input type="text" id="color" name="color">

            <label for="quantity">Cantidad</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <button type="submit">Guardar Material</button>
        </form>

        <!-- Botón para ir al menú principal -->
        <a href="{{ route('menu') }}" class="btn-link">Ir al Menú Principal</a>
    </div>
</body>
</html>
