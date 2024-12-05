<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Materiales</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 15px;
            font-size: 1em;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .btn-group {
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 500px;
            max-width: 90%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            color: #000;
        }

        .close:hover {
            color: red;
        }

            /* Botón Ver */
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
        color: white;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    /* Botón Editar */
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: black;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Materiales</h1>

        <div class="btn-group">
            <a href="{{ route('menu') }}" class="btn btn-primary">Volver al Menú</a>
            <button class="btn btn-success" onclick="exportTableToExcel('materialsTable', 'Lista_de_Materiales')">Descargar Excel</button>
        </div>

        <input id="searchInput" type="text" class="form-control mb-3" placeholder="Buscar Material..." style="padding: 10px; font-size: 1em; border-radius: 5px; border: 1px solid #ddd;">

        <table id="materialsTable" class="table">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serie</th>
                    <th>Color</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->quantity }}</td>
                    <td>{{ $inventory->name }}</td>
                    <td>{{ $inventory->brand }}</td>
                    <td>{{ $inventory->model }}</td>
                    <td>{{ $inventory->serial_number }}</td>
                    <td>{{ $inventory->color }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('inventory.show', $inventory->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('inventory.edit', $inventory->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button class="btn btn-danger btn-sm" onclick="openDeleteModal({{ $inventory->id }}, '{{ $inventory->name }}')">Borrar</button>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeDeleteModal()">&times;</span>
            <h2>Eliminar Material</h2>
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" id="inventoryId" name="inventory_id">
                <p>¿Cuántas unidades deseas eliminar del inventario?</p>
                <input type="number" name="quantity" class="form-control mb-3" min="1" required>
                <p>Motivo de la eliminación:</p>
                <textarea name="reason" class="form-control mb-3" rows="3" required></textarea>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

    <script>
        // Modal Functions
        function openDeleteModal(id, name) {
            document.getElementById('inventoryId').value = id;
            const form = document.getElementById('deleteForm');
            form.action = `/inventory/${id}`;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Search Function
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let rows = document.querySelectorAll('#materialsTable tbody tr');

            rows.forEach(row => {
                let rowText = row.innerText.toLowerCase();
                row.style.display = rowText.includes(searchValue) ? '' : 'none';
            });
        });

        // Export to Excel Function
        function exportTableToExcel(tableID, filename = '') {
            let table = document.getElementById(tableID);
            let rows = Array.from(table.querySelectorAll('tr'));

            let data = [
                ['Cantidad', 'Nombre', 'Marca', 'Modelo', 'Serie', 'Color']
            ];

            rows.forEach(row => {
                let cells = Array.from(row.querySelectorAll('td, th'));
                cells.pop(); // Excluir columna de acciones
                let rowData = cells.map(cell => cell.innerText);
                data.push(rowData);
            });

            let wb = XLSX.utils.book_new();
            let ws = XLSX.utils.aoa_to_sheet(data);

            XLSX.utils.book_append_sheet(wb, ws, "Materiales");
            XLSX.writeFile(wb, filename ? filename + '.xlsx' : 'Lista_de_Materiales.xlsx');
        }
    </script>
</body>
</html>
