<?php

namespace App\Models;
use CodeIgniter\Model;

class SalesRepModel extends Model
{
    protected $table = 'sales_rep_performance';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy('total_penjualan', 'DESC')
                    ->findAll();
    }
}
