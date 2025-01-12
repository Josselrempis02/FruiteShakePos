<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        .receipt-container {
         
            padding: 30px;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .receipt-header, .receipt-footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .receipt-header h1 {
            font-size: 2rem;
            margin: 0;
        }

        .receipt-header p {
            font-size: 1rem;
            margin: 0;
        }

        .receipt-details {
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .receipt-details p {
            margin: 0;
        }

        .receipt-items table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .receipt-items th, .receipt-items td {
            font-size: 1rem;
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .receipt-totals {
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .receipt-totals p {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
        }

        .total-amount {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }

        .receipt-footer p {
            font-size: 1rem;
            margin: 0;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                background-color: #fff;
            }

            .receipt-container {
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <!-- Header -->
        <div class="receipt-header">
            <h1>Fruit Shake</h1>
            <p>Date: {{ $order->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <!-- Order Details -->
        <div class="receipt-details">
            <p><strong>Order #:</strong> {{ $order->order_number }}</p>
            <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
        </div>

        <!-- Items -->
        <div class="receipt-items">
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₱{{ number_format($item->price, 2) }}</td>
                            <td>₱{{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Totals -->
        <div class="receipt-totals">
            <p><strong>Subtotal:</strong> <span>₱{{ number_format($order->subtotal, 2) }}</span></p>
            <p><strong>Discount:</strong> <span>₱{{ number_format($order->discount, 2) }}</span></p>
            <p class="total-amount"><strong>Total:</strong> <span>₱{{ number_format($order->total, 2) }}</span></p>
            <p><strong>Payment Method:</strong> <span>{{ $order->payment_method }}</span></p>
        </div>

        <!-- Footer -->
        <div class="receipt-footer">
            <p>Thank you for choosing Fruit Shake!</p>
            <p>Visit us again!</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
