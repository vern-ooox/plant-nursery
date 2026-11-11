@extends('layouts.app')

@section('title', 'Plant Reports')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Plant Reports</h1>

        <a href="{{ route('dashboard') }}"
           class="inline-block rounded bg-green-700 px-4 py-2 text-white">
            Back to dashboard
        </a>
    </div>

    <form method="GET" action="{{ route('reports.plants') }}" class="mb-4 flex gap-3">
        <select name="category" class="rounded border p-2">
            <option value="">All categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category }}" @selected(request('category') === $category)>
                    {{ ucfirst($category) }}
                </option>
            @endforeach
        </select>

        <select name="stock_status" class="rounded border p-2">
            <option value="">All stock statuses</option>
            <option value="in_stock" @selected(request('stock_status') === 'in_stock')>
                In stock
            </option>
            <option value="out_of_stock" @selected(request('stock_status') === 'out_of_stock')>
                Out of stock
            </option>
        </select>

        <button type="submit" class="rounded bg-green-700 px-4 py-2 text-white">
            Filter
        </button>

        <a href="{{ route('reports.plants') }}" class="px-3 py-2">Clear</a>
    </form>

    <div class="mb-4 flex gap-3">
        <a href="{{ route('reports.plants.excel', request()->query()) }}"
           class="inline-block rounded bg-blue-700 px-4 py-2 text-white">
            Export Excel
        </a>

        <a href="{{ route('reports.plants.pdf', request()->query()) }}"
           class="inline-block rounded bg-red-700 px-4 py-2 text-white">
            Export PDF
        </a>
    </div>

    <table class="w-full bg-white">
        <thead>
            <tr>
                <th class="p-2 text-left">Plant name</th>
                <th>Category</th>
                <th>Unit price</th>
                <th>Stock status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plants as $plant)
                <tr class="border-t">
                    <td class="p-2">{{ $plant->name }}</td>
                    <td>{{ ucfirst($plant->category) }}</td>
                    <td>{{ number_format($plant->unit_price, 2) }}</td>
                    <td>
                        {{ $plant->stock_status === 'in_stock' ? 'In stock' : 'Out of stock' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center">No matching plants.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">{{ $plants->links() }}</div>
@endsection