<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_topic01 extends CI_Model {

    public function getEmployees(){
        $query = $this->db->get('employees');

        if($query->num_rows() > 0){
            return $query->result_array();
        }
    }
    
    public function saveMessage($data)
    {
        // echo '<pre>';
        // print_r($data);
        // exit;

        $i = 0;
        foreach($data['employee_id'] as $employee_id){
            $record = [
                'employee_id' => $employee_id,
                'message' => $data['message'],
            ];
            $this->db->insert('messages', $record);
            $i++;
        }

        if ($this->db->affected_rows() > 0) {
           return true; 
        } else {
            return false;
        }
    }

}

/* End of file M_topic01.php */
