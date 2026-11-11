<?php

namespace App\Http\Controllers;

use App\Exports\PlantsExport;
use App\Models\Plant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PlantReportController extends Controller
{
    public function index(Request $request)
    {
        // Apply the selected filters to the latest saved plant records.
        $query = Plant::query();

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('stock_status')) {
            $query->where('stock_status', $request->input('stock_status'));
        }

        $plants = $query->orderBy('name')->paginate(10)->withQueryString();

        $categories = Plant::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('reports.plants', compact('plants', 'categories'));
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(
            new PlantsExport(
                $request->input('category'),
                $request->input('stock_status')
            ),
            'plant-report.xlsx'
        );
    }

    public function exportPdf(Request $request)
    {
        // Use the same filters as the report page and Excel export.
        $plants = Plant::query()
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category', $request->input('category'));
            })
            ->when($request->filled('stock_status'), function ($query) use ($request) {
                $query->where('stock_status', $request->input('stock_status'));
            })
            ->orderBy('name')
            ->get();

        $pdf = Pdf::loadView('reports.plants-pdf', compact('plants'));

        return $pdf->download('plant-report.pdf');
    }
}