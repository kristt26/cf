<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');

    }

    public function select($id = null)
    {
        if (is_null($id)) {
            return $this->db->get('penyakit');
        } else {
            return $this->db->get_where('penyakit', ['id' => $id]);
        }
    }

    public function insert($data)
    {
        $data = (array) $data;
        $data['file'] = (array) $data['file'];
        $item = [
            'penyakit' => $data['penyakit'],
            'deskripsi' => $data['deskripsi'],
            'penyebab' => serialize($data['penyebab']),
            'solusi' => serialize($data['solusi']),
            'gambar' => isset($data['file']['base64']) ? $this->mylib->decodebase64($data['file']['base64'], 'img/penyakit') : "",
        ];
        $this->db->trans_begin();
        $this->db->insert('penyakit', $item);
        $data['id'] = $this->db->insert_id();
        if ($this->db->trans_status() == true) {
            $this->db->trans_commit();
            $data['gambar'] = $item['gambar'];
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function update($data)
    {
        $data = (array) $data;
        $data['file'] = (array) $data['file'];
        if (isset($data['file'])) {
            $path = './public/img/penyakit/' . $data['gambar'];
            $exe = unlink($path);
        }
        $item = [
            'penyakit' => $data['penyakit'],
            'deskripsi' => $data['deskripsi'],
            'penyebab' => serialize($data['penyebab']),
            'solusi' => serialize($data['solusi']),
            'gambar' => isset($data['file']['base64']) ? $this->mylib->decodebase64($data['file']['base64'], 'img/penyakit') : $data['gambar'],
        ];
        $this->db->trans_begin();
        $this->db->update('penyakit', $item, ['id' => $data['id']]);
        if ($this->db->trans_status() == true) {
            $this->db->trans_commit();
            $data['gambar'] = $item['gambar'];
            return $data;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }

    public function delete($id)
    {
        $data = $this->select($id)->row_array();
        $this->db->trans_begin();
        $this->db->delete('penyakit', ['id' => $id]);
        if ($this->db->trans_status() == true) {
            unlink('./public/img/penyakit/' . $data['gambar']);
            $this->db->trans_commit();
            return true;
        } else {
            $this->db->trans_rollback();
            return false;
        }
    }
}

/* End of file Penyakit_model.php */
