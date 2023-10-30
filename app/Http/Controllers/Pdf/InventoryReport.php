<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class InventoryReport extends Controller
{
    public function pdfInventoryReportGeneration()
    {
        $products = Product::all();
        $pdf = Pdf::loadView('inventory-report', compact('products'))->setPaper([0, 0, 1100, 1000])->setWarnings(false);
        return $pdf->stream('inventory_report.pdf');        
    }
}
