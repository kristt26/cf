<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        if (isset($_POST['username']))
        {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            if ($username !== '' && $password !== '') {
                $db = $this->db->get_where('users', array('username' => $username), 1)->row();
                if ($db !== null && $db !== false && password_verify($password, $db->password)) {
                    $newdata = array(
                            'user_id' => $db->id,
                            'username'  => $username,
                            'logged_in' => TRUE
                    );
                    $this->session->set_userdata($newdata);
                    redirect('chat', 'refresh');
                }
            }
        }

        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}