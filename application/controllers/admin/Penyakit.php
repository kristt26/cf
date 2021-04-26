<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penyakit_model');
    }
    

    public function index()
    {
        $c['content'] = $this->load->view('penyakit/index.php', '',true);
        $this->load->view('_shared/layout', $c);
    }

    public function get($id=null)
    {
        $data = $this->Penyakit_model->select($id)->result();
        if(is_null($id)){
            foreach ($data as $key => $value) {
                $value->penyebab = unserialize($value->penyebab);
                $value->solusi = unserialize($value->solusi);
            }
        }else{
            $data->penyebab = unserialize($data->penyebab);
            $data->solusi = unserialize($data->solusi);
        }
        echo json_encode($data);
    }

    public function add()
    {
        $data = json_decode($this->input->raw_input_stream);
        $result = $this->Penyakit_model->insert($data);
        echo json_encode($result);
    }

    public function update()
    {
        $data = json_decode($this->input->raw_input_stream);
        $result = $this->Penyakit_model->update($data);
        echo json_encode($result);
    }

    public function delete($id=null)
    {
        $result = $this->Penyakit_model->delete($id);
        echo json_encode($result);
    }
}

/* End of file Penyakit.php */
