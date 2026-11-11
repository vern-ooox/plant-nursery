@extends('layouts.app')
@section('title', 'Add plant')
@section('content')
<h1 class="mb-4 text-2xl font-bold">Add plant</h1>
<form method="POST" action="{{ route('plants.store') }}">
    @include('plants._form', ['plant' => new \App\Models\Plant])
</form>
@endsection