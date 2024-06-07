<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
	function __construct()
	{
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('session');
	}

    public function register() 
    {
        $signup_fullname = $this->input->post('signup_fullname');
        $signup_email = $this->input->post('signup_email');
        $signup_password = $this->input->post('signup_password');
        $signup_terms = $this->input->post('signup_terms');

        $save = $this->auth_model->register($_POST);

        if($save == true)
        {
            $response['status'] = 'Success';
            $response['messages'] = 'Success register your account';
        } else {
            $response['status'] = 'Error';
            $response['messages'] = $save;
        }
        echo json_encode($response);
    }

    public function login()
    {
        $login_email = $this->input->post('login_email');
        $login_password = $this->input->post('login_password');

        $user = $this->auth_model->cek_user($login_email);

        if($user != false)
        {
            if($user['is_active'] > 0) {
                if(password_verify($login_password, $user['password']))
                {
                    // berhasil login
                    $login = array(
                        'logged_in' => TRUE
                    );

                    $session_data = array_merge($user, $login);
                    $this->session->set_userdata($session_data);
                    
                    $response['status'] = 'Success';
                    $response['messages'] = 'Authentication success';
                    
                } else {
                    //password salah
                    $response['status'] = 'Error';
                    $response['messages'] = 'Wrong password!';
                }
            } else {
                //user tidak aktif
                $response['status'] = 'Error';
                $response['messages'] = 'User not active please contact your administrator!';
            }
        } else {
            // user tidak ditemukan
            $response['status'] = 'Error';
            $response['messages'] = 'User not found, please sign-up first!';
        }

        echo json_encode($response);
    }

    public function logout()
    {
        
        $this->load->library('session');
        try {
            $this->session->sess_destroy();
            
            $response['status'] = 'Success';
            $response['messages'] = 'Logout success';
        } catch (\Throwable $th) {
            $response['status'] = 'Error';
            $response['messages'] = 'Logout failed please contact administrator!';
        }
        echo json_encode($response);
    }
}