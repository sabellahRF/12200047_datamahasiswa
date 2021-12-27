<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Mahasiswa extends Model{
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAllData ()
    {
       return $this->db->table('Mahasiswa')->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->db->table('Mahasiswa')->insert($data);
    }
}