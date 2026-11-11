@extends('layouts.app')

@section('title', 'Plants')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Plants</h1>

        <div class="flex gap-3">
            <a href="{{ route('dashboard') }}"
               class="inline-block rounded bg-green-700 px-4 py-2 text-white">
                Back to dashboard
            </a>

            <a href="{{ route('plants.create') }}"
               class="inline-block rounded bg-green-700 px-4 py-2 text-white">
                Add plant
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded bg-green-100 p-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white">
        <thead>
            <tr>
                <th class="p-2 text-left">Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
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
                    <td class="p-2">
                        <a href="{{ route('plants.show', $plant) }}">View</a>
                        |
                        <a href="{{ route('plants.edit', $plant) }}">Edit</a>

                        <form method="POST"
                              action="{{ route('plants.destroy', $plant) }}"
                              class="inline"
                              onsubmit="return confirm('Delete this plant?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center">
                        No plants recorded yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $plants->links() }}
    </div>
@endsection