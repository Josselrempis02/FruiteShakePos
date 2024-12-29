<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body rounded" style="background-color: #FDD493;">
                <div class="text-center py-4">
                    <h5 class="text-danger fw-bold mb-4">Amount Payable</h5>
                    <h1 class="fw-bold mb-4" style="color: #000;">₱ 100.00</h1>
                    <h6 class="text-danger fw-bold mb-4">Choose payment option</h6>
                    <div class="d-grid gap-3">
                        <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#cashModal">CASH</button>
                        <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#gcashModal">GCASH</button>
                        <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#mayaModal">MAYA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cash Modal -->
<div class="modal fade" id="cashModal" tabindex="-1" aria-labelledby="cashModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body rounded" style="background-color: #FDD493;">
                <div class="text-center py-4" style="background-color: #FDD493; border-radius: 10px;">
                    <h5 class="text-danger fw-bold mb-4">Amount Payable</h5>
                    <h1 class="fw-bold mb-4" style="color: #000;">₱ 100.00</h1>
                    <div class="mb-3 text-start">
                        <label for="amountReceived" class="fw-bold mb-2 d-block">Amount Received</label>
                        <input type="number" id="amountReceived" class="form-control" style="background-color: #D4B289; height: 50px; border: none;" >
                    </div>
                    <div class="d-grid gap-3">
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-dark flex-fill">20</button>
                            <button type="button" class="btn btn-dark flex-fill">50</button>
                            <button type="button" class="btn btn-dark flex-fill">100</button>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-dark flex-fill">200</button>
                            <button type="button" class="btn btn-dark flex-fill">300</button>
                            <button type="button" class="btn btn-dark flex-fill">400</button>
                        </div>
                        <div class="d-flex gap-3">
                            <button type="button" class="btn btn-dark flex-fill">500</button>
                            <button type="button" class="btn btn-dark flex-fill">800</button>
                            <button type="button" class="btn btn-dark flex-fill">1000</button>
                        </div>
                    </div>
                    <div class="mt-4 d-grid gap-3">
                        <button type="button" class="btn text-white fw-bold" style="background-color: #D9476C; height: 50px;">EXACT AMOUNT</button>
                        <button type="button" class="btn text-white fw-bold" style="background-color: #FF6A28; height: 50px;" id="proceedButton">PROCEED</button>
                    </div>

                    <script>
                        // Add an event listener to the "PROCEED" button
                        document.getElementById('proceedButton').addEventListener('click', function() {
                            // Change amount (for this example, it's hardcoded as 10.00)
                            const changeAmount = 10.00;
                            
                            // Display an alert with "Complete" and the change amount
                            alert(`Complete\nChange: ₱ ${changeAmount.toFixed(2)}`);
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- GCash Modal -->
<div class="modal fade" id="gcashModal" tabindex="-1" aria-labelledby="gcashModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center py-4">
                <h5 class="fw-bold">GCash Payment</h5>
                <p>GCash payment process...</p>
            </div>
        </div>
    </div>
</div>

<!-- Maya Modal -->
<div class="modal fade" id="mayaModal" tabindex="-1" aria-labelledby="mayaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center py-4">
                <h5 class="fw-bold">Maya Payment</h5>
                <p>Maya payment process...</p>
            </div>
        </div>
    </div>
</div>

