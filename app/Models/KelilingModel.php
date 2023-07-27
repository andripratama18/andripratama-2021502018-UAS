<?php

namespace App\Models;

use CodeIgniter\Model;

class KelilingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'keliling';
    protected $primaryKey       = 'nama';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['nama', 'kamar', 'nm_buku', 'tgl_pinjam', 'tgl_kembali'];

}