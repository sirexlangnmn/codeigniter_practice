<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_global extends CI_Model
{

    function generateID($prefix)
    {
        $m = date('my');
        if ($prefix == 'USER') {
            $last_id = $this->db->order_by('id', 'DESC')->limit(1)->get('users');
        }
            // } elseif ($prefix == 'CMP') {
        //     $last_id = $this->db->order_by('id', 'DESC')->limit(1)->get('employer_company');
        // } elseif ($prefix == 'JOB') {
        //     $last_id = $this->db->order_by('id', 'DESC')->limit(1)->get('job_post');
        // }

        if ($last_id->num_rows() == 0) {
            return $prefix . $m . '00001';
        } else {
            $last_id = $last_id->row()->id + 1;

            if (strlen($last_id) == 1) {
                return $last_id = $prefix . $m . '0000' . $last_id;
            } elseif (strlen($last_id) == 2) {
                return $last_id = $prefix . $m . '000' . $last_id;
            } elseif (strlen($last_id) == 3) {
                return $last_id = $prefix . $m . '00' . $last_id;
            } elseif (strlen($last_id) == 4) {
                return $last_id = $prefix . $m . '0' . $last_id;
            } else {
                return $last_id = $prefix . $m . $last_id;
            }
        }
    }

    function ecdc($action, $string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    function addLoginHistory($employer_code, $status)
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        $data = [
            'user_code' => $employer_code,
            'ip_address' => $ip,
            'operating_system' => $this->agent->platform(),
            'browser' => $agent,
            'date' => date("Y-m-d H:i:s"),
            'status' => $status,
        ];

        $this->db->insert('login_history', $data);
    }

}

/* End of file M_global.php */
