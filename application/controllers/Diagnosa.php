<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosa extends CI_Controller
{
    public function __construct()
    {
        $this->load->model('Gejala_model');

    }
    public function index()
    {
        $c['content'] = $this->load->view('guest/diagnosa', '', true);
        $this->load->view('_shared/userlayout', $c);
    }

    public function get()
    {
        $data = $this->Gejala_model->select()->result();
        echo json_encode($data);
    }
}

/* End of file Diagnosa.php */
