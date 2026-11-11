@extends('layouts.app')
@section('title', 'Edit plant')
@section('content')
<h1 class="mb-4 text-2xl font-bold">Edit plant</h1>
<form method="POST" action="{{ route('plants.update', $plant) }}">
    @include('plants._form')
</form>
@endsection