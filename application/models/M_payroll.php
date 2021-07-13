<?php

class M_payroll extends CI_Model
{

    public function getData($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function get($table)
    {
        return $this->db->get($table);
    }

    //delete data
    public function delete($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    //input data
    public function input($data, $table)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }
    //input data dari excel dengan metode array()
    public function inputArray($data, $table)
    {
        return $this->db->insert_batch($data, $table);
    }

    //update data di database
    public function update($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }


    //tarik laporan 
    public function cetakReport($start, $end)
    {
        $this->db->where('tgl_pinjam >=', $start);
        $this->db->where('tgl_pinjam <=', $end);
        $this->db->where("status", "selesai");
        return $this->db->get("tbl_peminjam");
    }

    //upload data barang
    public function uploadfile($filename)
    {
        $this->load->library('upload');
        $config['upload_path']        = './assets/upload_gaji/';
        $config['allowed_types']      = 'xlsx';
        $config['max_size']           = '12048';
        $config['overwrite']          = true;
        $config['file_name']          = $filename;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            //jik berhasil
            $return = array('result' => 'success', 'file'    => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'gagal', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    //ambil  data rincian gaji 
    public function ambilRinciGaji()
    {
        $query = $this->db->query('SELECT karyawan.id_user ,  karyawan.nama , karyawan.nik , karyawan.email , karyawan.jobclass , karyawan.npwp , 
        tbl_gaji_karyawan.gaji_pokok , tbl_gaji_karyawan.tunjangan1 , tbl_gaji_karyawan.tunjangan2 , tbl_gaji_karyawan.tunjangan3 , tbl_gaji_karyawan.bpjs_kesehatan ,tbl_gaji_karyawan.bpjs_tenagakerja  
        FROM karyawan JOIN  tbl_gaji_karyawan WHERE karyawan.id_user = tbl_gaji_karyawan.id_user ');

        return $query;
    }

    //ambil data email karyawan
    public function ambilEmail($id)
    {
        $this->db->select('email');
        $this->db->from("karyawan");
        $this->db->where('id_user', $id);
        return $this->db->get();
    }
}
