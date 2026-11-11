@extends('layouts.app')

@section('title', $plant->name)

@section('content')
    <h1 class="mb-4 text-2xl font-bold">{{ $plant->name }}</h1>

    <div class="rounded bg-white p-6">
        <p><strong>Category:</strong> {{ ucfirst($plant->category) }}</p>
        <p><strong>Unit price:</strong> {{ number_format($plant->unit_price, 2) }}</p>
        <p>
            <strong>Stock status:</strong>
            {{ $plant->stock_status === 'in_stock' ? 'In stock' : 'Out of stock' }}
        </p>
        <p class="mt-3"><strong>Description:</strong> {{ $plant->description }}</p>
    </div>

    <div class="mt-4 flex gap-4">
        <a href="{{ route('plants.edit', $plant) }}" class="text-blue-700 underline">Edit plant</a>
        <a href="{{ route('plants.index') }}" class="text-green-800 underline">Back to plants</a>
    </div>
@endsection