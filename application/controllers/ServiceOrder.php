<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceOrder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model',      'customers');
        $this->load->model('ServiceOrder_model',  'orders');
        $this->load->model('CostBreakdown_model', 'costs');

        $this->load->helper(['url','form']);
        $this->load->library(['form_validation','session']);
    }

    // Halaman form input
    public function index()
    {
        $data = [
            'title'            => 'Input Customer Order Form',
            'service_order_id' => null,
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('service_order/form');
        $this->load->view('templates/footer');
    }

    // Proses simpan data
public function store()
{
    // Validasi form
    $this->form_validation->set_rules('customer_name', 'Customer Name', 'required|trim');
    $this->form_validation->set_rules('contact', 'Contact', 'required|trim');
    $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim');
    $this->form_validation->set_rules('brand', 'Brand', 'required');
    $this->form_validation->set_rules('product_type', 'Product Type', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
        // Kalau gagal validasi → kirim respon JSON error
        echo json_encode([
            'status' => 'error',
            'message' => validation_errors()
        ]);
        return;
    } 

    // 1️⃣ Insert ke tabel customers dulu
    $customerData = [
        'customer_name' => $this->input->post('customer_name'),
        'contact'       => $this->input->post('contact'),
        'phone_number'  => $this->input->post('phone_number'),
        'address'       => $this->input->post('address'),
    ];
    $customer_id = $this->customers->insert($customerData);

    if (!$customer_id) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal insert customer',
            'db_error' => $this->db->error()
        ]);
        return;
    }

    // 2️⃣ Insert ke tabel service_orders
    $orderData = [
        'customer_id'      => $customer_id,
        'received_date'    => $this->input->post('received_date'),
        'started_date'     => $this->input->post('started_date'),
        'finished_date'    => $this->input->post('finished_date'),
        'product_number'   => $this->input->post('product_number'),
        'serial_number'    => $this->input->post('serial_number'),
        'fault_description'=> $this->input->post('fault_description'),
        'accessories'      => $this->input->post('accessories'),
        'unit_condition'   => $this->input->post('unit_condition'),
        'repair_summary'   => $this->input->post('repair_summary'),
        'total_cost'       => $this->input->post('total_cost'),
        'brand'            => $this->input->post('brand'),
        'product_type'     => $this->input->post('product_type'),
        'cof_number'       => $this->input->post('cof_number')
    ];
    $order_id = $this->orders->insert($orderData);

    if (!$order_id) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Gagal insert order',
            'db_error' => $this->db->error()
        ]);
        return;
    }

    // ✅ Balikin response JSON (biar AJAX bisa munculin popup)
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil disimpan',
        'order_id' => $order_id
    ]);
}

    // Halaman success
    public function success()
    {
        $service_order_id = $this->session->flashdata('service_order_id');
        if (!$service_order_id) {
            return redirect('serviceorder');
        }

        $data = [
            'title'            => 'Data Berhasil Disimpan',
            'service_order_id' => $service_order_id,
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('service_order/success', $data);
        $this->load->view('templates/footer');
    }

    public function print_cof() {
        // Ambil data dari database / form
        $data['order'] = $this->orders->get_latest_order();

        // Load library TCPDF
        $this->load->library('tcpdf');

        $pdf = new Tcpdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('KLA Computer Service Center');
        $pdf->SetTitle('Service Order');
        $pdf->SetMargins(15, 20, 15, true);
        $pdf->AddPage();

        // 🔥 Render HTML dari view
        $html = $this->load->view('service_order/print_cof', $data, TRUE);

        // Masukkan ke PDF
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('ServiceOrder.pdf', 'I');
    }

      // Detail service order
    public function view($id)
    {
        $service_order = $this->orders->get_by_id($id);
        if (!$service_order) show_404();

        $data = [
            'title'            => 'Detail Service Order',
            'service_order'    => $service_order,
            'cost_breakdown'   => $this->costs->get_by_service_order($id),
            'service_order_id' => $id,
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('service_order/detail', $data);
        $this->load->view('templates/footer');
    }
}
