<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        // Obtiene todos los datos de la tabla inventories
        $inventories = Inventory::all();

        // Pasa la variable $inventories a la vista
        return view('inventory.index', compact('inventories'));
    }


    


    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.show', compact('inventory'));
    }



    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $inventory = new Inventory();
        $inventory->name = $request->name;
        $inventory->brand = $request->brand;
        $inventory->model = $request->model;
        $inventory->serial_number = $request->serial_number;
        $inventory->color = $request->color;
        $inventory->quantity = $request->quantity;
        $inventory->save();

        return redirect()->route('inventory.index')->with('success', 'Material guardado correctamente');
    }


    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventory'));
    }


    public function update(Request $request, $id)
    {
        // Encuentra el inventario por ID
        $inventory = Inventory::findOrFail($id);

        // Actualiza los campos
        $inventory->name = $request->name;
        $inventory->brand = $request->brand;
        $inventory->model = $request->model;
        $inventory->serial_number = $request->serial_number;
        $inventory->color = $request->color;
        $inventory->quantity = $request->quantity;

        // Guarda los cambios
        $inventory->save();

        // Redirige a la lista de inventarios con un mensaje de éxito
        return redirect()->route('inventory.index')->with('success', 'Material actualizado correctamente');
    }


    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Material eliminado correctamente');
    }
    

    public function deleteWithDetails(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        // Validar que la cantidad a eliminar no supere la cantidad en inventario
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $inventory->quantity,
            'reason' => 'required|string|max:255',
        ]);

        // Actualizar la cantidad en el inventario
        $inventory->quantity -= $request->quantity;
        $inventory->save();

        // Opcional: Registrar en un log o historial el motivo y la cantidad eliminada

        return redirect()->route('inventory.index')->with('success', 'Material eliminado correctamente.');
    }

    
}
