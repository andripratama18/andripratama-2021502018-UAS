<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelilingModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Buku extends BaseController
{
    protected $pm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new KelilingModel();

        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => '',
            ],
            'buku' => [
                'title' => 'Data buku',
                'link' => base_url() . 'buku',
                'icon' => 'fa-solid fa-book',
                'aktif' => 'active',
            ],
            'buku' =>[
                'title' => 'Buku',
                'link' => base_url() . 'buku',
                'icon' => 'fa-solid fa-book',
                'aktif' => '',
            ],
        ];
        $this->rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kode buku tidak boleh kosong',
                ]
            ],
            'kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama buku tidak boleh kosong',
                ]
            ],
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'riwayat tidak boleh kosong',
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'kondisi tidak boleh kosong',
                ]
            ],
        ];
    }

    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Data buku</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Data buku</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data buku";

        $query = $this->pm->find();
        $data['data_buku'] = $query;
        return view('buku/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/buku">Data buku</a></li>
                            <li class="breadcrumb-item active">Tambah Buku</li>
                        </ol>
                    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Buku';
        $data['action'] = base_url() . '/buku/simpan';
        return view('buku/input', $data);
    }

    public function simpan()
    {

        if (strtolower($this->request->getMethod()) !== 'post') {

            return redirect()->back()->withInput();
        }

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }


        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('buku')->with('success', 'Data Tersimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'Oprasi Gagal');
        }

        try {
            $this->pm->delete($id);
            return redirect()->to('buku')->with('success', 'Data Buku dengan kode' . $id . ' berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('buku')->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                        <h1 class="m-0">Buku</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/buku">Data bukua</a></li>
                            <li class="breadcrumb-item active">Edit Data</li>
                        </ol>
                    </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Data';
        $data['action'] = base_url() . '/buku/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('buku/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['']);

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }

        if (empty($dtEdit[''])) {
            unset($dtEdit['']);
        }

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('buku')->with('success', 'Oprasi Berhasil');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
