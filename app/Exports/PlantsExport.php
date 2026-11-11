<?php

namespace App\Exports;

use App\Models\Plant;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PlantsExport implements FromQuery, WithHeadings, WithMapping
{
    public function __construct(
        private readonly ?string $category = null,
        private readonly ?string $stockStatus = null,
    ) {}

    public function query(): Builder
    {
        return Plant::query()
            ->when($this->category, fn ($query) => $query->where('category', $this->category))
            ->when($this->stockStatus, fn ($query) => $query->where('stock_status', $this->stockStatus))
            ->orderBy('name');
    }

    public function headings(): array
    {
        return ['Plant Name', 'Category', 'Unit Price', 'Description', 'Stock Status'];
    }

    public function map($plant): array
    {
        return [
            $plant->name,
            $plant->category,
            $plant->unit_price,
            $plant->description,
            $plant->stock_status === 'in_stock' ? 'In stock' : 'Out of stock',
        ];
    }
}