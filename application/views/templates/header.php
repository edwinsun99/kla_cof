<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body py-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                </div>
                
                <h2 class="text-success mb-3">Data Berhasil Disimpan!</h2>
                
                <p class="lead mb-4">
                    Customer Order Form telah berhasil dibuat dan disimpan ke database.
                </p>

                <div class="alert alert-info">
                    <strong>COF ID:</strong> <?php echo isset($service_order_id) ? $service_order_id : 'N/A'; ?>
                </div>

                <div class="d-grid gap-3">
                    <a href="<?php echo base_url('service_order/generate_pdf/' . $service_order_id); ?>" 
                       class="btn btn-success btn-lg">
                        <i class="fas fa-file-pdf me-2"></i>
                        Generate & Download PDF
                    </a>
                    
                    <a href="<?php echo base_url('serviceorder'); ?>" 
                       class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>
                        Input Data Baru
                    </a>
                </div>

                <div class="mt-4">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Klik "Generate & Download PDF" untuk mengunduh form COF yang sudah terisi
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border: none;
}

.btn-lg {
    padding: 12px 30px;
    font-weight: 500;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card {
    animation: fadeInUp 0.6s ease-out;
}
</style>