<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inventario - Inventario_PJ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(to right, #f8f9fa, #ffffff);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: scale(1.02);
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        label {
            font-size: 1em;
            color: #555;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 0.95em;
            box-sizing: border-box;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus {
            outline: none;
            border: 1px solid #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            font-size: 1em;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 5px;
        }

        .btn-primary {
            background: #007bff;
        }

        .btn-primary:hover {
            background: #0056b3;
            transform: translateY(-3px);
        }

        .btn-secondary {
            background: #6c757d;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-3px);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .btn-group a, .btn-group button {
            flex: 1;
            margin: 0 5px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn-group a, .btn-group button {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Material</h1>
        
        <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nombre del Material:</label>
            <input type="text" id="name" name="name" value="{{ $inventory->name }}" required>

            <label for="brand">Marca:</label>
            <input type="text" id="brand" name="brand" value="{{ $inventory->brand }}">

            <label for="model">Modelo:</label>
            <input type="text" id="model" name="model" value="{{ $inventory->model }}">

            <label for="serial_number">Número de Serie:</label>
            <input type="text" id="serial_number" name="serial_number" value="{{ $inventory->serial_number }}">

            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="{{ $inventory->color }}">

            <label for="quantity">Cantidad:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $inventory->quantity }}" required>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Volver a la Lista</a>
            </div>
        </form>
    </div>
</body>
</html>
