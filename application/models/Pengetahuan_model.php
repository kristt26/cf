<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengetahuan_model extends CI_Model {

    public function select($id = null)
    {
        if(is_null($id)){
            $dataa = $this->db->get('penyakit')->result();
            foreach ($dataa as $key => $value) {
                $value->penyebab = unserialize($value->penyebab);
                $value->solusi = unserialize($value->solusi);
                $value->gejala = $this->db->query("SELECT
                    `pengetahuan`.`id`,
                    `pengetahuan`.`gejalaid`,
                    `pengetahuan`.`mb`,
                    `gejala`.`kode`,
                    `gejala`.`gejala`
                FROM
                    `pengetahuan`
                    LEFT JOIN `gejala` ON `gejala`.`id` = `pengetahuan`.`gejalaid`
                WHERE penyakitid = '$value->id'")->result();
            }
            $data=[
                "data" => $dataa,
                "gejala" => $this->db->get('gejala')->result()
            ];
            return $data;
        }else{
            $data = $this->db->get_where('penyakit', ['id'=>$id])->row_result();
            $data->gejala = $this->db->query("SELECT
                    `pengetahuan`.*,
                    `gejala`.`kode`,
                    `gejala`.`gejala`
                FROM
                    `pengetahuan`
                    LEFT JOIN `gejala` ON `gejala`.`id` = `pengetahuan`.`gejalaid`
                WHERE penyakitid = '$data->id'");
            return $data;
        }
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $this->db->delete('pengetahuan', ['penyakitid'=>$data->id]);
        foreach ($data->gejala as $key => $value) {
            $item = [
                'penyakitid'=>$data->id,
                'gejalaid'=>$value->gejalaid,
                'mb'=>$value->mb
            ];
            $this->db->insert('pengetahuan', $item);
            $value->id = $this->db->insert_id();
        }
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
        $this->db->trans_begin();
        $this->db->delete('pengetahuan', ['penyakitid'=>$data->id]);
        foreach ($data->gejala as $key => $value) {
            $item = [
                'penyakitid'=>$data->id,
                'gejalaid'=>$value->id,
                'mb'=>$value->mb
            ];
            $this->db->insert('pengetahuan', $item);
            $value->id = $this->db->insert_id();
        }
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
        $this->db->delete('pengetahuan', ['id'=>$id]);
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
