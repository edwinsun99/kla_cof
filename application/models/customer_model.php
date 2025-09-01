<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all customers
    public function get_all()
    {
        $query = $this->db->get('customers');
        return $query->result();
    }

    // Get customer by ID
    public function get_by_id($id)
    {
        $query = $this->db->get_where('customers', array('id' => $id));
        return $query->row();
    }

    // Insert new customer
    public function insert($data)
    {
        return $this->db->insert('customers', $data);
    }

    // Update customer
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('customers', $data);
    }

    // Delete customer
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('customers');
    }

    // Search customers by name
    public function search_by_name($keyword)
    {
        $this->db->like('customer_name', $keyword);
        $this->db->or_like('contact', $keyword);
        $query = $this->db->get('customers');
        return $query->result();
    }
}
?>