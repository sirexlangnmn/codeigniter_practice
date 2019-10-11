<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_topic03 extends CI_Model {

    public function save($abc, $xyz){
        for($count = 0; $count < count($abc); $count++)
        {
            $data = [
                'employee_name' => ($abc[$count]),
                'address' => ($xyz[$count])
            ];
            
            $this->db->insert('employees', $data);
        }

        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
             return false;
        }

       

    }

}

/* End of file M_topic01.php */
