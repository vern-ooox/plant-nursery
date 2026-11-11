@extends('layouts.app')
@section('title', $plant->name)
@section('content')
<h1 class="text-2xl font-bold">{{ $plant->name }}</h1>
<p class="mt-2">Category: {{ ucfirst($plant->category) }}</p>
<p>Unit price: {{ number_format($plant->unit_price, 2) }}</p>
<p>Status: {{ $plant->stock_status === 'in_stock' ? 'In stock' : 'Out of stock' }}</p>
<p class="mt-2">{{ $plant->description }}</p>
<a class="mt-4 inline-block text-green-800 underline" href="{{ route('plants.index') }}">Back to plants</a>
@endsection