@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Plant Nursery Dashboard</h1>
        <p class="mt-2 text-gray-700">
            Welcome, {{ auth()->user()->name }}. Choose a section to continue.
        </p>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <section class="rounded-lg bg-white p-6 shadow">
            <h2 class="mb-2 text-xl font-semibold">Plant Management</h2>
            <p class="mb-4 text-gray-700">
                Add, view, edit, and remove plant inventory records.
            </p>
            <a href="{{ route('plants.index') }}"
               class="inline-block rounded bg-green-700 px-5 py-3 text-white">
                Go to Plants
            </a>
        </section>

        <section class="rounded-lg bg-white p-6 shadow">
            <h2 class="mb-2 text-xl font-semibold">Plant Reports</h2>
            <p class="mb-4 text-gray-700">
                Filter inventory by category and stock status, then export reports.
            </p>
            <a href="{{ route('reports.plants') }}"
               class="inline-block rounded bg-blue-700 px-5 py-3 text-white">
                Go to Reports
            </a>
        </section>
    </div>
@endsection