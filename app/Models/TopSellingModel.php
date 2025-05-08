<?php

namespace App\Models;
use CodeIgniter\Model;

class TopSellingModel extends Model
{
    protected $table = 'top_selling';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy('jumlah_terjual', 'DESC')
                    ->findAll();
    }
}
