<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengetahuan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengetahuan_model');
    }
    

    public function index()
    {
        $c['content'] = $this->load->view('pengetahuan/index.php', '',true);
        $this->load->view('_shared/layout', $c);
    }

    public function get($id=null)
    {
        $data = $this->Pengetahuan_model->select($id);
        echo json_encode($data);
    }

    public function add()
    {
        $data = json_decode($this->input->raw_input_stream);
        $result = $this->Pengetahuan_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->input->raw_input_stream);
        $result = $this->Pengetahuan_model->update($data);
        echo json_encode($result);
    }

    public function delete($id=null)
    {
        $result = $this->Pengetahuan_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Penyakit.php */
