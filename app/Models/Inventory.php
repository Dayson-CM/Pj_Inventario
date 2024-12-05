<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // Agrega los campos que se permiten asignar masivamente
    protected $fillable = ['name', 'brand', 'model', 'serial_number', 'color', 'quantity'];
}

