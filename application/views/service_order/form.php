<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Order Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-size: 14px;
        }
        .sidebar {
            height: 100vh;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            padding: 12px;
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #9b79deff;
        }
        .content {
            margin-left: 230px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="px-3">Menu</h4>
        <a href="#"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a href="#"><i class="fas fa-file-alt me-2"></i>COF</a>
        <a href="#"><i class="fas fa-cog me-2"></i>Settings</a>
    </div>  

    <!-- Content -->
    <div class="content">
        <h3><i class="fas fa-file-alt me-2"></i>Customer Order Form (COF)</h3>
        <p class="mb-4">Input data customer dan service order</p>

        <form id="cofForm">
            <!-- Customer Information -->
            <h5 class="text-primary mb-3"><i class="fas fa-user me-2"></i>Customer Information</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Customer Name</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact Person</label>
                    <input type="text" name="contact" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-8">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" required>
                </div>
            </div>

            <hr>

            <!-- Service Information -->
            <h5 class="text-primary mb-3"><i class="fas fa-wrench me-2"></i>Service Information</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Received Date</label>
                    <input type="date" name="received_date" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Started Date</label>
                    <input type="date" name="started_date" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Finished Date</label>
                    <input type="date" name="finished_date" class="form-control">
                </div>
            </div>

            <hr>

            <!-- Service Unit -->
            <h5 class="text-primary mb-3"><i class="fas fa-laptop me-2"></i>Service Unit</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Brand</label>
                    <select name="brand" class="form-control" required>
                        <option value="">Select Brand</option>
                        <option>HP</option>
                        <option>Lenovo</option>
                        <option>Acer</option>
                        <option>Asus</option>
                        <option>Toshiba</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Product Number</label>
                    <input type="text" name="product_number" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Serial Number</label>
                    <input type="text" name="serial_number" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Product Type</label>
                    <input type="text" name="product_type" class="form-control" placeholder="Laptop, Printer, etc.">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Accessories</label>
                    <input type="text" name="accessories" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Fault Description</label>
                <textarea name="fault_description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Unit Condition</label>
                <textarea name="unit_condition" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Repair Summary</label>
                <textarea name="repair_summary" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Total Cost</label>
                <input type="number" name="total_cost" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i>Save Data</button>
                <button type="reset" class="btn btn-secondary ms-3"><i class="fas fa-undo me-2"></i>Reset</button>
            </div>
        </form>
    </div>

    <!-- Modal sukses -->
    <div class="modal fade" id="successModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
          <i class="fas fa-check-circle fa-4x text-success mb-3"></i>
          <h4>Data Berhasil Disimpan!</h4>
          <p>Customer Order Form telah berhasil dibuat dan disimpan ke database.</p>
          <a href="#" id="downloadPdf" class="btn btn-success mb-2">
            <i class="fas fa-file-pdf me-2"></i>Generate & Download PDF
          </a>
          <button class="btn btn-primary" onclick="location.reload()">Input Data Baru</button>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#cofForm").submit(function(e){
            e.preventDefault(); // stop reload

            $.ajax({
                url: "<?= site_url('serviceorder/store') ?>",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
               success: function(res){
    if(res.status === "success"){
        // arahkan link ke file print_cof.php dengan id dari response
        $("#downloadPdf").attr("href", "<?= base_url('print_cof.php?id=') ?>"+res.order_id);
        
        var modal = new bootstrap.Modal(document.getElementById('successModal'));
        modal.show();
    } else {
        alert("Gagal simpan data!");
    }
},

            });
        });
    });
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceOrder extends CI_Controller {

    public function print_cof($id = null)
    {
        // Ambil data dari model (contoh)
        $data['order'] = $this->db->get_where('orders', ['id' => $id])->row();

        // Load library TCPDF
        $this->load->library('Pdf'); // pastikan sudah buat wrapper tcpdf di libraries/Pdf.php

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Customer Order Form');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();

        // Render view ke HTML
        $html = $this->load->view('print_cof', $data, true);

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('COF_'.$id.'.pdf', 'I'); // I = inline, D = download
    }
}

    </script>
</body>
</html>
