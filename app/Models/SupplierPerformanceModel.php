<?php

namespace App\Models;
use CodeIgniter\Model;

class SupplierPerformanceModel extends Model
{
    protected $table = 'supplier_performance';

    public function getByYear($tahun)
    {
        return $this->where('tahun', $tahun)
                    ->orderBy('nama_supplier', 'ASC')
                    ->findAll();
    }
}
