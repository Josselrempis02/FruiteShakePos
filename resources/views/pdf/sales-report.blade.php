<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report</title>
    <style>
         body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot td {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Daily Sales Report</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesData as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data['date'] }}</td>
                    <td>{{ $data['product'] }}</td>
                    <td>{{ $data['quantity'] }}</td>
                    <td>₱{{ number_format($data['total_sales'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;">Total Sales:</td>
                <td>₱{{ number_format($salesData->sum('total_sales'), 2) }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
