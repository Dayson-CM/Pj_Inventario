<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Inventario - Inventario_PJ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(to right, #ece9e6, #ffffff);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: scale(1.03);
            box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .detail-item {
            font-size: 1.2em;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            color: #555;
        }

        .detail-item strong {
            color: #222;
        }

        .btn {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 1em;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background: #0056b3;
            transform: translateY(-3px);
        }

        .btn:active {
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalle de Inventario</h1>
        <div class="detail-item"><strong>Nombre:</strong> <span>{{ $inventory->name }}</span></div>
        <div class="detail-item"><strong>Marca:</strong> <span>{{ $inventory->brand }}</span></div>
        <div class="detail-item"><strong>Modelo:</strong> <span>{{ $inventory->model }}</span></div>
        <div class="detail-item"><strong>Serie:</strong> <span>{{ $inventory->serial_number }}</span></div>
        <div class="detail-item"><strong>Color:</strong> <span>{{ $inventory->color }}</span></div>
        <div class="detail-item"><strong>Cantidad:</strong> <span>{{ $inventory->quantity }}</span></div>
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('inventory.index') }}" class="btn">Volver a la Lista</a>
        </div>
    </div>
</body>
</html>
