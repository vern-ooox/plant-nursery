@csrf
@if ($plant->exists)
    @method('PUT')
@endif

<label class="block mb-3">
    Plant name
    <input name="name" value="{{ old('name', $plant->name) }}" required class="block w-full rounded border p-2">
    @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
</label>

<label class="block mb-3">
    Category
    <select name="category" required class="block w-full rounded border p-2">
        @foreach (['ornamental', 'flowering', 'succulent', 'herb'] as $category)
            <option value="{{ $category }}" @selected(old('category', $plant->category) === $category)>
                {{ ucfirst($category) }}
            </option>
        @endforeach
    </select>
    @error('category') <span class="text-red-600">{{ $message }}</span> @enderror
</label>

<label class="block mb-3">
    Unit price
    <input type="number" name="unit_price" min="0" step="0.01"
           value="{{ old('unit_price', $plant->unit_price) }}" required class="block w-full rounded border p-2">
    @error('unit_price') <span class="text-red-600">{{ $message }}</span> @enderror
</label>

<label class="block mb-3">
    Description
    <textarea name="description" required class="block w-full rounded border p-2">{{ old('description', $plant->description) }}</textarea>
    @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
</label>

<label class="block mb-4">
    Stock status
    <select name="stock_status" required class="block w-full rounded border p-2">
        <option value="in_stock" @selected(old('stock_status', $plant->stock_status) === 'in_stock')>In stock</option>
        <option value="out_of_stock" @selected(old('stock_status', $plant->stock_status) === 'out_of_stock')>Out of stock</option>
    </select>
    @error('stock_status') <span class="text-red-600">{{ $message }}</span> @enderror
</label>

<button class="rounded bg-green-700 px-4 py-2 text-white">Save plant</button>