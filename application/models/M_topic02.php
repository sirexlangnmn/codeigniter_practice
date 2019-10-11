<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_topic02 extends CI_Model {

    public function save($inputTableData){
        // echo '<pre>';
        // print_r($inputTableData);
        // exit;
        
        // pass all the data using for loop to array
        for($x = 0; $x < count($inputTableData); $x++){
            $data[] = array(
                //'no' => $inputTableData[$x]['no'],
                'employee_name' => $inputTableData[$x]['employee_name'],
                'address' => $inputTableData[$x]['address'],
                //'created_at' => date('Y-m-d H:i:s'),
            );
        }
        
        try {
            // insert data to database
            for($x = 0; $x < count($inputTableData); $x++){
                $this->db->insert('employees', $data[$x]);
            }
            return 'success';
        }catch(Exception $e){
            return 'failed';
        }
    }

}

/* End of file M_topic01.php */
