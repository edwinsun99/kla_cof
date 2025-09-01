<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceOrder_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all service orders with customer data
    public function get_all()
    {
        $this->db->select('s.*, c.customer_name, c.contact, c.phone_number');
        $this->db->from('service_orders s');
        $this->db->join('customers c', 'c.id = s.customer_id');
        $this->db->order_by('s.id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    // Get service order by ID with customer data
   public function get_with_customer($id)
{
    return $this->db->select('so.*, c.customer_name, c.contact, c.address, c.phone_number')
        ->from('service_orders so')
        ->join('customers c', 'c.id = so.customer_id', 'left')
        ->where('so.id', $id)
        ->get()->row();
}

   public function insert($data)
{
    // Generate COF number
    $cof_number = $this->generate_cof_number();
    $data['cof_number'] = $cof_number;
    
    $this->db->insert('service_orders', $data);

    // 🔍 Debug error query
    if ($this->db->error()['code'] != 0) {
        echo "<pre>";
        print_r($this->db->error()); // tampilkan error database
        echo "</pre>";
        exit; // stop biar kelihatan errornya
    }

    return $this->db->insert_id();
}


    // Update service order
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('service_orders', $data);
    }

    // Delete service order
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('service_orders');
    }

    // Generate COF number (auto increment)
    private function generate_cof_number()
    {
        $this->db->select_max('id');
        $query = $this->db->get('service_orders');
        $result = $query->row();
        
        $next_id = $result->id + 1;
        return 'COF-' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
    }

    // Get last inserted ID
    public function get_last_insert_id()
    {
        return $this->db->insert_id();
    }
}
?>