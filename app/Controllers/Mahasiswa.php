<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Mahasiswa;

class Mahasiswa extends Controller
{
    public function __construct()
    {
        $this->model = new M_Mahasiswa;
    }
    public function index()
    {
        $data = [
            'judul' => 'Data Mahasiswa',
            'Mahasiswa' => $this->model->getAllData()
        ];

        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('mahasiswa/index', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])){
            $val = $this->validate([
                'nim'  => [
                    'label' => 'Nomor Induk Siswa Nasional',
                    'rules' => 'required|numeric|max_length[10]|is_unique[Mahasiswa.nim]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'numeric' => '{field} hanya boleh angka'
                    ]
                ],
                'nama' => 'required'
            ]);

            if (!$val) {
                session()->setFlashdata('err', \Config\Services::validation()->listErrors());

                $data = [
                    'judul' => 'Data Mahasiswa',
                    'Mahasiswa' => $this->model->getAllData()
                ];
        
                echo view('templates/v_header', $data);
                echo view('templates/v_sidebar');
                echo view('templates/v_topbar');
                echo view('mahasiswa/index', $data);
                echo view('templates/v_footer');
            } else {
                $data =[
                    'nim' => $this->request->getPost('nim'),
                    'nama' => $this->request->getPost('nama')
                ];

                // insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to('/Mahasiswa');
                }
            }
        } else {
            return redirect()->to('/Mahasiswa');
        }
    }
}