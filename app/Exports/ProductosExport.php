<?php

namespace App\Exports;

use App\Models\producto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Producto::select('nombre', 'stock', 'precioventa')->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Stock',
            'Precio de Venta',
        ];
    }
}
