<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala_model extends CI_Model {

    public function select($id = null)
    {
        if(is_null($id)){
            return $this->db->get('gejala');
        }else{
            return $this->db->get_where('gejala', ['id'=>$id]);
        }
    }

    public function insert($data)
    {
        $data = (array) $data;
        $this->db->trans_begin();
        $this->db->insert('gejala', $data);
        $data['id']= $this->db->insert_id();
        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return $data;
        }else{
            $this->db->trans_rollback();
            return false;
        }
    }

    public function update($data)
    {
        $item = [
            "kode"=>$data->kode,
            "gejala"=>$data->gejala
        ];
        $this->db->trans_begin();
        $this->db->update('gejala', $item, ['id'=>$data->id]);
        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return $data;
        }else{
            $this->db->trans_rollback();
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->trans_begin();
        $this->db->delete('gejala', ['id'=>$id]);
        if($this->db->trans_status()== true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }
    }
}

/* End of file gejala_model.php */
