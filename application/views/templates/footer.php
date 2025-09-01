</div> <!-- End container -->

    <footer class="bg-dark text-light text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0">
                <i class="fas fa-copyright me-1"></i>
                <?php echo date('Y'); ?> KLA Service Center - Customer Order Form System
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Add cost item functionality
        function addCostItem() {
            var container = document.getElementById('cost-items-container');
            var div = document.createElement('div');
            div.className = 'row mb-2 cost-item-row';
            div.innerHTML = `
                <div class="col-md-6">
                    <input type="text" class="form-control" name="cost_items[]" placeholder="Item Name">
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="cost_values[]" placeholder="Cost" min="0" step="1000">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeCostItem(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(div);
        }

        function removeCostItem(button) {
            button.closest('.cost-item-row').remove();
        }

        // Set today's date as default
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            var receivedDate = document.getElementById('received_date');
            if (receivedDate && !receivedDate.value) {
                receivedDate.value = today;
            }
        });
    </script>
</body>
</html>