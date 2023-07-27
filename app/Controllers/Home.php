<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' =>[
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => 'active',
            ],
            'keliling' =>[
                'title' => 'Data Peminjaman Buku',
                'link' => base_url() . 'keliling',
                'icon' => 'fa-solid fa-book',
                'aktif' => '',
            ],
            
            'buku' =>[
                'title' => 'Buku',
                'link' => base_url() . 'buku',
                'icon' => 'fa-solid fa-book',
                'aktif' => '',
            ],
        ];
        
        $breadcrumb = ' <div class="col-sm-6">
                            <h1 class="m-0">PERPUSTAKAAN KELILING</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data = [];
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "PERPUSTAKAAN KELILING";
        $data['selamat_datang'] = "SELAMAT MEMBACA DI TEMPAT ANDA";
        return view('template/content', $data);
    }

    
}
