<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Auth extends CI_Controller
{

    use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

    function __construct()
    {
        parent::__construct();
        $this->__resTraitConstruct();
    }

    function signIn_post()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $response =  null;

        $user = $this->db->get_where('tb_user', ['email' => $email])->row();
        // if user already
        if ($user) {
            if ($user->is_active == 1) {
                if (password_verify($password, $user->password)) {
                    $data = [
                        'id_user' => $user->id_user,
                        'email' => $user->email
                    ];
                    $response =  array(
                        'value' => 1,
                        'message' => "Login Berhasil",
                        'data' => $data,
                    );
                    $this->set_response($response, 200);
                } else {
                    $response =  array(
                        'value' => 2,
                        'message' => "Password Salah",
                    );
                    $this->set_response($response, 500);
                }
            } else {
                $response =  array(
                    'value' => 3,
                    'message' => "Email Belum Aktif",
                );
                $this->set_response($response, 500);
            }
        } else {
            $response =  array(
                'value' => 4,
                'message' => "Email Belum Terdaftar",
            );
            $this->set_response($response, 500);
        }
    }

    function signUp_post()
    {
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

        $response = null;

        $cekEmail = $this->db->get_where('tb_user', ['email' => $email])->row();
        if ($cekEmail) {
            $response = array(
                'value' => 2,
                'message' => 'Email Sudah Terdaftar',
            );
            $this->set_response($response, 500);
        } else {
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'image' => 'default.png',
                'password' => $password,
                'role_id' => '1',
                'is_active' => '1',
                'created' => date('Y-m-d H:i:s'),
                'date_created' => date('Y-m-d'),
            );
            $this->db->insert('tb_user', $data);
            $response = array(
                'value' => 1,
                'message' => 'Login Berhasil',
                'data' => $data,
            );
            $this->set_response($response, 200);
        }
    }

    
}
