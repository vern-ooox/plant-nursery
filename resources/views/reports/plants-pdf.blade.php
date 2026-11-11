<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plant Inventory Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #555;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e5e7eb;
        }
    </style>
</head>
<body>
    <h1>Plant Inventory Report</h1>

    <table>
        <thead>
            <tr>
                <th>Plant name</th>
                <th>Category</th>
                <th>Unit price</th>
                <th>Description</th>
                <th>Stock status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($plants as $plant)
                <tr>
                    <td>{{ $plant->name }}</td>
                    <td>{{ ucfirst($plant->category) }}</td>
                    <td>{{ number_format($plant->unit_price, 2) }}</td>
                    <td>{{ $plant->description }}</td>
                    <td>{{ $plant->stock_status === 'in_stock' ? 'In stock' : 'Out of stock' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No matching plants.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>