<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="text-center mb-4">
            <h1>Sales Reports</h1>
        </div>

        <!-- Daily Sales Report -->
        <section class="mb-5">
            <h2 class="text-center">Daily Sales Report</h2>
            <p class="text-muted text-center">For <span id="daily-date">2025-01-10</span></p>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Transaction ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody id="daily-sales-data">
                    <!-- Dynamic rows will go here -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total Sales</td>
                        <td id="daily-total-sales" class="fw-bold">$0.00</td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-center mt-3">
                <button id="generate-daily-pdf" class="btn btn-primary">Generate Daily PDF</button>
            </div>
        </section>

        <!-- Monthly Sales Report -->
        <section>
            <h2 class="text-center">Monthly Sales Report</h2>
            <p class="text-muted text-center">For the month of <span id="monthly-month">January</span></p>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Transaction ID</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody id="monthly-sales-data">
                    <!-- Dynamic rows will go here -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Total Sales</td>
                        <td id="monthly-total-sales" class="fw-bold">$0.00</td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-center mt-3">
                <button id="generate-monthly-pdf" class="btn btn-primary">Generate Monthly PDF</button>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        // Example data
        const dailySales = [
            { id: 1, transactionId: "D001", customer: "John Doe", amount: 100 },
            { id: 2, transactionId: "D002", customer: "Alice Smith", amount: 200 },
        ];

        const monthlySales = [
            { id: 1, transactionId: "M001", date: "2025-01-01", customer: "John Doe", amount: 100 },
            { id: 2, transactionId: "M002", date: "2025-01-05", customer: "Alice Smith", amount: 200 },
            { id: 3, transactionId: "M003", date: "2025-01-10", customer: "Bob Johnson", amount: 150 },
        ];

        // Populate Daily Sales
        const dailyTbody = document.getElementById("daily-sales-data");
        const dailyDate = "2025-01-10";
        document.getElementById("daily-date").textContent = dailyDate;
        let dailyTotal = 0;

        dailySales.forEach((sale, index) => {
            dailyTotal += sale.amount;
            dailyTbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${sale.transactionId}</td>
                    <td>${sale.customer}</td>
                    <td>$${sale.amount.toFixed(2)}</td>
                </tr>
            `;
        });
        document.getElementById("daily-total-sales").textContent = `$${dailyTotal.toFixed(2)}`;

        // Populate Monthly Sales
        const monthlyTbody = document.getElementById("monthly-sales-data");
        const monthlyMonth = "January";
        document.getElementById("monthly-month").textContent = monthlyMonth;
        let monthlyTotal = 0;

        monthlySales.forEach((sale, index) => {
            monthlyTotal += sale.amount;
            monthlyTbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${sale.transactionId}</td>
                    <td>${sale.date}</td>
                    <td>${sale.customer}</td>
                    <td>$${sale.amount.toFixed(2)}</td>
                </tr>
            `;
        });
        document.getElementById("monthly-total-sales").textContent = `$${monthlyTotal.toFixed(2)}`;

        // Generate Daily PDF
        document.getElementById("generate-daily-pdf").addEventListener("click", () => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();
            pdf.text(`Daily Sales Report (${dailyDate})`, 10, 10);

            let y = 20;
            dailySales.forEach((sale, index) => {
                pdf.text(`${index + 1}. ${sale.transactionId} - $${sale.amount.toFixed(2)}`, 10, y);
                y += 10;
            });

            pdf.text(`Total Sales: $${dailyTotal.toFixed(2)}`, 10, y + 10);
            pdf.save(`Daily_Sales_Report_${dailyDate}.pdf`);
        });

        // Generate Monthly PDF
        document.getElementById("generate-monthly-pdf").addEventListener("click", () => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();
            pdf.text(`Monthly Sales Report (${monthlyMonth})`, 10, 10);

            let y = 20;
            monthlySales.forEach((sale, index) => {
                pdf.text(`${index + 1}. ${sale.transactionId} - $${sale.amount.toFixed(2)}`, 10, y);
                y += 10;
            });

            pdf.text(`Total Sales: $${monthlyTotal.toFixed(2)}`, 10, y + 10);
            pdf.save(`Monthly_Sales_Report_${monthlyMonth}.pdf`);
        });
    </script>
</body>
</html>
