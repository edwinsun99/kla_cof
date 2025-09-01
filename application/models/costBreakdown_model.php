<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CostBreakdown_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get cost breakdown by service order ID
    public function get_by_service_order($service_order_id)
    {
        $query = $this->db->get_where('cost_breakdown', array('service_order_id' => $service_order_id));
        return $query->result();
    }

    // Insert cost breakdown
    public function insert($data)
    {
        return $this->db->insert('cost_breakdown', $data);
    }

    // Insert multiple cost items
    public function insert_batch($data)
    {
        return $this->db->insert_batch('cost_breakdown', $data);
    }

    // Update cost breakdown
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('cost_breakdown', $data);
    }

    // Delete cost breakdown
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('cost_breakdown');
    }

    // Delete by service order ID
    public function delete_by_service_order($service_order_id)
    {
        $this->db->where('service_order_id', $service_order_id);
        return $this->db->delete('cost_breakdown');
    }

    // Calculate total cost for a service order
    public function get_total_cost($service_order_id)
    {
        $this->db->select_sum('cost');
        $this->db->where('service_order_id', $service_order_id);
        $query = $this->db->get('cost_breakdown');
        $result = $query->row();
        
        return $result->cost ? $result->cost : 0;
    }
}
?>